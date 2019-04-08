@extends('Admin1.layout.admin')

@section('content')
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Colleges</a> </div>
      <h1>Update College</h1>
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
              <h5>Update College</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal" action="/colleges/{{$college->id}}" method="POST">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label">College Name</label>
                        <div class="controls">
                            <input type="text" name="name" id="name" value="{{$college->name}}" placeholder="Enter College Name">
                            {{ method_field('PUT') }}
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