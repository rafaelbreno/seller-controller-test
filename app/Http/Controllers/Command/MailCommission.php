<?php

namespace App\Http\Controllers\Command;

use App\Http\Controllers\Controller;
use App\Mail\CommissionMail;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailCommission extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return void
     */

    public function __invoke()
    {
    }

    protected function getMails()
    {
        return DB::table('sales')
            ->join('users', 'users.id', '=', 'sales.seller_id')
            ->select('sales.seller_id', 'sales.sale_value', 'sales.commission', 'sales.created_at', 'users.email')
            ->get()
            ->groupBy('email')
            ->map(function ($sale) {
                return $this->mapMailData($sale);
            });
    }

    public function mapMailData($sale)
    {
        return [
            'total_sales' => $sale->sum('sale_value'),
            'total_commission' => $sale->sum('commission'),
            'sales' => $sale->map(function ($var) {
                return [
                    'sale_value' => $var->sale_value,
                    'commission' => $var->commission,
                    'created_at' => $var->created_at
                ];
            })->toArray()
        ];
    }
}
