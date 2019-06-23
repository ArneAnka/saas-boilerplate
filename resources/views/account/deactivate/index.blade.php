@extends('account.layouts.default')

@section('account.content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('account.deactivate.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('password_current') ? ' has-error' : '' }}">
                    <label for="password_current" class="control-label">Current password</label>
                    <input type="password" name="password_current" id="password_current" class="form-control">

                    @if ($errors->has('password_current'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_current') }}</strong>
                        </span>
                    @endif
                </div>

                @subscriptionnotcancelled
                    <p>This will also cancel your active subscription.</p>
                @endsubscriptionnotcancelled

                <button type="submit" class="btn btn-primary">Deactivate account</button>
            </form>
        </div>
    </div>
@endsection
