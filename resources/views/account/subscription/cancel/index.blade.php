@extends('account.layouts.default')

@section('account.content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('account.subscription.cancel.store') }}" method="POST">
                {{ csrf_field() }}

                <p>Confirm your subscription cancellation.</p>
                
                <button type="submit" class="btn btn-primary">Cancel</button>
            </form>
        </div>
    </div>
@endsection
