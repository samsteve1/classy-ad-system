@component('mail::message')
# New Contact

Hi {{ $listing->user->name }},<br><br>

{{ $user->name }} has contacted you about your listing, <a href="">{{ $listing->title }}</a><br><br>

---<br>

{!! nl2br(e($message)) !!}

---<br><br>

Reply directly to this email to get back them.

@endcomponent
