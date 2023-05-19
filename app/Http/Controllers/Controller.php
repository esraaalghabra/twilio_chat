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

    public function success(mixed $data,String $message="ok",int $statusCode=200):JsonResponse{
        return response()->json([
            'data'=>$data,
            'success'=>true,
            'message'=>$message
        ],$statusCode);

    }

    public function error(String $message="error",int $statusCode=400):JsonResponse{
        return response()->json([
            'data'=>null,
            'success'=>false,
            'message'=>$message
        ],$statusCode);

    }

}
