@extends('Admin1.layout.admin')

@section('content')
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Index Numbers</a> </div>
      <h1>Index Numbers</h1>
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
              <h5>Index Numbers table</h5>
            </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Index Number</th>
                        <th>Subjects</th>
                        <th>Point</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($indices as $index)
                        <tr class="gradeX">
                            <td>{{$index->index_no}}</td>
                            <td>
                                @foreach($index->subjects as $subject)
                                    {{ $subject->name }} <br>
                                @endforeach
                            </td>
                            <td>{{$index->point}}</td>
                            <td align="center">
                                <a href="/indices/{{$index->id}}/edit" class="btn btn-primary btn-mini">Edit</a>

                                <form method="POST" action="/indices/{{$index->id}}" class="pull-right">
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