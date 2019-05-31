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

Route::prefix('Organization')->name('Organization.')->middleware('auth')->group( function(){

		Route::get('/Home',     'Organization\HomeController@index')->name('Home');
        
		Route::get('/Show_Create_Exam_Form','Organization\ExamController@Show_Create_Exam_Form')->name('Show_Create_Exam_Form');

		Route::post('/Create_Exam','Organization\ExamController@Create_Exam')->name('Create_Exam');

		Route::get('/Exam_Home','Organization\ExamController@Exam_Home')->name('Exam_Home');

		Route::get('/Show_Create_Question_Form',
			'Organization\QuestionController@index')->name('Show_Create_Question_Form');

		Route::post('/Add_Question','Organization\QuestionController@Add_Question')->name('Add_Question');

		Route::get('/Show_Edit_Form/{exam_code}/{question_number}','Organization\QuestionController@Show_Edit_Form')->name('Show_Edit_Form');

		Route::post('/Edit_Question/{exam_code}/{question_number}','Organization\QuestionController@Edit_Question')->name('Edit_Question');

		Route::get('/Delete_Question/{exam_code}/{question_number}','Organization\QuestionController@Delete_Question')->name('Delete_Question');

		Route::get('/Registration','Organization\RegistrationController@Registration')->name('Registration');

		Route::get('/Show_Registration_Form','Organization\RegistrationController@Show_Registration_Form')->name('Show_Registration_Form');

		Route::post('/Register','Organization\RegistrationController@Register')->name('Register');
		Route::get('/Resend_Email/{username}','Organization\RegistrationController@Resend_Email')->name('Resend_Email');

		Route::get('/Show_Start_Exam_Form','Organization\ExamController@Show_Start_Exam_Form')->name('Show_Start_Exam_Form')->middleware('start_exam');

		Route::post('/Start_Exam','Organization\ExamController@Start_Exam')->name('Start_Exam')->middleware('start_exam');
		
		Route::get('/Make_Attended/{username}',
			'Organization\AttendanceController@make_attended')->name('Make_Attended');

		Route::get('/Remove_Attendance{username}','Organization\AttendanceController@Remove_Attendance')->name('Remove_Attendance');
		Route::get('/Score_Board','Organization\ScoreBoardController@index')->name('Score_Board');

		
});

Route::get('/Exam_Taker_login',      'ExamTaker\LoginController@index')->name('Exam_Taker_login');

Route::post('/Exam_Taker_login',      'ExamTaker\LoginController@authentication')->name('Exam_Taker_Authentication');
//Exam Taker Routes after authentication
Route::middleware('ExamTakerAuth')->prefix('Exam_Taker')->name('Exam_Taker.')->group(function(){

    Route::get('/Exam_Home','ExamTaker\ExamHomeController@index')->name('Exam_Home');

    Route::get('/Logout','ExamTaker\ExamHomeController@Logout')->name('Logout');
    
	Route::post('/Submit_Answer','ExamTaker\ExamAnswerController@Submit_answer')->name('Submit_Answer');
	Route::get('/Profile','ExamTaker\ProfileController@show_profile')->name('Profile');

});
