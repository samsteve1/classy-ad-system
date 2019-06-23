@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5>Share listing <em>{{ $listing->title }}</em></h5>
                </div>

                <div class="card-body">
                    <p class="text-muted">Share this listing with up to 5 people.</p>

                    <form action="{{ route('listings.share.store', [$area, $listing]) }}" method="POST">
                        @csrf

                        @foreach (range(0, 4) as $n)
                            <div class="form-group">
                                <label for="emails.{{ $n }}" class="hidden">Email</label>
                                <input type="email" name="emails[]" id="emails.{{ $n }}" class="form-control{{ $errors->has('emails.' . $n) ? ' is-invalid' : '' }}" placeholder="Enter some email" value="{{ old('emails.' . $n) }}">

                                @if ($errors->has('emails.' . $n))
                                    <span class="invalid-feedback">{{ $errors->first('emails.' . $n) }}</span>
                                @endif
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label for="body" class="form-control-label"></label>

                            <textarea name="body" id="body" cols="15" rows="5" class="form-control{{ $errors->has('body') ? ' is-invalid' : ''}}" placeholder="Optional">{{ old('body') }}</textarea>

                            @if ($errors->has('body'))
                                <span class="invalid-feedback">
                                    {{ $errors->first('body') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
