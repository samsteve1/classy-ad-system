@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (Auth::check())
            <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <nav class="nav flex-column">
                                <a href="#" class="nav-link">Email to a friend</a>
                                <a href="#" class="nav-link">Add to favourites</a>
                            </nav>
                        </div>
                    </div>
                </div>
            @endif
            

            <div class="{{ Auth::check() ? 'col-md-9' : 'col-md-12' }}">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $listing->title }} in <span class="text-muted">{{ $listing->area->name }}</span></h4>
                    </div>
                    <div class="card-body">
                        {!! nl2br(e($listing->body)) !!}

                        <p>Viewed x times</p>
                    </div>
                </div>
                @if(Auth::check())
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Contact {{ $listing->user->name }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message" class="form-control-label">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit" aria-describedby="submitHelp">Send message</button>
                                    <small id="submitHelp">This will email {{ $listing->user->name }} and they will be able to reply to you by email.</small>
                                </div>
                            </form>
                        </div>
                    </div>

                    @else
                    <p>Please <a href="{{ url('/register') }}">sign up</a> <a href="{{ url('/login') }}"> sign in</a> to contact the listing owner.</p>
                @endif
            </div>
        </div>
    </div>
@endsection