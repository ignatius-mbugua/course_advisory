@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="css/style.css">
<section id="sectionregistration">
<div class="container">
  <div class="jumbotron text-centre">
        <div class="panel panel-default">
                    <div class="panel-heading">
                         
        <h2 class="text-primary" align="centre">Registration Form</h2></br>
        <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}


          <div class="row">
            <div class="col-lg-6">
            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <label for="first_name">First Name</label>
              <input id="first_name" type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autofocus>
              @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                 @endif
            </div>
            </div>
              <div class="col-lg-6">
              <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                  <label for="last_name">Last Name</label>
                  <input id="last_name" type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required autofocus>

                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                </div>
              </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" >Email</label>
            <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
          </div>

          <div class="form-group">
              <label>Gender: </label>
              <input type="radio" name="gender" value="male" id="male">   <label>Male</label>
              <input type="radio" name="gender" value="female" id="female"> <label>Female</label>
            </div>
            
          <div class="row">
            <div class="col-lg-6">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password"> Password</label>
                <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                 @endif
              </div>
            </div>
              <div class="col-lg-6">
                <div class="form-group">
                      <label for="password-confirm" >Confirm Password</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
              </div>
        </div>

          <div class="form-group submit">
            <input class="btn btn-success " type="submit" name="add" id="add" value="Submit">
          </div>
        </form>

      </div>
</div>
</div>
</section>
@endsection
