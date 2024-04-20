<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class IndexController extends Controller
{
    public function get(): JsonResponse
    {
        return response()->json([
            'message' => 'Welcome to DroneAPI',
            'data' => [
                'base_url' => config('app.url'),
                'env' => config('app.env')
            ]
        ]);
    }

}
