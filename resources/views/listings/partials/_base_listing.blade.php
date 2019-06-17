<div class="media">
    <div class="media-body">
        <h5>
            <strong><a href="{{ route('listings.show', [$area, $listing]) }}">{{ $listing->title }}</a></strong>

            @if ($area->children->count())
                in {{ $listing->area->name }}
            @endif
        </h5>
        <p><small>{{ $listing->created_at->diffForHumans() }}, {{ $listing->user->name }}</small></p>

        {{ isset($links) ? $links: ''  }}
    </div>
</div>
