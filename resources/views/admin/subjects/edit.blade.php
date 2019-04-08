@extends('Admin1.layout.admin')

@section('content')
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Subjects</a> </div>
      <h1>Update Subject</h1>
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
              <h5>Post Subject</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal" id="myform" action="/subjects/{{$subject->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="control-group">
                        <label class="control-label">Subject Name</label>
                        <div class="controls">
                            <input type="text" name="name" id="name" placeholder="Enter Subject Name" value="{{$subject->name}}" required>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Update" id="submit" name="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection