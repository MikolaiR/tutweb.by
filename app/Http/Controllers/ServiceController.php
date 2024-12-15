<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('services.index', compact('services'));
    }

    public function show(Service $service): View
    {
        abort_if(!$service->is_active, 404);

        return view('services.show', compact('service'));
    }
}
