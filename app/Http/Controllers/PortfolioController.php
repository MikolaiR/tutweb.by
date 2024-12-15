<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(Request $request): View
    {
        $query = Portfolio::where('is_active', true);
        $activeService = null;

        // Filter by service
        if ($request->has('service')) {
            $activeService = Service::where('slug', $request->service)->firstOrFail();
            $query->whereHas('services', function ($q) use ($activeService) {
                $q->where('services.id', $activeService->id);
            });
        }

        // Sort options
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'oldest':
                $query->orderBy('completed_at', 'asc');
                break;
            case 'newest':
            default:
                $query->orderBy('completed_at', 'desc');
                break;
        }

        // Get all services for the filter
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $portfolioItems = $query->paginate(12)
            ->withQueryString();

        return view('portfolio.index', compact('portfolioItems', 'services', 'activeService'));
    }

    public function show(Portfolio $portfolio): View
    {
        abort_if(!$portfolio->is_active, 404);

        // Get related projects based on services
        $relatedProjects = Portfolio::where('is_active', true)
            ->where('id', '!=', $portfolio->id)
            ->whereHas('services', function ($query) use ($portfolio) {
                $query->whereIn('services.id', $portfolio->services->pluck('id'));
            })
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('portfolio.show', compact('portfolio', 'relatedProjects'));
    }
}
