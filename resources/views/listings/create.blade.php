@extends('layouts.app')

@section('content')
   
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Create Listing</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('listings.store', $area) }}" method="POST">
                            @csrf

                            @include('listings.partials.forms._areas')

                            @include('listings.partials.forms._categories')
                            <div class="form-group">
                                <label for="title" class="form-control-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" required>
                                @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="body" class="form-control-label">Body</label>
                                <textarea name="body" id="body" cols="15" rows="5" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" required>{{ old('body') }}</textarea>
                                @if ($errors->has('body'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   
@endsection