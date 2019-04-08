<!--Header-part-->
<div id="header">
    <h1><a href="/admin_home">Course Advisor</a></h1>
  </div>
  <!--close-Header-part--> 
  
  
  <!--top-Header-menu-->
  <div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
      <li  class="dropdown" id="profile-messages" ><a title="" disabled data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome Admin</span></a>
      </li>
    </ul>
  </div>
  <!--close-top-Header-menu-->
  <!--start-top-serch-->
  <div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
  </div>
  <!--close-top-serch-->
  <!--sidebar-menu-->
  <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
      <li><a href="/admin/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li><a href="{{ route('users.index') }}"><i class="icon icon-user"></i> <span>Users</span></a> </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Fields</span></a>
        <ul>
          <li><a href="{{ route('fields.index') }}"><i class="icon icon-eye-open"></i> <span>View Fields</span></a></li>
          <li><a href="{{ route('fields.create') }}"><i class="icon icon-edit"></i> <span>Add Field</span></a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Courses</span></a>
        <ul>
          <li><a href="{{ route('courses.index') }}"><i class="icon icon-eye-open"></i> <span>View Courses</span></a></li>
          <li><a href="{{ route('courses.create') }}"><i class="icon icon-edit"></i> <span>Add Courses</span></a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Universities</span></a>
        <ul>
          <li><a href="{{ route('institutions.index') }}"><i class="icon icon-eye-open"></i> <span>View Universities</span></a></li>
          <li><a href="{{ route('institutions.create') }}"><i class="icon icon-edit"></i> <span>Add Universities</span></a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Colleges</span></a>
        <ul>
          <li><a href="{{ route('colleges.index') }}"><i class="icon icon-eye-open"></i> <span>View Colleges</span></a></li>
          <li><a href="{{ route('colleges.create') }}"><i class="icon icon-edit"></i> <span>Add Colleges</span></a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Subjects</span></a>
        <ul>
          <li><a href="{{ route('subjects.index') }}"><i class="icon icon-eye-open"></i> <span>View Subjects</span></a></li>
          <li><a href="{{ route('subjects.create') }}"><i class="icon icon-edit"></i> <span>Add Subjects</span></a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Index Numbers</span></a>
        <ul>
          <li><a href="{{ route('indices.index') }}"><i class="icon icon-eye-open"></i> <span>View Index Numbers</span></a></li>
          <li><a href="{{ route('indices.create') }}"><i class="icon icon-edit"></i> <span>Add Index Numbers</span></a></li>
        </ul>
      </li>
      <li><a href="{{ route('feedbacks.index') }}"><i class="icon icon-share-alt"></i> <span>Feedback</span></a> </li>
      <li>
          <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
              <i class="icon icon-off"></i> <span>Log Out</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </li>
      
    </ul>
  </div>
  <!--sidebar-menu-->