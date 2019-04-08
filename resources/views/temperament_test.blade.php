@extends('layouts.profile')

@section('content')

<!-- WELCOME-->
<section class="welcome2 p-t-40 p-b-55">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="welcome2-inner m-t-60">
                    <div class="welcome2-greeting">
                        <h1 class="title-6">Hi
                            <span>{{ Auth::user()->first_name }}</span>, Want to know your most suitable courses?</h1>
                        <p><div class="panel-heading">Choose one answer in the questions below:</div></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END WELCOME-->
<section>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('result') }}" method="POST">
                            {{ csrf_field() }} 
                        1.<br>
                        <input type="radio" name="quest1" id="quest1" value="a" {{old('quest1') == "a" ? 'checked':''}}> I am energized and comfortable in a group of people <br>
                        <input type="radio" name="quest1" id="quest1" value="b" {{old('quest1') == "b" ? 'checked':''}}>I am comfortable when in seclusion and love one on one conversation<br>
                        @if($errors->has('quest1'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest1') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        2.<br>
                        <input type="radio" name="quest2" id="quest2" value="a" {{old('quest2') == "a" ? 'checked':''}}>I literally interpret things<br>
                        <input type="radio" name="quest2" id="quest2" value="b" {{old('quest2') == "b" ? 'checked':''}}>I seek to find meaning of things as my way of interpretation<br>
                        @if($errors->has('quest2'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest2') }}</strong>
                            </span>
                        @endif
                        <p></p>
                        3.<br>
                        <input type="radio" name="quest3" id="quest3" value="a" {{old('quest3') == "a" ? 'checked':''}}>I am driven by logical thinking and questioning.<br>
                        <input type="radio" name="quest3" id="quest3" value="b" {{old('quest3') == "b" ? 'checked':''}}>I am empathetic and can easily make decisions depending on my feelings.<br>
                        @if($errors->has('quest3'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest3') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        4.<br>
                        <input type="radio" name="quest4" id="quest4" value="a" {{old('quest4') == "a" ? 'checked':''}}>Am usually organized and orderly<br>
                        <input type="radio" name="quest4" id="quest4" value="b" {{old('quest4') == "b" ? 'checked':''}}>Am flexible and easily adaptable.<br>
                        @if($errors->has('quest5'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest5') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        5.<br>
                        <input type="radio" name="quest5" id="quest5" value="a" {{old('quest5') == "a" ? 'checked':''}}>Am more outgoing and love thinking out loud.<br>
                        <input type="radio" name="quest5" id="quest5" value="b" {{old('quest5') == "b" ? 'checked':''}}>Am more reserved and love thinking to myself.<br>
                        @if($errors->has('quest5'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest5') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        6.<br>
                        <input type="radio" name="quest6" id="quest6" value="a" {{old('quest6') == "a" ? 'checked':''}}>I am more practical, realistic and experimental.<br>
                        <input type="radio" name="quest6" id="quest6" value="b" {{old('quest6') == "b" ? 'checked':''}}>I am imaginative, innovative and very detailed.<br>
                        @if($errors->has('quest6'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest6') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        7.<br>
                        <input type="radio" name="quest7" id="quest7" value="a" {{old('quest7') == "a" ? 'checked':''}}>Straight forward to the point and frank, that’s me.<br>
                        <input type="radio" name="quest7" id="quest7" value="b" {{old('quest7') == "b" ? 'checked':''}}>Tactful, kind and encouraging, that’s me.<br>
                        @if($errors->has('quest6'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest6') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        8.<br>
                        <input type="radio" name="quest8" id="quest8" value="a" {{old('quest8') == "a" ? 'checked':''}}>I strictly follow a schedule that is planned.<br>
                        <input type="radio" name="quest8" id="quest8" value="b" {{old('quest8') == "b" ? 'checked':''}}>I rarely plan myself but am spontaneous.<br>
                        @if($errors->has('quest8'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest8') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        9.<br>
                        <input type="radio" name="quest9" id="quest9" value="a" {{old('quest9') == "a" ? 'checked':''}}>I easily interact with new people and love public activities.<br>
                        <input type="radio" name="quest9" id="quest9" value="b" {{old('quest9') == "b" ? 'checked':''}}>Love private and solitary activities with quiet to concentrate.<br>
                        @if($errors->has('quest9'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest9') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        10.<br>
                        <input type="radio" name="quest10" id="quest10" value="a" {{old('quest10') == "a" ? 'checked':''}}>I love the way conventional things are, usual and standard.<br>
                        <input type="radio" name="quest10" id="quest10" value="b" {{old('quest10') == "b" ? 'checked':''}}>I love uniqueness and somehow challenging the standards.<br>
                        @if($errors->has('quest10'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest10') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        11.<br>
                        <input type="radio" name="quest11" id="quest11" value="a" {{old('quest11') == "a" ? 'checked':''}}>I am firm and tend to criticize a lot.<br>
                        <input type="radio" name="quest11" id="quest11" value="b" {{old('quest11') == "b" ? 'checked':''}}>I am gentle and easily appreciate.<br>
                        @if($errors->has('quest11'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest11') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        12.<br>
                        <input type="radio" name="quest12" id="quest12" value="a" {{old('quest12') == "a" ? 'checked':''}}>I am regulated and love following a structured life.<br>
                        <input type="radio" name="quest12" id="quest12" value="b" {{old('quest12') == "b" ? 'checked':''}}>I am easy going and can easily fit in other peoples' schedules.<br>
                        @if($errors->has('quest12'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest12') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        13.<br>
                        <input type="radio" name="quest13" id="quest13" value="a" {{old('quest13') == "a" ? 'checked':''}}>I love being understood by expressing myself, through communication.<br>
                        <input type="radio" name="quest13" id="quest13" value="b" {{old('quest13') == "b" ? 'checked':''}}>I keep to myself and internally reason out things.<br>
                        @if($errors->has('quest13'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest13') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        14.<br>
                        <input type="radio" name="quest14" id="quest14" value="a" {{old('quest14') == "a" ? 'checked':''}}>I care so much about now and here, the current situation at hand.<br>
                        <input type="radio" name="quest14" id="quest14" value="b" {{old('quest14') == "b" ? 'checked':''}}>I focus with how things will play out in the future having the big picture in mind.<br>
                        @if($errors->has('quest14'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest14') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        15.<br>
                        <input type="radio" name="quest15" id="quest15" value="a" {{old('quest15') == "a" ? 'checked':''}}>I am usually just and tough in my decisions.<br>
                        <input type="radio" name="quest15" id="quest15" value="b" {{old('quest15') == "b" ? 'checked':''}}>I am tender-hearted in my doings and often merciful.<br>
                        @if($errors->has('quest15'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest15') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        16.<br>
                        <input type="radio" name="quest16" id="quest16" value="a" {{old('quest16') == "a" ? 'checked':''}}>I love being well prepared and planned beforehand.<br>
                        <input type="radio" name="quest16" id="quest16" value="b" {{old('quest16') == "b" ? 'checked':''}}>I can easily adapt as we go on, fit with the flow.<br>
                        @if($errors->has('quest16'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest16') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        17.<br>
                        <input type="radio" name="quest17" id="quest17" value="a" {{old('quest17') == "a" ? 'checked':''}}>I actively initiate things and get fully involved in them.<br>
                        <input type="radio" name="quest17" id="quest17" value="b" {{old('quest17') == "b" ? 'checked':''}}>I deliberate on things reflectively.<br>
                        @if($errors->has('quest18'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest18') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        18.<br>
                        <input type="radio" name="quest18" id="quest18" value="a" {{old('quest18') == "a" ? 'checked':''}}>I love being factual and realistic, dealing with what there is.<br>
                        <input type="radio" name="quest18" id="quest18" value="b" {{old('quest18') == "b" ? 'checked':''}}>Am more of a dreamer, idealistic person, thinking of what could be (philosophical).<br>
                        @if($errors->has('quest18'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest18') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        19.<br>
                        <input type="radio" name="quest19" id="quest19" value="a" {{old('quest19') == "a" ? 'checked':''}}>I am more of fact and issue oriented person. Deal with facts.<br>
                        <input type="radio" name="quest19" id="quest19" value="b" {{old('quest19') == "b" ? 'checked':''}}>I am sensitive and people oriented and usually compassionate.<br>
                        @if($errors->has('quest19'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest19') }}</strong>
                            </span>
                        @endif
                        <p></p>

                        20.<br>
                        <input type="radio" name="quest20" id="quest20" value="a" {{old('quest20') == "a" ? 'checked':''}}>I love being under control and governance.<br>
                        <input type="radio" name="quest20" id="quest20" value="b" {{old('quest20') == "b" ? 'checked':''}}>I simply love my freedom of space.<br>
                        @if($errors->has('quest20'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('quest20') }}</strong>
                            </span>
                        @endif
                        <p></p>
                        <input class="btn btn-lg btn-success" type="submit" value="Submit" name="submit" id="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection