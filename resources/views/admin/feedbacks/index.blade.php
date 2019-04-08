@extends('Admin1.layout.admin')

@section('content')
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Feedback</a> </div>
      <h1>Feedback</h1>
    </div>
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Feedback table</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Student</th>
                    <th>Satisfied</th>
                    <th>Comment</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($feedbacks as $feedback)
                        <tr class="gradeX">
                            <td>
                                {{$feedback->user->first_name }}
                                {{$feedback->user->last_name }}
                            </td>
                            <td>{{$feedback->satisfied}}</td>
                            <td>{{$feedback->comment}}</td>
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