@if(session()->has('success'))
    @component('layouts.partials.alerts._alerts_component', ['type' => 'success'])
        {{ session('success') }}
    @endcomponent
@endif

@if(session()->has('error'))
    @component('layouts.partials.alerts._alerts_component', ['type' => 'danger'])
        {{ session('error') }}
    @endcomponent
@endif

@auth
    @if(!auth()->user()->email_verified_at)
        @component('layouts.partials.alerts._alerts_component', ['type' => 'warning'])
            It seems as your email isn't verified...
        @endcomponent
    @endif
@endauth
