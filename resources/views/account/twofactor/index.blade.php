@extends('account.layouts.default')

@section('account.content')
    <div class="panel panel-default">
        <div class="panel-body">
            @if (auth()->user()->twoFactorEnabled())
                <p>Two factor authentication is enabled for your account.</p>
                
                <form action="{{ route('account.twofactor.destroy') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-primary">Disable</button>
                </form>
            @else
                @if (auth()->user()->twoFactorPendingVerification())
                    <form action="{{ route('account.twofactor.verify') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('token') ? ' has-error' : '' }}">
                            <label for="token">Verification token</label>
                            <input type="text" name="token" id="token" class="form-control">

                            @if ($errors->has('token'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('token') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Verify</button>
                    </form>

                    <hr>

                    <form action="{{ route('account.twofactor.destroy') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-default">Cancel verification</button>
                    </form>
                @else
                    <form action="{{ route('account.twofactor.store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('dial_code') ? ' has-error' : '' }}">
                            <label for="dial_code">Dialling code</label>
                            <select name="dial_code" id="dial_code" class="form-control">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->dial_code }}">{{ $country->name }} (+{{ $country->dial_code }})</option>
                                @endforeach
                            </select>

                            @if ($errors->has('dial_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dial_code') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone_number">Phone number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control">

                            @if ($errors->has('phone_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Enable</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
@endsection
