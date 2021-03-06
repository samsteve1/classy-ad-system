<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingPublishedController extends Controller
{
    public function index(Request $request)
    {
        $listings = $request->user()->listings()->with(['area'])->isLive()->latestFirst()->paginate(4);

        return view('user.listings.published.index', compact('listings'));
    }
}
