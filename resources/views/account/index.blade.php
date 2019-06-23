@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            Account overview for {{ auth()->user()->lastname }}, {{ auth()->user()->firstname }}.<br>
            You signed up {{ auth()->user()->created_at->diffForHumans() }}
        </div>
    </div>
@endsection
