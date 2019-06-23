@extends('admin.layouts.default')

@section('admin.content')
    <div class="card">
        <div class="card-body">
            <h1>Plans</h1>
            @foreach ($plans as $plan)
                <a href="{{route('admin.plans.edit', $plan)}}">{{$plan->name}}</a>
                @if($plan->active)
                    <span style="font-size: 1em; color: LimeGreen;">
                            <i class="fas fa-toggle-on"></i>
                    </span>
                @elseif(!$plan->active)
                    <span style="font-size: 1em; color: Tomato;">
                            <i class="fas fa-toggle-off"></i>
                    </span>
                @endif
                <br>
            @endforeach
            <hr>
            <a href="#">New Plan <i class="far fa-plus-square"></i></a>
        </div>
    </div>
@endsection

