@extends('layouts.profile')

@section('content')
<br><br><br><br>

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
            
            
        
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('/images/fields/'.$field->image_name ) }}" alt="Card image cap">
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
       
      
@endsection