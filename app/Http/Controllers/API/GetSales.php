<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\JsonResponse;

class GetSales extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param string $sellerId
     * @return JsonResponse
     */
    public function __invoke(string $sellerId)
    {
        return response()->json(
            Sale::where('seller_id', $sellerId)
                ->orderBy('created_at', 'desc')
                ->get()
                ->toArray()
            ,200);
    }
}
