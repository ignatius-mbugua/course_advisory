@extends('Admin1.layout.admin')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Fields</a> </div>
                <h1>Update Field</h1>
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
                        <h5>Post Field</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" action="/fields/{{$field->id}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="control-group">
                                    <label class="control-label">Field Name</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" value="{{$field->name}}" placeholder="Enter Field Name">    
                                    </div>
                                    <label class="control-label">Personalities</label>
                                    <div class="controls">
                                        @foreach($personalities as $personality)
                                            <input type="checkbox" name="personalities[]"  value="{{$personality->name}}" @foreach($field->personalities as $personties) @if($personties->name == $personality->name){! checked !} @endif @endforeach>{{$personality->name}} <br>
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