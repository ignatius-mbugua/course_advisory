@extends('Admin1.layout.admin')

@section('content')
    <div id="content">
        <div id="content-header">
          <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Users</a> </div>
          <h1>Users</h1>
        </div>
        <div class="container-fluid">
            @include('Admin1.inc.messages')
        </div>
        <div class="container-fluid">
          <hr>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                  <h5>Users table</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Role</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                @if($user->id != Auth::user()->id)
                                    <tr class="gradeX">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        @if($user->role_id == 1)
                                            <td>User</td>
                                        @else
                                            <td>Administrator</td>
                                        @endif
                                        <td>{{$user->gender}}</td>
                                        <td>{{$user->email}}</td>
                                        <td align="center">
                                            <a href="/users/{{$user->id}}/edit" class="btn btn-primary btn-mini">Edit Role</a>

                                            <form method="POST" action="/users/{{$user->id}}" class="pull-right">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <input class="btn btn-danger btn-mini" type="submit" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection