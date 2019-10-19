@extends('layouts.app')

@section('content')
   <div class="card">
       <div class="card-body">
           <div class="row">
               @foreach ($areas as $country)
                   <div class="col-md-12 my-1">
                       <a href="{{ route('user.area.store', $country) }}"><h3>{{ $country->name }}</h3></a>
                        <hr>
                       <div class="row">
                           @foreach ($country->children as $state)
                               <div class="col-md-4">
                                   <a href="{{ route('user.area.store', $state) }}"><h4>{{ $state->name }}</h4></a>
                                    <hr>
                                   @foreach ($state->children as $city)
                                       <a href="{{ route('user.area.store', $city) }}"><h5>{{ $city->name }}</h5></a>
                                   @endforeach
                               </div>
                           @endforeach
                       </div>
                   </div>
               @endforeach
           </div>
       </div>
   </div>
@endsection

