@extends('layouts.profile')

@section('content')
<div class="main-content">
    <div class="container-fluid">
        <section>
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="zmdi zmdi-home"></i><span class="seefour" align="center">{{$field->name}}</span> 
                                    </h3>
                                </div>
                                <div class="au-task js-list-load">
                                    <div class="au-task-list js-scrollbar3">
                                                @foreach($field->courses as $course)
                                        <div class="au-task__item au-task__item--success">
                                            <div class="au-task__item-inner">
                                                <h5 class="task">
                                                    
                                                        {{$course->name}}
                                                    
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection