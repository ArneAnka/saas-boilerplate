@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('account.profile.store') }}">
                {{ csrf_field() }}
                {{ method_field('POST') }}

                <div class="form-group">
                    <label for="firstname" class="control-label">{{ __('Firstname') }}</label>
                    <input type="text" name="firstname" id="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname', auth()->user()->firstname) }}">

                    @error('firstname')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lastname" class="control-label">{{ __('Lastname') }}</label>
                    <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname', auth()->user()->lastname) }}">

                    @error('lastname')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">{{ __('Email') }}</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', auth()->user()->email) }}">
                    @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
