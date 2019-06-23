<?php

namespace App\Http\Controllers\Listing;

use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Area, Listing};
use App\Mail\ListingShare;
use App\Http\Requests\ShareListingFormRequest;


class ListingShareController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Area $area, Listing $listing)
    {
        return view('listings.share.index', compact('listing'));
    }

    public function store(ShareListingFormRequest $request, Area $area, Listing $listing)
    {
        collect(array_filter($request->emails))->each(function ($email) use ($listing, $request) {

            Mail::to($email)->queue(
                new ListingShare($listing, $request->user(), $request->body)
            );
        });

        return redirect()->route('listings.show', [$area, $listing])->withSuccess('Listing shared successfully!');
    }
    
}
