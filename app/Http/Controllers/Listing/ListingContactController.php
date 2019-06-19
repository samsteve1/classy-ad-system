<?php

namespace App\Http\Controllers\Listing;

use App\{Area, Listing};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\ContactListingOwner;
use App\Http\Requests\ListingContactFormRequest;

class ListingContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function store(ListingContactFormRequest $request, Area $area, Listing $listing)
    {
        Mail::to($listing->user)->queue(
            new ContactListingOwner($request->user(), $listing, $request->message)
        );
    }
}
