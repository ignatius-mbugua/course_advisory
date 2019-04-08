@extends('Admin1.layout.admin')

@section('content')
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Users</a> </div>
      <h1>Change Role</h1>
    </div>
    <div class="container-fluid">
        @include('Admin1.inc.messages')
    </div>
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Change Role</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal" action="/users/{{$user->id}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="control-group">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <input type="text" name="first_name" id="first_name" value="{{$user->first_name}}" disabled>
                        </div>
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <input type="text" name="last_name" id="last_name" value="{{$user->last_name}}" disabled>
                        </div>
                        <label class="control-label">Role</label>
                        <div class="controls">
                            <select name="role" id="role">
                                <option value=""disabled selected>Select Role...</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input class="btn btn-success" type="submit" value="Update" name="submit" id="submit">
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection