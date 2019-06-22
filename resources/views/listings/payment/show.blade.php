@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Pay for your listing</h4>
                    </div>

                    <div class="card-body">
                        @if ($listing->cost() == 0)
                            <form action="{{ route('listings.payment.update', [$area, $listing]) }}" method="POST">
                                @csrf
                                {{ method_field('PATCH') }}

                                <p>There's nothing to pay.</p>
                                <button class="btn btn-primary">Complete</button>
                            </form>
                        @else
                            <p>Total cost: NGN{{ number_format($listing->cost(), 2) }}</p>
                            <payment></payment>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection