@extends('Admin1.layout.admin')

@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Courses</a> </div>
      <h1>Post Course</h1>
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
                    <h5>Post Course</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" id="myform" action="{{ route('courses.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Course Name</label>
                                <div class="controls">
                                    <input type="text" name="course_name" id="course_name" placeholder="Course Name" required>
                                </div>
                                @if($errors->has('course_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('course_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="control-group">
                                <label class="control-label">Field</label>
                                <div class="controls">
                                    <select id="course_field" name="course_field">
                                        <option value="" selected disabled>Choose Field...</option>
                                        @foreach($fields as $field)
                                            <option value="{{$field->name}}">{{$field->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Required Subjects</label>
                                <div class="controls">
                                    @foreach($subjects as $subject)
                                        <input type="checkbox" name="subjects[]"  value="{{$subject->name}}">{{$subject->name}} <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Universities Offering</label>
                                <div class="controls">
                                    @foreach($institutions as $institution)
                                        <input type="checkbox" name="institutions[]"  value="{{$institution->name}}">{{$institution->name}} <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Colleges Offering</label>
                                <div class="controls">
                                    @foreach($colleges as $college)
                                        <input type="checkbox" name="colleges[]"  value="{{$college->name}}">{{$college->name}} <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-actions">
                                <input class="btn btn-success" type="submit" value="Post" name="submit" id="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection