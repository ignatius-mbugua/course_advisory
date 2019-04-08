<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Personality;
use App\Field;
use App\Aggregate;
use App\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personality = Personality::where('id', auth()->user()->personality_id)->first();
        if(User::find(auth()->user()->id)->aggregate == null){
            return view('home', ['personality'=>$personality]);
        }
        else
        {
        $aggregate = Aggregate::where('user_id', auth()->user()->id)->firstOrFail();
        $user_aggregate =  $aggregate->point;
       
        if($user_aggregate >= 58){
            $level_of_study = "Bachelor of:";
        }
        else if($user_aggregate <58 ){
            $level_of_study= "Diploma/Certificate in:";
        }
        
        $user_personality = $personality->id;
        $fields = Personality::find($user_personality)->fields->pluck('id');
         $courses_id = Course::all()->whereIn('field_id', $fields)->pluck('id');
         $courses_names = Course::all()->whereIn('field_id', $fields)->pluck('name');
         $user_subjects = User::find(auth()->user()->id)->subjects->pluck('id');

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
        return view('home', ['personality'=>$personality,
                                'level_of_study'=>$level_of_study,
                                'courses_array'=>$myarray, 
                                 'fields'=>$fields
                                ]);
        }
    }

    public function account()
    {
        return view('account');
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::findOrFail($id);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->gender = $request->input('gender');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect('/home')->with('success', 'Account Information has been updated');
    }
}
