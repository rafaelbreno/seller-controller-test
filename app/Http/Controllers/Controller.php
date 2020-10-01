<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param array $data
     * @param bool $success
     * @param array $addons
     * @param int $status
     * @return JsonResponse
     */
    protected function returnJson(
        array $data,
        bool $success,
        array $addons = array(),
        int $status = 200) : JsonResponse
    {
        $data = array_merge_recursive($data, $addons);

        return response()->json([
            'success' => $success,
            'data' => $data
        ], $status);
    }
}
