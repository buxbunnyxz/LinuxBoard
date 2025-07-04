<nav class="navbar navbar-light">
    <div class="navbar-left">
        <div class="logo-area">
            <a class="navbar-brand" href="{{ route('dashboard.demo_one', app()->getLocale()) }}">
                <img class="dark" src="{{ asset('assets/img/logo-dark.svg') }}" alt="svg">
                <img class="light" src="{{ asset('assets/img/logo-white.svg') }}" alt="img">
            </a>
            <a href="#" class="sidebar-toggle">
                <img class="svg" src="{{ asset('assets/img/svg/align-center-alt.svg') }}" alt="img"></a>
        </div>

        <div class="top-menu">
            <div class="hexadash-top-menu position-relative">
                <ul>
                    {{-- Keep your menu items here as before --}}
                    <!-- ... all your existing menus here unchanged ... -->
                </ul>
            </div>
        </div>
    </div>

    <div class="navbar-right">
        <ul class="navbar-right__menu">
            {{-- Removed nav-search, nav-message, nav-notification, nav-settings --}}
            
            <li class="nav-flag-select">
                <div class="dropdown-custom">
                    @switch(app()->getLocale())
                        @case('fr')
                            <a href="javascript:;" class="nav-item-toggle">
                                <img src="{{ asset('assets/img/fra.png') }}" alt="" class="rounded-circle">
                            </a>
                        @break

                        @default
                            <a href="javascript:;" class="nav-item-toggle">
                                <img src="{{ asset('assets/img/eng.png') }}" alt="" class="rounded-circle">
                            </a>
                    @endswitch
                    <div class="dropdown-wrapper dropdown-wrapper--small">
                        <a href="{{ route(Route::currentRouteName(), 'en') }}">
                            <img src="{{ asset('assets/img/eng.png') }}" alt=""> English
                        </a>
                        <a href="{{ route(Route::currentRouteName(), 'fr') }}">
                            <img src="{{ asset('assets/img/fra.png') }}" alt=""> Français
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-author">
                <div class="dropdown-custom">
                    <a href="javascript:;" class="nav-item-toggle"><img
                            src="{{ asset('assets/img/author-nav.jpg') }}" alt="" class="rounded-circle">
                        @if (Auth::check())
                            <span class="nav-item__title">{{ Auth::user()->name }}<i
                                    class="las la-angle-down nav-item__arrow"></i></span>
                        @endif
                    </a>
                    <div class="dropdown-wrapper">
                        <div class="nav-author__info">
                            <div class="author-img">
                                <img src="{{ asset('assets/img/author-nav.jpg') }}" alt=""
                                    class="rounded-circle">
                            </div>
                            <div>
                                @if (Auth::check())
                                    <h6 class="text-capitalize">{{ Auth::user()->name }}</h6>
                                @endif
                                <span>UI Designer</span>
                            </div>
                        </div>
                        <div class="nav-author__options">
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/img/svg/user.svg') }}" alt="user"
                                            class="svg"> Profile</a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/img/svg/settings.svg') }}" alt="settings"
                                            class="svg"> Settings</a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/img/svg/key.svg') }}" alt="key"
                                            class="svg"> Billing</a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/img/svg/users.svg') }}" alt="users"
                                            class="svg"> Activity</a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/img/svg/bell.svg') }}" alt="bell"
                                            class="svg"> Help</a>
                                </li>
                            </ul>
                            <a href="" class="nav-author__signout"
                                onclick="event.preventDefault();document.getElementById('logout').submit();">
                                <img src="{{ asset('assets/img/svg/log-out.svg') }}" alt="log-out" class="svg">
                                {{ __('Sign Out') }}
                            </a>
                            <form style="display:none;" id="logout"
                                action="{{ route('logout', ['locale' => app()->getLocale()]) }}" method="POST">
                                @csrf
                                @method('post')
                            </form>

                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <div class="navbar-right__mobileAction d-md-none">
            <a href="#" class="btn-author-action">
                <img src="{{ asset('assets/img/svg/more-vertical.svg') }}" alt="more-vertical" class="svg"></a>
        </div>
    </div>
</nav>
