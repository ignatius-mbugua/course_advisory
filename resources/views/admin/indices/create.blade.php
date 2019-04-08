@extends('Admin1.layout.admin')

@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Index Numbers</a> </div>
      <h1>Post Index Number</h1>
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
                    <h5>Post Index Number</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" id="myform" action="{{ route('indices.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Index Number</label>
                                <div class="controls">
                                    <input type="number" name="index_no" id="index_no" placeholder="Index Number" min="0" required>
                                </div>
                                @if($errors->has('index_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('index_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="control-group">
                                <label class="control-label">Points</label>
                                <div class="controls">
                                    <input type="number" name="points" id="points" placeholder="Points" required min="0" max="100">
                                </div>
                                @if($errors->has('points'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('points') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="control-group">
                                <label class="control-label">Required Subjects</label>
                                <div class="controls">
                                    @foreach($subjects as $subject)
                                        <input type="checkbox" name="subjects[]"  value="{{$subject->name}}">{{$subject->name}} <br>
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