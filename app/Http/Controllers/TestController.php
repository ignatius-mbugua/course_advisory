<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Personality;
use App\Field;

class TestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show form containing temperament test
        return view('temperament_test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function temperament_identifier(Request $request)
    {
        
        $this->validate($request, [
            'quest1'=> 'required',
            'quest2'=> 'required',
            'quest3'=> 'required',
            'quest4'=> 'required',
            'quest5'=> 'required',
            'quest6'=> 'required',
            'quest7'=> 'required',
            'quest8'=> 'required',
            'quest9'=> 'required',
            'quest10'=> 'required',
            'quest11'=> 'required',
            'quest12'=> 'required',
            'quest13'=> 'required',
            'quest14'=> 'required',
            'quest15'=> 'required',
            'quest16'=> 'required',
            'quest17'=> 'required',
            'quest18'=> 'required',
            'quest19'=> 'required',
            'quest20'=> 'required'
        ]);
        //declare an array to store the answers entered by the student
        $answers = array();
        //initialize variables
        $personality_type = "";
        $extrovert_counter = 0;
        $introvert_counter = 0;
        $sensing_counter = 0;
        $intuition_counter = 0;
        $thinking_counter = 0;
        $feeling_counter = 0;
        $judging_counter = 0;
        $perceiving_counter = 0;
        
        //storing the student answers in the array
        for ($x = 1; $x <= 20; $x++){
            $answers[$x] = $request->input('quest'. $x);
        }
        
        //determining student's personality type
        foreach($answers as $index => $answer){
            
            if(($index == 1 || $index == 5 || $index == 9 || $index == 13 || $index== 17) && $answer == 'a' ) {
                $extrovert_counter+=1;
            }
            else if(($index == 1 || $index == 5 || $index == 9 || $index == 13 || $index== 17) && $answer == 'b'){
                $introvert_counter+=1;
            }
            else if(($index == 2 || $index == 6 || $index == 10 || $index == 14 || $index== 18) && $answer == 'a'){
                $sensing_counter+=1;
            }
            else if(($index == 2 || $index == 6 || $index == 10 || $index == 14 || $index== 18) && $answer == 'b'){
                $intuition_counter+=1;
            }
            else if(($index == 3 || $index == 7 || $index == 11 || $index == 15 || $index== 19) && $answer == 'a'){
                $thinking_counter+=1;
            }
            else if(($index == 3 || $index == 7 || $index == 11 || $index == 15 || $index== 19) && $answer == 'b'){
                $feeling_counter+=1;
            }
            else if(($index == 4 || $index == 8 || $index == 12 || $index == 16 || $index== 20) && $answer == 'a'){
                $judging_counter+=1;
            }
            else if(($index == 4 || $index == 8 || $index == 12 || $index == 16 || $index== 20) && $answer == 'b'){
                $perceiving_counter+=1;
            }
        }

        if($extrovert_counter > $introvert_counter){
            $personality_type= "E";
        }
        else{
            $personality_type = "I";
        }
        if($sensing_counter > $intuition_counter){
            $personality_type = $personality_type."S";
        }
        else{
            $personality_type = $personality_type."N";
        }
        if($thinking_counter > $feeling_counter){
            $personality_type = $personality_type."T";
        }
        else{
            $personality_type = $personality_type."F";
        }
        if($judging_counter > $perceiving_counter){
            $personality_type = $personality_type."J";
        }
        else{
            $personality_type = $personality_type."P";
        }
        
        //get personality with name of $personality_type
        $personality = Personality::where('name', $personality_type)->firstOrFail();

        //update personality_id in users table
        $user = User::findOrFail(auth()->user()->id);
        $user->personality_id = $personality->id;
        $user->save(); 

        return redirect('/home');

        //show appropriate view to user
        // if($personality_type == "ENFJ"){
        //     return view('temperaments.ENFJ', ['personality'=>$personality]);
        // }
        // else if($personality_type == "ENFP"){
        //     return view('temperaments.ENFP', ['personality'=>$personality]);
        // }
        // else if($personality_type == "ENTJ"){
        //     return view('temperaments.ENTJ', ['personality'=>$personality]);
        // }
        // else if($personality_type == "ENTP"){
        //     return view('temperaments.ENTP', ['personality'=>$personality]);
        // }
        // else if($personality_type == "ESFJ"){
        //     return view('temperaments.ESFJ', ['personality'=>$personality]);
        // }
        // else if($personality_type == "ESFP"){
        //     return view('temperaments.ESFP', ['personality'=>$personality]);
        // }
        // else if($personality_type == "ESTJ"){
        //     return view('temperaments.ESTJ', ['personality'=>$personality]);
        // }
        // else if($personality_type == "ESTP"){
        //     return view('temperaments.ESTP', ['personality'=>$personality]);
        // }
        // else if($personality_type == "INFJ"){
        //     return view('temperaments.INFJ', ['personality'=>$personality]);
        // }
        // else if($personality_type == "INFP"){
        //     return view('temperaments.INFP', ['personality'=>$personality]);
        // }
        // if($personality_type == "INTJ"){
        //     return view('temperaments.INTJ', ['personality'=>$personality]);
        // }
        // else if($personality_type == "INTP"){
        //     return view('temperaments.INTP', ['personality'=>$personality]);
        // }
        // else if($personality_type == "ISFJ"){
        //     return view('temperaments.ISFJ', ['personality'=>$personality]);
        // }
        // else if($personality_type == "ISFP"){
        //     return view('temperaments.ISFP', ['personality'=>$personality]);
        // }
        // else if($personality_type == "ISTJ"){
        //     return view('temperaments.ISTJ', ['personality'=>$personality]);
        // }
        // else if($personality_type == "ISTP"){
        //     return view('temperaments.ISTP', ['personality'=>$personality]);
        // }    
    }
}
