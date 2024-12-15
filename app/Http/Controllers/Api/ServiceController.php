<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    public function index(): JsonResponse
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json($services);
    }

    public function show(Service $service): JsonResponse
    {
        if (!$service->is_active) {
            abort(404);
        }

        $service->load('media');
        
        return response()->json($service);
    }
}
