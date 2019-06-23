@extends('admin.layouts.default')

@section('admin.content')
    <div class="card">
        <div class="card-body">
            <h1>Users</h1>
            <hr>
            @foreach ($users as $user)
                <a href="{{ route('admin.users.show', $user) }}">
                    {{ $user->firstname }} {{$user->lastname}}
                </a> ({{$user->email}})<br>
            @endforeach
        </div>
    </div>
@endsection
