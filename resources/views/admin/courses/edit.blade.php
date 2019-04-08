@extends('Admin1.layout.admin')

@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Courses</a> </div>
      <h1>Update Course</h1>
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
                        <h5>Update Course</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" id="myform" action="/courses/{{$course->id}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="control-group">
                                <label class="control-label">Course Name</label>
                                <div class="controls">
                                    <input type="text" name="course_name" id="course_name" placeholder="Course Name" value="{{$course->name}}" required>
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
                                    <select id="course_field" name="course_field" value="{{$course->field->name}}">
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
                                        <input type="checkbox" name="subjects[]"  value="{{$subject->name}}" @foreach($course->subjects as $sbj) @if($sbj->name == $subject->name){! checked !} @endif @endforeach>{{$subject->name}} <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Universities Offering</label>
                                <div class="controls">
                                    @foreach($institutions as $institution)
                                        <input type="checkbox" name="institutions[]"  value="{{$institution->name}}" @foreach($course->institutions as $institute) @if($institute->name == $institution->name){! checked !} @endif @endforeach>{{$institution->name}} <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="control-group">
                                    <label class="control-label">Colleges Offering</label>
                                    <div class="controls">
                                        @foreach($colleges as $college)
                                            <input type="checkbox" name="colleges[]"  value="{{$college->name}}" @foreach($course->colleges as $colle) @if($colle->name == $college->name){! checked !} @endif @endforeach>{{$college->name}} <br>
                                        @endforeach
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