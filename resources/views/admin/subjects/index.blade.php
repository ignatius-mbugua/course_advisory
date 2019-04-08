@extends('Admin1.layout.admin')

@section('content')
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Subject</a> </div>
      <h1>Subjects</h1>
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
              <h5>Subjects table</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>                       
                        @foreach($subjects as $subject)
                            <tr class="gradeX">
                                <td>{{$subject->id}}</td>
                                <td>{{$subject->name}}</td>
                                <td align="center">
                                    <a href="subjects/{{$subject->id}}/edit" class="btn btn-primary btn-mini">Edit</a>
                                    <form action="subjects/{{$subject->id }}" method="POST" class="pull-right">
                                        {{ csrf_field() }}
                                        {{method_field('DELETE')}}
                                        <input type="submit" class="btn btn-danger btn-mini" value="Delete">
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