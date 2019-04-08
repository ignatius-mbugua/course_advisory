<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Feedback;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.home');
    }

    public function pie_chart_gender(){
        $users = User::all();
        $male_count = $users->where('gender', 'male')->count();
        $female_count = $users->where('gender', 'female')->count();
        return view('admin.charts.piechartgender', ['male_count'=>$male_count, 'female_count'=>$female_count]);
    }

    public function pie_chart_feedback(){
        $feedbacks = Feedback::all();
        $yes_count = $feedbacks->where('satisfied', 'Yes')->count();
        $no_count = $feedbacks->where('satisfied', 'No')->count();
        return view('admin.charts.piechartfeedback', ['yes_count'=>$yes_count, 'no_count'=>$no_count]);
    }

    public function bar_chart(){
        return view('admin.charts.barchart');
    }

    public function personality_chart_data(){
        $isfj = User::where('personality_id', 1);
        $isfj_male_counter = $isfj->where('gender', 'male')->count();
        $isfj = User::where('personality_id', 1);
        $isfj_female_counter = $isfj->where('gender', 'female')->count();

        $esfj = User::where('personality_id', 2);
        $esfj_male_counter = $esfj->where('gender', 'male')->count();
        $esfj = User::where('personality_id', 2);
        $esfj_female_counter = $esfj->where('gender', 'female')->count();

        $infj = User::where('personality_id', 3);
        $infj_male_counter = $infj->where('gender', 'male')->count();
        $infj = User::where('personality_id', 3);
        $infj_female_counter = $infj->where('gender', 'female')->count();

        $intj = User::where('personality_id', 4);
        $intj_male_counter = $intj->where('gender', 'male')->count();
        $intj = User::where('personality_id', 4);
        $intj_female_counter = $intj->where('gender', 'female')->count();

        $enfj = User::where('personality_id', 5);
        $enfj_male_counter = $enfj->where('gender', 'male')->count();
        $enfj = User::where('personality_id', 5);
        $enfj_female_counter = $enfj->where('gender', 'female')->count();

        $istp = User::where('personality_id', 6);
        $istp_male_counter = $istp->where('gender', 'male')->count();
        $istp = User::where('personality_id', 6);
        $istp_female_counter = $istp->where('gender', 'female')->count();

        $isfp = User::where('personality_id', 7);
        $isfp_male_counter = $isfp->where('gender', 'male')->count();
        $isfp = User::where('personality_id', 7);
        $isfp_female_counter = $isfp->where('gender', 'female')->count();

        $infp = User::where('personality_id', 8);
        $infp_male_counter = $infp->where('gender', 'male')->count();
        $infp = User::where('personality_id', 8);
        $infp_female_counter = $infp->where('gender', 'female')->count();

        $intp = User::where('personality_id', 9);
        $intp_male_counter = $intp->where('gender', 'male')->count();
        $intp = User::where('personality_id', 9);
        $intp_female_counter = $intp->where('gender', 'female')->count();

        $entj = User::where('personality_id', 10);
        $entj_male_counter = $entj->where('gender', 'male')->count();
        $entj = User::where('personality_id', 10);
        $entj_female_counter = $entj->where('gender', 'female')->count();

        $estp = User::where('personality_id', 11);
        $estp_male_counter = $estp->where('gender', 'male')->count();
        $estp = User::where('personality_id', 11);
        $estp_female_counter = $estp->where('gender', 'female')->count();

        $esfp = User::where('personality_id', 12);
        $esfp_male_counter = $esfp->where('gender', 'male')->count();
        $esfp = User::where('personality_id', 12);
        $esfp_female_counter = $esfp->where('gender', 'female')->count();

        $enfp = User::where('personality_id', 13);
        $enfp_male_counter = $enfp->where('gender', 'male')->count();
        $enfp = User::where('personality_id', 13);
        $enfp_female_counter = $enfp->where('gender', 'female')->count();

        $entp = User::where('personality_id', 14);
        $entp_male_counter = $entp->where('gender', 'male')->count();
        $entp = User::where('personality_id', 14);
        $entp_female_counter = $entp->where('gender', 'female')->count();

        $estj = User::where('personality_id', 15);
        $estj_male_counter = $estj->where('gender', 'male')->count();
        $estj = User::where('personality_id', 15);
        $estj_female_counter = $estj->where('gender', 'female')->count();

        $istj = User::where('personality_id', 16);
        $istj_male_counter = $istj->where('gender', 'male')->count();
        $istj = User::where('personality_id', 16);
        $istj_female_counter = $istj->where('gender', 'female')->count();


        $personality_data = collect([
            [
                'personality' => 'ISFJ',
                'male' => $isfj_male_counter,
                'female' => $isfj_female_counter
            ],
            [
                'personality' => 'ESFJ',
                'male' => $esfj_male_counter,
                'female' => $esfj_female_counter
            ],
            [
                'personality' => 'INFJ',
                'male' => $infj_male_counter,
                'female' => $infj_female_counter
            ],
            [
                'personality' => 'INTJ',
                'male' => $intj_male_counter,
                'female' => $intj_female_counter
            ],
            [
                'personality' => 'ENFJ',
                'male' => $enfj_male_counter,
                'female' => $enfj_female_counter
            ],
            [
                'personality' => 'ISTP',
                'male' => $istp_male_counter,
                'female' => $istp_female_counter
            ],
            [
                'personality' => 'ISFP',
                'male' => $isfp_male_counter,
                'female' => $isfp_female_counter
            ],
            [
                'personality' => 'INFP',
                'male' => $infp_male_counter,
                'female' => $infp_female_counter
            ],
            [
                'personality' => 'INTP',
                'male' => $intp_male_counter,
                'female' => $intp_female_counter
            ],
            [
                'personality' => 'ENTJ',
                'male' => $entj_male_counter,
                'female' => $entj_female_counter
            ],
            [
                'personality' => 'ESTP',
                'male' => $estp_male_counter,
                'female' => $estp_female_counter
            ],
            [
                'personality' => 'ESFP',
                'male' => $esfp_male_counter,
                'female' => $esfp_female_counter
            ],
            [
                'personality' => 'ENFP',
                'male' => $enfp_male_counter,
                'female' => $enfp_female_counter
            ],
            [
                'personality' => 'ENTP',
                'male' => $entp_male_counter,
                'female' => $entp_female_counter
            ],
            [
                'personality' => 'ESTJ',
                'male' => $estj_male_counter,
                'female' => $estj_female_counter
            ],
            [
                'personality' => 'ISTJ',
                'male' => $istj_male_counter,
                'female' => $istj_female_counter
            ]    
        ]);
        return response()->json($personality_data);
    }

    public function gender_chart_data(){
        $users = User::all();
        $male_count = $users->where('gender', 'male')->count();
        $female_count = $users->where('gender', 'female')->count();
        $gender_data = collect([
            [
                'gender' => 'male',
                'total' => $male_count
            ],
            [
                'gender' => 'female',
                'total' => $female_count
            ]
        ]);
        return response()->json($gender_data);
    }

    public function feedback_chart_data(){
        $feedbacks = Feedback::all();
        $yes_count = $feedbacks->where('satisfied', 'Yes')->count();
        $no_count = $feedbacks->where('satisfied', 'No')->count();
        $feedback_data = collect([
            [
                'satisfied' => 'Yes',
                'total' => $yes_count
            ],
            [
                'satisfied' => 'No',
                'total' => $no_count
            ]
        ]);
        return response()->json($feedback_data);
    }
}
