@extends('layouts.profile')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="page-wrapper">
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
        <!-- BREADCRUMB-->
        <section class="au-breadcrumb m-t-75">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="/">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Profile</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END BREADCRUMB-->

        <!-- STATISTIC-->
        <section class="statistic">
            <div class="container-fluid">
                @include('inc.messages')
            </div>
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        @can('not_taken_test')
                            <div class="col-md-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <h2 class="number">Know Your Personality</h2>
                                    <span class="desc white"><a href="/test">Proceed</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-home white"></i>
                                    </div>
                                </div>
                            </div>
                        @elsecan('taken_test')
                            <div class="col-md-6 col-lg-6">
                                <div class="overview-item overview-item--c1">
                                    <a href="/{{ $personality->name }}"><h2 class="number"><b>{{ $personality->name }}</b></h2></a> <br>
                                    <span class="desc white">Personality</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                    <div class="overview-item overview-item--c2">
                                        <h2 class="number">{{ $personality->fields->count() }}</h2>
                                        <span class="desc white">Fields Of Study</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-file white"></i>
                                        </div>
                                    </div>
                                </div>
                        @endcan
                    </div>
                </div>
            </div>
        </section>
        <!-- END STATISTIC-->
        
        <!-- Start row -->
        @can('taken_test')
            <section id="courses" class="statistic">
                    <div>
                    
      
                        @can('entered_aggregate')
                        <h2 class="title-1" >Fields of Study You Qualify with filtered courses:</h2><br>   
                    <form action="{{ route('coursefilter.store') }}" method="post">
                            {{ csrf_field() }}
                                @foreach($courses_array as $course_array)
                                    @foreach($course_array as $course)
                                    <input type="hidden" name="data[]" value="{{$course}}">
                                    @endforeach
                                @endforeach
                                    <div class="row">
                                    @foreach($fields as $field)
                                    
                                    <div class="col-md-4" >
                                        <div class="card">
                                        <img class="card-img-top"  style="height:200px;" src="{{ asset('/images/fields/'.$field->image_name ) }}" alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title mb-3">{{$field->name}}</h4>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                
                                                        <button type="submit" name="field" value="{{$field->id}}">
                                                            <i class="fa fa-eye"></i> View Courses
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                
                                    @endforeach
                                    </div>
       
                        @else
                        <h2 class="title-1" align="center">Fields of Study You have Qualified:</h2>
                        <hr>
                        <div class="row">
                            @foreach($personality->fields as $field)
                                <div class="col-md-4">                            
                                    <div class="card">
                                    <img class="card-img-top" src="{{ asset('/images/fields/'.$field->image_name ) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title mb-3">{{$field->name}}</h4>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <a href="/fields/{{$field->id}}">
                                                        <i class="fa fa-eye"></i> View Courses
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>                                   
                                </div>
                            @endforeach
                        </div>
                        <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Done KCSE? Enter Index Number</h2>
                                        <a href="/subjectentry"><button class="au-btn au-btn-icon au-btn--green">
                                            Continue <i class="zmdi zmdi-arrow-right"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        @endcan
                        <hr>
                        <br>
                    </div>
                </section>
                <!-- END ROW -->
        
                <!-- Start row -->
                {{-- <section>
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                        <div class="au-card-title" style="background-image:url('images/Institution.jpg');">
                                            <div class="bg-overlay bg-overlay--blue"></div>
                                            <h3>
                                                <i class="zmdi zmdi-home"></i><span class="seefour">INSTITUTIONS</span> 
                                            </h3>
                                        </div>
                                        <div class="au-task js-list-load">
                                            <div class="au-task-list js-scrollbar3">
                                                <div class="au-task__item au-task__item--success">
                                                    <div class="au-task__item-inner">
                                                        <h5 class="task">
                                                            Meru University of Science and Technology
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-task__footer">
                                                <button class="au-btn au-btn-load js-load-btn">load more</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}
                <!-- END ROW -->
            </div>
        @endcan

</div>
@endsection