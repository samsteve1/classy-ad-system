<div class="media">
    <div class="media-body">
        <h5>
            <strong>
                @if ($listing->live())
                    <a href="{{ route('listings.show', [$area, $listing]) }}">{{ $listing->title }}</a>
                @else
                    {{ $listing->title }}
                @endif
            </strong>

            in {{ $listing->area->name }}
        </h5>

        <p>
            <small>{{ $listing->created_at->diffForHumans() }}</small>
            <small>Last updated at {{ $listing->updated_at->diffForHumans() }}</small>
        </p>

        <p>
           <span><a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('listings-destroy-form-{{ $listing->id }}').submit();">Remove</a></span>
           <span><a href="{{ route('listings.edit', [$area, $listing]) }}" class="btn btn-info">Edit</a></span>
        </p>

    </div>
</div>

<form action="{{ route('listings.destroy', [$area, $listing]) }}" method="POST" id="listings-destroy-form-{{ $listing->id }}">
    @csrf
    {{ method_field('DELETE') }}
</form>