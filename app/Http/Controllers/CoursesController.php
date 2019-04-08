<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Field;
use App\Institution;
use App\College;
use App\Subject;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all();
        return view('admin.courses.index', ['courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fields = Field::all();
        $institutions = Institution::all();
        $colleges = College::all();
        $subjects = Subject::all();
        return view('admin.courses.create', ['fields'=>$fields, 'institutions'=>$institutions, 'colleges'=>$colleges, 'subjects'=>$subjects]);
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
        $this->validate($request, [
            'course_name' => 'required',
            'course_field' => 'required',
            'subjects'=>'required',
            'institutions'=>'required',
            'colleges'=>'required'
        ]);

        $subjects_id = array();
        $subjects = $request->subjects;
        foreach($subjects as $index => $subject){
            $subj = Subject::where('name', $subject)->firstOrFail();
            $subjects_id[$index] = $subj->id;
        }
        
        $institutions_id = array();
        $institutions = $request->institutions;
        foreach($institutions as $index => $institution){
            $institute = Institution::where('name', $institution)->firstOrFail();
            $institutions_id[$index] = $institute->id;
        }

        $colleges_id = array();
        $colleges = $request->colleges;
        foreach($colleges as $index => $college){
            $colle = College::where('name', $college)->firstOrFail();
            $colleges_id[$index] = $colle->id;
        }

        $field = $request->input('course_field');
        $field_id = Field::where('name', $field)->pluck('id');

        $course = new Course;
        $course->name = $request->course_name;
        $course->field_id = $field_id[0];
        $course->save();
        $course->institutions()->sync($institutions_id);
        $course->colleges()->sync($colleges_id);
        $course->subjects()->sync($subjects_id);
        return redirect('/courses')->with('success', 'Course created'); 
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
        $course = Course::find($id);
        $fields = Field::all();
        $subjects = Subject::all();
        $institutions = Institution::all();
        $colleges = College::all();
        return view('admin.courses.edit', ['course'=>$course, 'fields'=>$fields, 'subjects'=>$subjects, 'institutions'=>$institutions, 'colleges'=>$colleges]);
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
        $this->validate($request, [
            'course_name' => 'required',
            'course_field' => 'required',
            'subjects'=>'required',
            'institutions'=>'required',
            'colleges'=>'required'
        ]);

        $subjects_id = array();
        $subjects = $request->subjects;
        foreach($subjects as $index => $subject){
            $subj = Subject::where('name', $subject)->firstOrFail();
            $subjects_id[$index] = $subj->id;
        }
        
        $institutions_id = array();
        $institutions = $request->institutions;
        foreach($institutions as $index => $institution){
            $institute = Institution::where('name', $institution)->firstOrFail();
            $institutions_id[$index] = $institute->id;
        }

        $colleges_id = array();
        $colleges = $request->colleges;
        foreach($colleges as $index => $college){
            $colle = College::where('name', $college)->firstOrFail();
            $colleges_id[$index] = $colle->id;
        }

        $field = $request->input('course_field');
        $field_id = Field::where('name', $field)->pluck('id');

        $course = Course::find($id);
        $course->name = $request->course_name;
        $course->field_id = $field_id[0];
        $course->save();
        $course->institutions()->sync($institutions_id);
        $course->subjects()->sync($subjects_id);
        $course->colleges()->sync($colleges_id);
        return redirect('/courses')->with('success', 'Course updated');
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
        $course = Course::find($id);
        $course->delete();
        return redirect('/courses')->with('success', 'Course deleted');
    }
}
