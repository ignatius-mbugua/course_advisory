<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Course;
use App\Aggregate;

class CourseFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $aggregate = Aggregate::where('user_id', auth()->user()->id)->firstOrFail();
        $user_aggregate =  $aggregate->point;
       
        if($user_aggregate >= 58){
            $level_of_study = "Bachelor of:";
        }
        else if($user_aggregate <58 ){
            $level_of_study= "Diploma/Certificate in:";
        }
        $courses = $request->data;
        $field = $request->field;
        $qualified_courses = array();
        foreach($courses as $index => $course){
            $temp = Course::where('name', $course)->firstOrFail();
            $temp_field_id = $temp->field_id;
            if($temp_field_id == $field){
                $qualified_courses[$index] = $course;
            }
            
        }
       return view('fields.qualified_courses', ['courses'=>$qualified_courses , 'field_id'=>$field, 'level_of_study'=>$level_of_study, 'user_aggregate'=>$user_aggregate]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
