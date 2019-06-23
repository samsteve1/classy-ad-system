@component('mail::message')
{{ $sender->name  }} shared <a href="{{ route('listings.show', [$listing->area, $listing]) }}">{{ $listing->title }}</a> with you.

@if ($body)
    

     {!! nl2br(e($body)) !!} 

     
@endif

@endcomponent
