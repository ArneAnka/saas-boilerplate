@extends('account.layouts.default')

@section('account.content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p>Current plan: {{ auth()->user()->plan->name }} (£{{ auth()->user()->plan->price }})</p>
            <form action="{{ route('account.subscription.swap.store') }}" method="POST">
                {{ csrf_field() }}
                
                <div class="form-group{{ $errors->has('plan') ? ' has-error' : '' }}">
                    <label for="plan" class="control-label">Plan</label>
                    
                    <select name="plan" id="plan" class="form-control">
                        @foreach($plans as $plan)
                            <option value="{{ $plan->gateway_id }}">{{ $plan->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('plan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('plan') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
