<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Requests\ListingRequest;

class ListingController extends Controller
{

    public function index()
    {
        return inertia(
            'Listing/Index',
            [
                'listings' => Listing::all(),
            ]
        );
    }

    public function create()
    {
        return inertia('Listing/Create');
    }

    public function store(ListingRequest $request)
    {

        Listing::create($request->all());
        return redirect()->route('listing.index')
                ->with('success','Listing was created!');
    }

    public function show(Listing $listing)
    {
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    public function edit(Listing $listing)
    {
       return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    public function update(ListingRequest $request, Listing $listing)
    {
        $listing->update($request->all());
        return redirect()->route('listing.index')
        ->with('success','Listing was Updated!');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->back()->with('success','Listing was Deleted!');
    }
}
