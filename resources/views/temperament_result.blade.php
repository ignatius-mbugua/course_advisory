@extends('layouts.master')

@section('content')
    @if($personality_type == "ESTJ")
        @include('temperaments.ESTJ')
    @endif

    @if($personality_type == "ISTJ")
        @include('temperaments.ISTJ')
    @endif

    @if($personality_type == "ISFJ")
        @include('temperaments.ISFJ')
    @endif

    @if($personality_type == "ESFJ")
        @include('temperaments.ESFJ')
    @endif

    @if($personality_type == "INFJ")
        @include('temperaments.INFJ')
    @endif

    @if($personality_type == "INTJ")
        @include('temperaments.INTJ')
    @endif

    @if($personality_type == "ENFJ")
        @include('temperaments.ENFJ')
    @endif

    @if($personality_type == "ISTP")
        @include('temperaments.ISTP')
    @endif

    @if($personality_type == "ISFP")
        @include('temperaments.ISFP')
    @endif

    @if($personality_type == "INFP")
        @include('temperaments.INFP')
    @endif

    @if($personality_type == "INTP")
        @include('temperaments.INTP')
    @endif

    @if($personality_type == "ENTJ")
        @include('temperaments.ENTJ')
    @endif

    @if($personality_type == "ESTP")
        @include('temperaments.ESTP')
    @endif

    @if($personality_type == "ESFP")
        @include('temperaments.ESFP')
    @endif

    @if($personality_type == "ENFP")
        @include('temperaments.ENFP')
    @endif

    @if($personality_type == "ENTP")
        @include('temperaments.ENTP')
    @endif

    
@endsection


