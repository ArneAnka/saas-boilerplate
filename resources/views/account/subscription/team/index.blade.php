@extends('account.layouts.default')

@section('account.content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('account.subscription.team.update') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Team name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $team->name) }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

     <div class="panel panel-default">
        <div class="panel-body">
            @if ($team->users->count())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Member name</th>
                            <th>Member email</th>
                            <th>Added</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($team->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->pivot->created_at->toDateString() }}</td>
                                <td>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('remove-{{ $user->id }}').submit();">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>You've not added any team members yet.</p>
            @endif

            @foreach ($team->users as $user)
                <form action="{{ route('account.subscription.team.member.destroy', $user) }}" method="POST" id="remove-{{ $user->id }}" class="hidden">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
            @endforeach

            <form action="{{ route('account.subscription.team.member.store') }}" method="POST">
                {{ csrf_field() }}
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Add a member by email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Add member</button>
            </form>
        </div>
     </div>
@endsection
