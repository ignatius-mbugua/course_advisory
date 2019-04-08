@extends('layouts.profile')

@section('content')
<div class="main-content">
    <div class="container-fluid">
        <section>
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="jumbotron"><h2 class="green" align="center">Update Information</h2></div>
                    <div class="col-md-12 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="/account/{{Auth::user()->id}}">
                                    {{ csrf_field() }}
            
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="first_name" class="col-md-4 control-label">First Name</label>
            
                                        <div class="col-md-6">
                                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}" required autofocus>
            
                                            @if ($errors->has('first_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="last_name" class="col-md-4 control-label">Last Name</label>
            
                                        <div class="col-md-6">
                                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}" required autofocus>
            
                                            @if ($errors->has('last_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                    <label for="gender" class="col-md-4 control-label">Gender</label>
                                        <div id="gender">
                                            @if(Auth::user()->gender == "male")
                                                <input type="radio" name="gender" value="male" id="male" checked><label>Male</label>
                                                <input type="radio" name="gender" value="female" id="female"> <label>Female</label>
                                            @elseif(Auth::user()->gender == "female")
                                                <input type="radio" name="gender" value="male" id="male" ><label>Male</label>
                                                <input type="radio" name="gender" value="female" id="female" checked> <label>Female</label>
                                            @endif    
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Password</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>
            
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="password" class="col-md-4 control-label">Confirm Password</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <input name="_method" type="hidden" value="PUT">
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection