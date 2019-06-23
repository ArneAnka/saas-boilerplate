@extends('account.layouts.default')

@section('account.content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('account.subscription.card.store') }}" method="POST" id="card-form">
                {{ csrf_field() }}

                <p>Your new card will be used for future payments.</p>

                <button class="btn btn-primary" id="update">Update card</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        let handler = StripeCheckout.configure({
            key: '{{ config('services.stripe.key') }}',
            locale: 'auto',
            token: function (token) {
                let form = $('#card-form')

                $('#update').prop('disabled', true)

                $('<input>').attr({
                    type: 'hidden',
                    name: 'token',
                    value: token.id
                }).appendTo(form)

                form.submit();
            }
        })

        $('#update').click(function (e) {
            handler.open({
                name: 'Codecourse Ltd.',
                currency: 'gbp',
                key: '{{ config('services.stripe.key') }}',
                email: '{{ auth()->user()->email }}',
                panelLabel: 'Update card'
            })

            e.preventDefault();
        })
    </script>
@endsection