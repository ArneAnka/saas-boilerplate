<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            @impersonating
                <li class="nav-item">
                    <a class="nav-link" href="" style="color: red;" onclick="event.preventDefault(); document.getElementById('impersonate.destroy').submit()">Stop impersonating</a>

                    <form method="POST" action="{{ route('admin.impersonate.destroy') }}" id="impersonate.destroy">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </li>
            @endimpersonating
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('plans.index') }}">Plans</a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ '@'.Auth::user()->firstname }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @admin
                                <a class="dropdown-item" href="{{ route('admin.index') }}">Admin</a>
                            @endadmin
                            @moderator
                                <a class="dropdown-item" href="{{ route('moderator') }}">Moderator</a>
                            @endmoderator
                            <a class="dropdown-item" href="{{ route('account.index') }}">Account overview</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" name="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
