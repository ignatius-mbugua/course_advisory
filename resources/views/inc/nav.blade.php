<!-- Header -->
<header id="header">
        <div class="container">
    
          <div id="logo" class="pull-left">
            <h1><a href="/">Course Advisor</a></h1>
          </div>
    
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li><a href="/">Home</a></li>
              <li><a href="/">Know Course</a></li>
              <li><a href="/">Testmonials</a></li>
              <!-- Authentication Links -->
              @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
          </nav>
          <!-- #nav-menu-container -->
        </div>
      </header>
      <!-- #header -->