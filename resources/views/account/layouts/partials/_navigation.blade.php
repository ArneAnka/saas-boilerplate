<ul class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
    <li class="nav-item">
        <a href="{{ route('account.index') }}" class="nav-link {{ request()->is('account') ? 'active' : '' }}">{{ __('Account overview') }}</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('account.profile.index') }}" class="nav-link {{ request()->is('*/profile') ? 'active' : '' }}">{{ __('Profile') }}</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('account.password.index') }}" class="nav-link {{ request()->is('*/password') ? 'active' : '' }}">{{ __('Change password') }}</a>
    </li>
</ul>

<hr>

<ul class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
    <li class="nav-item">
        <a href="{{ route('subscription.swap.index') }}" class="nav-link {{ request()->is('asd') ? 'active' : '' }}">{{ __('Change plan') }}</a>
    </li>
    <li class="nav-item">
            <a href="{{ route('subscription.cancel.index') }}" class="nav-link {{ request()->is('asd') ? 'active' : '' }}">{{ __('Cancel subscription') }}</a>
    </li>
    <li class="nav-item">
            <a href="{{ route('subscription.resume.index') }}" class="nav-link {{ request()->is('asd') ? 'active' : '' }}">{{ __('Resume subscription') }}</a>
    </li>
    <li class="nav-item">
            <a href="{{ route('subscription.card.index') }}" class="nav-link {{ request()->is('asd') ? 'active' : '' }}">{{ __('Update card') }}</a>
    </li>
    <li class="nav-item">
            <a href="{{ route('account.index') }}" class="nav-link {{ request()->is('asd') ? 'active' : '' }}">{{ __('Manage team') }}</a>
    </li>
    </ul>