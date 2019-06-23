<ul class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
    <li class="nav-item">
        <a href="{{ route('admin.index') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">{{ __('Admin dashboard') }}</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.impersonate') }}" class="nav-link {{ request()->is('*/impersonate') ? 'active' : '' }}">{{ __('Impersonate user') }}</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->is('*/posts') ? 'active' : '' }}">{{ __('Posts') }}</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('*/users') ? 'active' : '' }}">{{ __('Users') }}</a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link {{ request()->is('*/revenue') ? 'active' : '' }}">{{ __('Revenue') }}</a>
    </li>
    <li class="nav-item">
            <a href="{{route('admin.plans.index')}}" class="nav-link {{ request()->is('*/plans') ? 'active' : '' }}">{{ __('Plans') }}</a>
        </li>
</ul>
