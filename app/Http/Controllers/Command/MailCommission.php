<?php

namespace App\Http\Controllers\Command;

use App\Http\Controllers\Controller;
use App\Mail\CommissionMail;
use Carbon\Carbon;
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
        $this->getMails()->each(function ($item, $key) {
            Mail::to($key)->send(
                new CommissionMail($item)
            );
        });
    }

    protected function getMails()
    {
        return DB::table('sales')
            ->join('users', 'users.id', '=', 'sales.seller_id')
            ->select('sales.seller_id', 'sales.sale_value', 'sales.commission', 'sales.created_at', 'users.name', 'users.email')
            ->get()
            ->groupBy('email')
            ->map(function ($sale) {
                return $this->mapMailData($sale);
            });
    }

    public function mapMailData($sale)
    {
        return [
            'name' => $sale->first()->name,
            'total_sales' => "R$" . number_format($sale->sum('sale_value') / 10000, 2),
            'total_commission' => "R$" . number_format($sale->sum('commission') / 10000, 2),
            'sales' => $sale->map(function ($var) {
                return [
                    'sale_value' => "R$" . number_format($var->sale_value / 10000, 2),
                    'commission' => "R$" . number_format($var->commission / 10000, 2),
                    'created_at' => Carbon::createFromDate($var->created_at)->format("H:s d/m/Y")
                ];
            })->toArray()
        ];
    }
}
