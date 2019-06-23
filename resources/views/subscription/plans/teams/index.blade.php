@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <ul class="list-group">
            @foreach($plans as $plan)
              <li class="list-group-item"><a href="{{ route('subscription.index') }}?plan={{ $plan->slug }}">{{ $plan->name }} ({{ $plan->price }} SEK)</a></li>
            @endforeach
            <li class="list-group-item"><a href="{{ route('plans.index') }}">User plans</a></li>
          </ul>
        </div>
    </div>
@endsection
