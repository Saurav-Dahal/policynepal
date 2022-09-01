<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/login', 'UserController@login');
Route::get('/user/alluser', 'UserController@allUser')->middleware('auth.jwt');
Route::post('/user/register', 'UserController@store')->middleware('auth.jwt');
Route::get('/user/edit/{id}', 'UserController@edit')->middleware('auth.jwt');
Route::put('/user/update/{id}', 'UserController@update')->middleware('auth.jwt');
Route::delete('/user/delete/{id}', 'UserController@delete')->middleware('auth.jwt');

Route::get('/role/allrole', 'RoleController@index')->middleware('auth.jwt');
Route::post('/role/store', 'RoleController@store')->middleware('auth.jwt');
Route::get('/role/edit/{id}', 'RoleController@edit')->middleware('auth.jwt');
Route::put('/role/update/{id}', 'RoleController@update')->middleware('auth.jwt');
Route::delete('/role/delete/{id}', 'RoleController@delete')->middleware('auth.jwt');

Route::post('/project/inquiry/store', 'ProjectInquiryController@store');
Route::get('/project/inquiry/allinquiry', 'ProjectInquiryController@index');
Route::delete('/project/inquiry/delete/{id}', 'ProjectInquiryController@delete')->middleware('auth.jwt');

Route::post('/project/running/store', 'ProjectRunningController@store')->middleware('auth.jwt');
Route::get('/project/running/edit/{id}', 'ProjectRunningController@edit')->middleware('auth.jwt');
Route::get('/project/running/allrunning', 'ProjectRunningController@index');
Route::put('/project/running/update/{id}', 'ProjectRunningController@update')->middleware('auth.jwt');
Route::delete('/project/running/delete/{id}', 'ProjectRunningController@delete')->middleware('auth.jwt');

Route::post('/project/completed/store', 'ProjectCompletedController@store')->middleware('auth.jwt');
Route::get('/project/completed/edit/{id}', 'ProjectCompletedController@edit')->middleware('auth.jwt');
Route::put('/project/completed/update/{id}', 'ProjectCompletedController@update')->middleware('auth.jwt');
Route::get('/project/completed/allcompleted', 'ProjectCompletedController@index');
Route::delete('/project/completed/delete/{id}', 'ProjectCompletedController@delete')->middleware('auth.jwt');

Route::post('/team/store', 'TeamController@store')->middleware('auth.jwt');
Route::get('/team/allteam', 'TeamController@index');
Route::get('/team/edit/{id}', 'TeamController@edit')->middleware('auth.jwt');
Route::put('/team/update/{id}', 'TeamController@update')->middleware('auth.jwt');
Route::delete('/team/delete/{id}', 'TeamController@delete')->middleware('auth.jwt');

Route::post('/service/store', 'ServiceController@store')->middleware('auth.jwt');
Route::get('/service/edit/{id}', 'ServiceController@edit')->middleware('auth.jwt');
Route::get('/service/allservice', 'ServiceController@index');
Route::put('/service/update/{id}', 'ServiceController@update')->middleware('auth.jwt');
Route::delete('/service/delete/{id}', 'ServiceController@delete')->middleware('auth.jwt');

Route::post('/vacancy/store', 'VacancyController@store')->middleware('auth.jwt');
Route::get('/vacancy/edit/{id}', 'VacancyController@edit')->middleware('auth.jwt');
Route::put('/vacancy/update/{id}', 'VacancyController@update')->middleware('auth.jwt');
Route::get('/vacancy/allvacancy', 'VacancyController@index');
Route::delete('/vacancy/delete/{id}', 'VacancyController@delete')->middleware('auth.jwt');

Route::post('/formdata/store', 'FormDataController@store');
Route::get('/formdata/allformdata', 'FormDataController@index')->middleware('auth.jwt');
Route::delete('/formdata/delete/{id}', 'FormDataController@delete')->middleware('auth.jwt');

Route::post('/footer/store', 'FooterController@store')->middleware('auth.jwt');
Route::get('/footer/edit/{id}', 'FooterController@edit')->middleware('auth.jwt');
Route::put('/footer/update/{id}', 'FooterController@update')->middleware('auth.jwt');
Route::get('/footer/allfooter', 'FooterController@index');
Route::delete('/footer/delete/{id}', 'FooterController@delete')->middleware('auth.jwt');

Route::post('/quotation/store', 'QuotationController@store')->middleware('auth.jwt');
Route::get('/quotation/edit/{id}', 'QuotationController@edit')->middleware('auth.jwt');
Route::put('/quotation/update/{id}', 'QuotationController@update')->middleware('auth.jwt');
Route::get('/quotation/allquotation', 'QuotationController@index');

Route::post('/backgroundimage/store', 'BackgroundImageController@store')->middleware('auth.jwt');
Route::get('/backgroundimage/edit/{id}', 'BackgroundImageController@edit')->middleware('auth.jwt');
Route::put('/backgroundimage/update/{id}', 'BackgroundImageController@update')->middleware('auth.jwt');
Route::get('/backgroundimage/allbackgroundimage', 'BackgroundImageController@index');

Route::post('/frontservice/store', 'FrontServiceController@store')->middleware('auth.jwt');
Route::get('/frontservice/edit/{id}', 'FrontServiceController@edit')->middleware('auth.jwt');
Route::put('/frontservice/update/{id}', 'FrontServiceController@update')->middleware('auth.jwt');
Route::get('/frontservice/allfrontservice', 'FrontServiceController@index');

Route::post('/frontcontent1/store', 'FrontContent1Controller@store')->middleware('auth.jwt');
Route::get('/frontcontent1/edit/{id}', 'FrontContent1Controller@edit')->middleware('auth.jwt');
Route::put('/frontcontent1/update/{id}', 'FrontContent1Controller@update')->middleware('auth.jwt');
Route::get('/frontcontent1/allfrontcontent1', 'FrontContent1Controller@index');

Route::post('/frontcontent2/store', 'FrontContent2Controller@store')->middleware('auth.jwt');
Route::get('/frontcontent2/edit/{id}', 'FrontContent2Controller@edit')->middleware('auth.jwt');
Route::put('/frontcontent2/update/{id}', 'FrontContent2Controller@update')->middleware('auth.jwt');
Route::get('/frontcontent2/allfrontcontent2', 'FrontContent2Controller@index');

Route::post('/frontcontent3/store', 'FrontContent3Controller@store')->middleware('auth.jwt');
Route::get('/frontcontent3/edit/{id}', 'FrontContent3Controller@edit')->middleware('auth.jwt');
Route::put('/frontcontent3/update/{id}', 'FrontContent3Controller@update')->middleware('auth.jwt');
Route::get('/frontcontent3/allfrontcontent3', 'FrontContent3Controller@index');

Route::post('/frontcontentmain/store', 'FrontContentMainController@store')->middleware('auth.jwt');
Route::get('/frontcontentmain/edit/{id}', 'FrontContentMainController@edit')->middleware('auth.jwt');
Route::put('/frontcontentmain/update/{id}', 'FrontContentMainController@update')->middleware('auth.jwt');
Route::get('/frontcontentmain/allfrontcontentmain', 'FrontContentMainController@index');

Route::post('/assignproject/store', 'AssignProjectController@store')->middleware('auth.jwt');
Route::get('/assignproject/edit/{id}', 'AssignProjectController@edit')->middleware('auth.jwt');
Route::put('/assignproject/update/{id}', 'AssignProjectController@update')->middleware('auth.jwt');
Route::get('/assignproject/allassignproject', 'AssignProjectController@index');

Route::post('/dailyupdate/store', 'DailyUpdateController@store')->middleware('auth.jwt');


