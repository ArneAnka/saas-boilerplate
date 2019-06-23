@extends('admin.layouts.default')

@section('admin.content')
    <div class="card">
        <div class="card-body">
            <h1>Plan {{$plan->name}}</h1>
            <form action="{{route('admin.plans.update', $plan)}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name', $plan->name)}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gateway_id">Gateway ID</label>
                    <input class="form-control @error('gateway_id') is-invalid @enderror" type="text" name="gateway_id" id="gateway_id" value="{{old('gateway_id', $plan->gateway_id)}}">
                    @error('gateway_id')
                        <span class="invalid-feedback" role="alert">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{old('price', $plan->price)}}">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="active">Active</label>
                    <input class="form-control @error('active') is-invalid @enderror" type="checkbox" name="active" id="active" @if($plan->active) checked @endif>
                    @error('active')
                        <span class="invalid-feedback" role="alert">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="teams_enabled">Teams Enabled</label>
                    <input class="form-control @error('teams_enabled') is-invalid @enderror" type="checkbox" name="teams_enabled" id="teams_enabled" @if($plan->teams_enabled) checked @endif>
                    @error('teams_enabled')
                        <span class="invalid-feedback" role="alert">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="teams_limit">Teams Limit</label>
                    <input class="form-control @error('teams_limit') is-invalid @enderror" type="text" name="teams_limit" id="teams_limit" value="{{old('teams_limit', $plan->teams_limit)}}">
                    @error('teams_limit')
                        <span class="invalid-feedback" role="alert">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>   
                </div>
            </form>
        </div>
    </div>
@endsection

