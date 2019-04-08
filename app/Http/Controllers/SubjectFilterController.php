<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Aggregate;
use App\Personality;
use App\Course;
use App\Index;

class SubjectFilterController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('subjects_entry');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'index_no' => 'required'
        ]);
        
        //check whether index number exists
        $index_no = Index::where('index_no', $request->input('index_no'));
        if(Index::where('index_no', '=', $request->input('index_no'))->exists()){
            $index = Index::where('index_no', $request->input('index_no'))->first();
            $index_subjects = $index->subjects()->pluck('id');

            $user = User::find(auth()->user()->id);
            $user->subjects()->sync($index_subjects);
            
            $aggregate = new Aggregate;
            $aggregate->point = $index->point;
            $aggregate->index_no = $request->input('index_no');
            $user->aggregate()->save($aggregate);
            return redirect()->route('subjectfilter');
        }
        else{
            return redirect('/subjectentry')->with('error', 'Index Number not found');
        }

        //assign index number subject and aggregate to student
        // $user = User::find(auth()->user()->id);
        // $user->subjects()->sync($choices);

        // $aggregate = new Aggregate;
        // $aggregate->index_no = $request->input('index_no');
        // $aggregate->point = $request->input('aggregate_points');
        // $user->aggregate()->save($aggregate);

        // $subjects = $user->subjects();

        // return redirect()->route('subjectfilter');
    }

    public function results()
    {
        //$aggregate = aggregate::all()->where('user_id',auth()->user()->id)->pluck('point');
        $aggregate = Aggregate::where('user_id', auth()->user()->id)->firstOrFail();
        $user_aggregate =  $aggregate->point;
       
        if($user_aggregate >= 58){
            $level_of_study = "Bachelor of:";
        }
        else if($user_aggregate <58 ){
            $level_of_study= "Diploma/Certificate in:";
        }
         $personality = user::where('id',auth()->user()->id)->firstOrFail();
         $user_personality = $personality->personality_id;
         $fields = Personality::find($user_personality)->fields->pluck('id');
         $courses_id = Course::all()->whereIn('field_id', $fields)->pluck('id');
         $courses_names = Course::all()->whereIn('field_id', $fields)->pluck('name');
         $user_subjects = User::find(auth()->user()->id)->subjects->pluck('id');
        // $user_courses = Course::all()->whereIn('name', $courses_names)->where(function ($query){ foreach($courses_id as $course){  $query->whereIn(Course::find($course)->subjects, $user_subjects);}})->pluck('name');
        //echo $user_subjects;
        //echo $user_courses;
        $b = 0;
         $myarray = array();
         foreach($courses_id as $course)
         {
          $count = 0;
          $a = 0; 
           $x = Course::find($course)->subjects->pluck('id');
           
           foreach($x as $y)
           {
             $a = $a + 1;
             foreach($user_subjects as $z)
             {
               if($y == $z)
               {
                $count = $count + 1;
               }
             }
           }
           if($a == $count )
           {
            
             $myarray[$b] = Course::where('id', $course)->pluck('name');
            $b = $b + 1;
           }
           
         }
         $fields = Personality::find($user_personality)->fields;
        $count = 0;
        $tab_content = "";
        $tab_menu  = "";
       return view('courses_filtered', 
                    ['level_of_study'=>$level_of_study,
                    'courses_array'=>$myarray, 
                    'fields'=>$fields
                    ]);

    }
}