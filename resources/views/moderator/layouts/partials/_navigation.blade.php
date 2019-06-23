<ul class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
    <li class="nav-item">
        <a href="#" class="nav-link {{ request()->is('moderator') ? 'active' : '' }}">{{ __('Subjects') }}</a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link {{ request()->is('*/profile') ? 'active' : '' }}">{{ __('Stacks') }}</a>
    </li>
</ul>
