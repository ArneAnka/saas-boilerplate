@extends('admin.layouts.default')

@section('admin.content')
    <div class="card">
        <div class="card-body">
            <h1>Impersonate user</h1>
            <form method="POST" action="{{ route('admin.impersonate.store') }}">
                {{ csrf_field() }}
                {{ method_field('POST') }}

                <div class="form-group">
                    <label for="email">Email for impersonating</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
