@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('account.password.store') }}">
                {{ csrf_field() }}
                {{ method_field('POST') }}

                <div class="form-group">
                    <label for="password_current" class="control-label">Current password</label>
                    <small id="emailHelp" class="form-text text-muted">Enter your current password to verify that you in fact is the owner of this account.</small>
                    <input type="password" name="password_current" id="password_current" class="form-control @error('password_current') is-invalid @enderror">

                    @error('password_current')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">New password</label>
                    <small id="emailHelp" class="form-text text-muted">Enter a new password, minimum 8 characters.</small>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">

                    @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="control-label">New password again</label>
                    <small id="emailHelp" class="form-text text-muted">Enter your new password again, to confirm.</small>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">

                    @error('password_confirmation')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Change password</button>
            </form>
        </div>
    </div>
@endsection
