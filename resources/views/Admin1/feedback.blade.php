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
                    <th>ID</th>
                    <th>Response</th>
                    <th>Comment</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="gradeX">
                    <td>ID</td>
                    <td>Internet
                      Explorer 4.0</td>
                    <td>Win 95+</td>
                    <td align="center"><a href="" class="btn btn-primary btn-mini">Edit</a>  <a id="delete" href="" class="btn btn-danger btn-mini">Delete</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection