<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'normaluser'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/account', 'HomeController@account');
    Route::match(['put', 'patch'], '/account/{id}', 'HomeController@update');

    //performing test and showing result
    Route::get('/test', 'TestController@index');
    Route::post('/result', 'TestController@temperament_identifier')->name('result');
    Route::get('/subjectentry', 'SubjectFilterController@index');

    Route::post('/subjectentry/submit', 'SubjectFilterController@store')->name('subject_filter_submit');

    Route::get('/subjectfilter', 'SubjectFilterController@results')->name('subjectfilter');
    Route::resource('coursefilter', 'CourseFilterController');

    //temperament views
    Route::get('/ENFJ', function () {
        return view('temperaments.ENFJ');
    });
    Route::get('/ENFP', function () {
        return view('temperaments.ENFP');
    });
    Route::get('/ENTJ', function () {
        return view('temperaments.ENTJ');
    });
    Route::get('/ENTP', function () {
        return view('temperaments.ENTP');
    });
    Route::get('/ESFJ', function () {
        return view('temperaments.ESFJ');
    });
    Route::get('/ESFP', function () {
        return view('temperaments.ESFP');
    });
    Route::get('/ESTJ', function () {
        return view('temperaments.ESTJ');
    });
    Route::get('/ESTP', function () {
        return view('temperaments.ESTP');
    });
    Route::get('/INFJ', function () {
        return view('temperaments.INFJ');
    });
    Route::get('/INFP', function () {
        return view('temperaments.INFP');
    });
    Route::get('/INTJ', function () {
        return view('temperaments.INTJ');
    });
    Route::get('/INTP', function () {
        return view('temperaments.INTP');
    });
    Route::get('/ISFJ', function () {
        return view('temperaments.ISFJ');
    });
    Route::get('/ISFP', function () {
        return view('temperaments.ISFP');
    });
    Route::get('/ISTJ', function () {
        return view('temperaments.ISTJ');
    });
    Route::get('/ISTP', function () {
        return view('temperaments.ISTP');
    });
});

//fields of study controller middleware is in the controller
Route::resource('fields', 'FieldsController');

Route::resource('feedbacks', 'FeedbackController');


//Route::resource('roles', 'RolesController');

Route::middleware(['auth', 'adminuser'])->group(function(){
    //controller resources
    
    Route::resource('courses', 'CoursesController');
    Route::resource('institutions', 'InstitutionsController');
    Route::resource('colleges', 'CollegesController');
    Route::resource('subjects', 'SubjectsController');
    Route::resource('users', 'UsersController');
    Route::resource('indices', 'IndexController');

    Route::get('/admin/home', 'Admin\HomeController@index');
    Route::get('/admin/report/bar-chart', 'Admin\HomeController@bar_chart');
    Route::get('/admin/report/pie-chart-gender', 'Admin\HomeController@pie_chart_gender');
    Route::get('/admin/report/pie-chart-feedback', 'Admin\HomeController@pie_chart_feedback');
    Route::get('/admin/report/genderdata', 'Admin\HomeController@gender_chart_data');
    Route::get('/admin/report/personalitydata', 'Admin\HomeController@personality_chart_data');
    Route::get('/admin/report/feedbackdata', 'Admin\HomeController@feedback_chart_data');
});
