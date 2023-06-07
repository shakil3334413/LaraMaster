<?php

namespace App\Http\Controllers;

use inertia;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ListingRequest;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];

        return inertia('Realtor/Index', 
        [
             'filters' => $filters,
             'listings' => Auth::user()
                    ->listings()
                    ->filter($filters)
                    ->withCount('images')
                    ->paginate(5)
                    ->withQueryString()
        ]);
    }

    public function create()
    {
        // $this->authorize('create', Listing::class);
        return inertia('Realtor/Create');
    }

    public function store(ListingRequest $request)
    {
        // if (Auth::user()->cannot('view', $listing)) {
        //     abort(403);
        // }
        // $this->authorize('view', $listing);

        $request->user()->listings()->create($request->all());
        return redirect()->route('realtor.listing.index')
                ->with('success','Listing was created!');
    }
    public function edit(Listing $listing)
    {
       return inertia(
            'Realtor/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    public function update(ListingRequest $request, Listing $listing)
    {
        $listing->update($request->all());
        return redirect()->route('realtor.listing.index')
        ->with('success','Listing was Updated!');
    }
    
    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }

    public function restore(Listing $listing)
    {
        $listing->restore();

        return redirect()->back()->with('success', 'Listing was restored!');
    }
}
