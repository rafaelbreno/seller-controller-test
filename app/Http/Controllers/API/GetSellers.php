<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class GetSellers extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return JsonResponse
     */
    public function __invoke()
    {
        return response()->json(
            \App\Models\User::all()->toArray()
            , 200);
    }
}
