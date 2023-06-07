<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Requests\ListingRequest;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);
        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                            ->filter($filters)
                            ->paginate(10)
                            ->withQueryString()
            ]
        );
    }

    

    public function show(Listing $listing)
    {
        $listing->load(['images']);
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }
}
