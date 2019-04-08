@extends('layouts.profile')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{asset('admin/css/uniform.css ')}}" />
<link rel="stylesheet" href="{{asset('admin/css/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/matrix-media.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/jquery.gritter.css') }}" />
@endsection
@section('content')

@php
$field = App\Field::where('id', $field_id)->pluck('name');
@endphp
<div id="content" >
    <div id="content-header">
      <h1>Courses</h1>
    </div>
    <div class="container-fluid">
      <hr>
       <h3>Level of study: <b style="color: red;">{{$level_of_study}}</b></h3>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Courses table</h5>
            </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <!-- <th>Field</th> -->
                        <!-- <th>Required Subjects</th> -->
                        <th>Institutions</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        @php
                        $course_details = App\Course::where('name', $course)->firstOrFail();
                        @endphp
                        <tr class="gradeX">
                            <td>{{$course}}</td>
                            <td>
                                @if($user_aggregate >= 58)
                                    @foreach($course_details->institutions as $institution) 
                                        {{$institution->name}} <br>
                                    @endforeach
                                @elseif($user_aggregate <58 )
                                    @foreach($course_details->colleges as $college)
                                        {{$college->name}} <br> 
                                    @endforeach
                                @endif
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
@section('scripts')
    <script src="{{ asset('admin/js/jquery.uniform.js') }}"></script>
    <script src="{{ asset('admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.validate.js') }}"></script>  
    <script src="{{ asset('admin/js/matrix.js') }}"></script> 
    <script src="{{ asset('admin/js/matrix.form_validation.js') }}"></script>  
    <script src="{{ asset('admin/js/matrix.tables.js') }}"></script> 
@endsection