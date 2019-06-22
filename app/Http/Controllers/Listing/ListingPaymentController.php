<?php

namespace App\Http\Controllers\Listing;

use App\{Area, Listing};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function show(Area $area, Listing $listing) 
    {
        $this->authorize('pay', $listing);

        if($listing->live()) {
            return back()->withError('Listing is live already!');
        }
        return view('listings.payment.show', compact('listing'));
    }

    public function store(Request $request, Area $area, Listing $listing)
    {
        $this->authorize('pay', $listing);

        if($listing->live()) {
            return back()->withError('Listing is live already!');
        }

        if($listing->cost() === 0) {
            return back();
        }

        if(($nonce = $request->payment_method_nonce) === null) {
            return back();
        }
        //  charge user

        $result = \Braintree_Transaction::sale([
            'amount'    =>  $listing->cost(),
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result->success === false) {
            //  fire events, notify user of failed payment

            return back()->withError('Something went wrong while processing your payment');
        }

        $listing->live = true;
        $listing->created_at = \Carbon\Carbon::now();
        $listing->save();
        return redirect()
            ->route('listings.show', [$area, $listing])
            ->withSuccess('Congratulations! Payment accepted and your listing is live!');
    }

    public function update(Request $request, Area $area, Listing $listing)
    {
        $this->authorize('update', $listing);

        if($listing->cost() > 0) {
            return back();
        }

        $listing->live = true;
        $listing->created_at = \Carbon\Carbon::now();
        $listing->save();
        return redirect()
            ->route('listings.show', [$area, $listing])
            ->withSuccess('Congratulations!  Your listing is live!');


    }
}
