@extends('Admin1.layout.admin')

@section('content')
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="/admin_home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Institution</a> </div>
      <h1>Courses</h1>
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
              <h5>Courses table</h5>
            </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Field</th>
                        <th>Required Subjects</th>
                        <th>Universities</th>
                        <th>Colleges</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr class="gradeX">
                            <td>{{$course->id}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->field->name}}</td>
                            <td>
                                @foreach($course->subjects as $subject)
                                    {{$subject->name}} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($course->institutions as $institution)
                                    {{$institution->name}} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($course->colleges as $college)
                                    {{$college->name}} <br>
                                @endforeach
                            </td>
                            
                            <td align="center">
                                <a href="/courses/{{$course->id}}/edit" class="btn btn-primary btn-mini">Edit</a>

                                <form method="POST" action="/courses/{{$course->id}}" class="pull-right">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger btn-mini" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
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