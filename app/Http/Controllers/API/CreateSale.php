<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateSale extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param SaleRequest $request
     * @return JsonResponse
     */
    public function __invoke(SaleRequest $request)
    {
        return response()->json(
            \App\Models\Sale::create($request->toArray())->toArray(), 200);
    }
}
