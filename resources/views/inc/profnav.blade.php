@guest
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
@else
<!-- MENU SIDEBAR-->
<aside class="menu-sidebar2">
        <div class="logo">
            <a href="/">
                <h2 class="white">Courseadvisor</h2>
            </a>
        </div>
        <div class="menu-sidebar2__content js-scrollbar1">
            <div class="account2">
                <div class="image img-cir img-120" style="background-color:cadetblue">
                    <h1 align="center" style="font-size:50px; padding-top:25%; color:white"><span class="fas fa-user"></span></h1>
                </div>
                <h4 class="name">{{ Auth::user()->first_name }}</h4>
                <span>{{ Auth::user()->email }}</span>
            </div>
            <nav class="navbar-sidebar2">
                <ul class="list-unstyled navbar__list">
                    <li class="active has-sub">
                        <a href="/home">
                            <i class="fas fa-home"></i>Home
                        </a>
                    </li>
                    {{-- @can('not_taken_test')
                        <li>
                            <a href="/test">
                                <i class="fas fa-book"></i>Know Your Personality</a>
                            <span class="inbox-num"><i class="fa fa-arrow-right"></i></span>
                        </li>
                    @endcan --}}
                    <li>
                        <a href="/account">
                            <i class="fas fa-user"></i>Account</a>
                    </li>
                    @can('taken_test')
                        <li>
                            <a href="/feedbacks/create">
                                <i class="fas fa-edit"></i>Feedback</a>
                        </li>
                    @endcan
                    <li>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i>Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container2">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop2">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap2">
                        <div class="logo d-block d-lg-none">
                            <a href="/">
                                <h2 class="white">Courseadvisor</h2>
                            </a>
                            <div class="header-button-item mr-0 js-sidebar-btn">
                                <i class="zmdi zmdi-menu"></i>
                            </div>
                        </div>
                        {{-- <div class="header-button2">
                            <div class="header-button-item mr-0 js-sidebar-btn">
                                <i class="zmdi zmdi-menu"></i>
                            </div>
                            <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="/home">
                                            <i class="fas fa-home"></i>Home
                                        </a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="/test">
                                            <i class="fas fa-book"></i>Know Course
                                        </a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="/settings">
                                            <i class="fas fa-user"></i>Account
                                        </a>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="fas fa-power-off"></i>Log Out</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </header>
        <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
            <div class="logo">
                <a href="/">
                    <h2 class="white">Courseadvisor</h2>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar2">
                <div class="header-button-item mr-0 js-sidebar-btn">
                    <i class="zmdi zmdi-menu"></i>
                </div>
                <div class="account2">
                    <div class="image img-cir img-120" style="background-color:cadetblue">
                        <h1 align="center" style="font-size:50px; padding-top:25%; color:white"><span class="fas fa-user"></span></h1>
                    </div>
                    <h4 class="name">{{ Auth::user()->first_name }}</h4>
                    <span>{{ Auth::user()->email }}</span>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="/home">
                                <i class="fas fa-home"></i>Home
                            </a>
                        </li>
                        {{-- <li>
                            <a href="/test">
                                <i class="fas fa-book"></i>Know Course</a>
                            <span class="inbox-num"><i class="fa fa-arrow-right"></i></span>
                        </li> --}}
                        <li>
                            <a href="/account">
                                <i class="fas fa-user"></i>Account</a>
                        </li>
                        <li>
                            <a href="/feedbacks">
                                <i class="fas fa-edit"></i>Feedback</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-power-off"></i>Log Out</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END HEADER DESKTOP-->
        @endguest