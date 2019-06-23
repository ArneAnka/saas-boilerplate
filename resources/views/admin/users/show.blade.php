@extends('admin.layouts.default')

@section('admin.content')
    <div class="card">
        <div class="card-body">
            {{$user->firstname}}, {{$user->lastname}}
            @if($user->gender == 'male')
                <i class="fas fa-male"></i>
            @elseif($user->gender == 'female')
                <i class="fas fa-female"></i>
            @endif
            <hr>
            Signed up {{$user->created_at->diffForHumans()}}<br>
            Verified email: {{$user->email_verified_at}}<br>
            Active subscription:
            <ul>
                Total sign-in: {{ $user->ip->count() }}
                @foreach ($user->ip as $ip)
                    <li>{{$ip->address}}, {{$ip->agent}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
