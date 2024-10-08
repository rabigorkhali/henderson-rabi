<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex flex-column" href="{{ url('/home') }}">
            {{__('Henderson Technologies| Rabi Gorkhali') }}
        </a>
        <br>

        <div class="collapse navbar-collapse flex-column" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a style="text-decoration: none; margin-left: 10px;" class=" {{ str_contains(Route::currentRouteName(), 'home') ? 'active' : '' }} "
                                   href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-decoration: none;margin-left: 10px;" class=" {{ str_contains(Route::currentRouteName(), 'posts') ? 'active' : '' }} "
                                   href="{{ route('posts.index') }}">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a  style="text-decoration: none;margin-left: 10px;" class=" {{ str_contains(Route::currentRouteName(), 'post-categories') ? 'active' : '' }} "
                                   href="{{ route('post-categories.index') }}"> Categories</a>
                            </li>
                            <li class="nav-item">
                                <a style="text-decoration: none;margin-left: 10px;" class=" {{ str_contains(Route::currentRouteName(), 'users') ? 'active' : '' }} "
                                   href="{{ route('users.index') }}" href="{{ route('users.index') }}">Users</a>
                            </li>

                            <li class="nav-item">
                                <a style="text-decoration: none;margin-left: 10px;" class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>
