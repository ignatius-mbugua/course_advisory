@extends('layouts.profile')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Feedback</strong>
                        <small></small>
                    </div>
                    <div class="container-fluid">
                        @include('inc.messages')
                    </div>
                    <div class="card-body card-block">
                        <form id="myform" action="{{ route('feedbacks.store') }}" method="post">
                            {{ csrf_field() }}
                            <h3>Were you satisfied?</h3>
                            <input type="radio" name="satisfaction" id="satisfaction" value="Yes">Yes <br>
                            <input type="radio" name="satisfaction" id="satisfaction" value="No">No
                            <hr>
                            <div class="form-group">
                              <label for="comment">Comment:</label>
                              <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                              </div>
                            <div id="button_div" align="center" class="col-lg-5">
                                <input id="submit_btn" class="btn btn-success" type="submit" name="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection