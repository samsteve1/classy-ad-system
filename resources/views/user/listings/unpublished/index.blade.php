@extends('layouts.app')

@section('content')
        @if ($listings->count())
            @foreach ($listings  as $listing)
                @include('listings.partials._listing_own', compact('listing'))
            @endforeach

            {{ $listings->links() }}
        @else
            <p>No unpublished listings.</p>
        @endif
@endsection