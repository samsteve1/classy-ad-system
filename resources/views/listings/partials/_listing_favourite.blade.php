@component('listings.partials._base_listing', compact('listing'))

    @slot('links')
    <small>
        <span>{{ $listing->pivot->created_at->diffForHumans() }}</span> <span>
            <a href="#" onclick="event.preventDefault(); document.getElementById('deleteFavouriteForm-{{ $listing->id }}').submit();">Delete</a>
        </span>
    </small>
    <form action="{{ route('listings.favourites.delete', [$area, $listing]) }}" method="POST" id="deleteFavouriteForm-{{ $listing->id }}">
        @csrf
        {{ method_field('DELETE') }}
    </form>
    @endslot
@endcomponent