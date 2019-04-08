@extends('Admin1.layout.admin')

@section('content')
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Fields</a> </div>
      <h1>Fields</h1>
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
              <h5>Fields table</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Field ID</th>
                            <th>Field Name</th>
                            <th>Field Image</th>
                            <th>Personalities</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fields as $field)
                            <tr class="gradeX">
                                <td>{{$field->id}}</td>
                                <td>{{$field->name}}</td>
                                <td><img src="/storage/images/fields/{{$field->image_name}}" height="150" width="150"> </td>
                                <td>
                                    @foreach($field->personalities as $personality)
                                        {{$personality->name}} <br>
                                    @endforeach
                                </td>
                                <td align="center">
                                    <a href="/fields/{{$field->id}}/edit" class="btn btn-primary btn-mini">Edit</a>
                                    
                                    <form method="POST" action="/fields/{{$field->id}}" class="pull-right">
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