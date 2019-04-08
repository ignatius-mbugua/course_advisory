@extends('layouts.profile')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('inc.messages')
                <div class="card">
                    <div class="card-header">
                        <strong>Index Number</strong>
                    </div>
                    <div class="card-body card-block">
                        <form id="myform" action="{{ route('subject_filter_submit') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4 style="padding-left:20px">
                                        KCSE Index Number
                                    </h4>
                                    <br>
                                </div>
                                <div class="col-lg-3 form-group">
                                    <input id="index_no" class="is-valid form-control-success form-control" style="margin-left:10px" type="number" name="index_no" min="1">
                                </div>
                                @if($errors->has('index_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('index_no') }}</strong>
                                    </span>
                                @endif
                            <div id="button_div" align="center" class="col-lg-5">
                                <input id="submit_btn" class="btn btn-success" type="submit" name="submit" value="Submit">
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection