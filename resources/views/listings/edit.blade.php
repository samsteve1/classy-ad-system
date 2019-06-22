@extends('layouts.app')

@section('content')
   
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Continue Editing Listing</h4>
                        @if ($listing->live())
                            <span class="pull-right"><a href="{{ route('listings.show', [$area, $listing]) }}" style="color:white;">Go to listing</a></span>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('listings.update', [$area, $listing]) }}" method="POST">
                            @csrf
                            {{ method_field('PATCH') }}

                            @include('listings.partials.forms._areas')

                            @include('listings.partials.forms._categories')
                            <div class="form-group">
                                <label for="title" class="form-control-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $listing->title }}" required>
                                @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="body" class="form-control-label">Body</label>
                                <textarea name="body" id="body" cols="15" rows="5" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" required>{{ $listing->body }}</textarea>
                                @if ($errors->has('body'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            @if ($listing->live())
                                <input type="hidden" name="category_id" value="{{ $listing->category_id }}">
                            @endif
                            <div class="form-group">
                                <button class="btn btn-default pull-left" type="submit">Save</button>
                                @if (!$listing->live())
                                    <button class="btn btn-primary" type="submit" name="payment">Continue to payment</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   
@endsection