<?php

use Illuminate\Support\Facades\Route;

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
// Rahim store controllers
Route::get('/', 'Backend\Setup\RahimStoreController@front_view')->name('setup.rahim_store.front_view');

Route::get('/rahin_store/view', 'Backend\Setup\RahimStoreController@view')->name('setup.rahim_store.view');
Route::get('/rahin_store/add', 'Backend\Setup\RahimStoreController@add')->name('setup.rahim_store.add');
Route::post('/rahin_store/store', 'Backend\Setup\RahimStoreController@store')->name('setup.rahim_store.store');
Route::get('/rahin_store/edit/{id}', 'Backend\Setup\RahimStoreController@edit')->name('setup.rahim_store.edit');
Route::post('/rahin_store/update/{id}', 'Backend\Setup\RahimStoreController@update')->name('setup.rahim_store.update');
Route::post('/rahin_store/delete/{id}', 'Backend\Setup\RahimStoreController@delete')->name('setup.rahim_store.delete');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

// Admin Routes

Route::group(['prefix' => 'admin'] , function(){
	Route::get('/' , 'Backend\DashboardController@index')->name('admin.dashboard');
	Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
	Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
	Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);
	
	// Setup Routes  
	Route::resource('student/classes', 'Backend\Setup\StudentClassesController', ['names' => 'admin.student.classes']);
	Route::resource('student/session', 'Backend\Setup\StudentSessionController', ['names' => 'admin.student.session']);
	Route::resource('student/section', 'Backend\Setup\StudentSectionController', ['names' => 'admin.student.section']);
	Route::resource('student/group', 'Backend\Setup\StudentGroupController', ['names' => 'admin.student.group']);
	Route::resource('student/shift', 'Backend\Setup\StudentShiftController', ['names' => 'admin.student.shift']);
	Route::resource('student/fee_category', 'Backend\Setup\FeeCategoryController', ['names' => 'admin.student.fee_category']);
	Route::resource('student/fee_amount', 'Backend\Setup\FeeAmountController', ['names' => 'admin.student.fee_amount']);
	Route::get('student/fee_amount_details/{fee_category_id}' , 'Backend\Setup\FeeAmountController@fee_amount_details')->name('admin.student.fee_amount_details');
	Route::resource('exam-type', 'Backend\Setup\ExamTypeController', ['names' => 'admin.exam_type']);
	Route::resource('subject', 'Backend\Setup\SubjectController', ['names' => 'admin.subject']);

Route::resource('assign_subject', 'Backend\Setup\AssaignSubjectController', ['names' => 'admin.assign_subject']);
Route::get('assign/subject/{class_id}' , 'Backend\Setup\AssaignSubjectController@assign_subject_details')->name('admin.assign_subject_details');
Route::resource('designation', 'Backend\Setup\DesignationController', ['names' => 'admin.designation']);
Route::resource('student_registration', 'Backend\Student\StudentRegController', ['names' => 'admin.student_reg']);
Route::get('student/student_registration/{student_id}' , 'Backend\Student\StudentRegController@editStudent')->name('admin.std_reg');
Route::get('student_migration/{student_id}' , 'Backend\Student\StudentRegController@migration')->name('admin.student.migration');
Route::post('student_migration/{student_id}' , 'Backend\Student\StudentRegController@migrationStore')->name('admin.student.migration.store');
Route::get('student_details/{student_id}' , 'Backend\Student\StudentRegController@studentDetails')->name('admin.student.details');
Route::get('/year-class-wise' , 'Backend\Student\StudentRegController@yearClassWise')->name('admin.year_class_wise');

Route::resource('student/roll/generate', 'Backend\Student\StudentRollController', ['names' => 'admin.roll.generate']);
Route::get('roll/get-student' , 'Backend\Student\StudentRollController@getStudent')->name('student.roll.get-student');

Route::get('reg/fee/view' , 'Backend\Student\RegistrationFeeController@index')->name('student.reg.fee.view');
Route::get('reg/get-student' , 'Backend\Student\RegistrationFeeController@getStudent')->name('student.reg_fee.get_student');
Route::get('reg/fee/payslip' , 'Backend\Student\RegistrationFeeController@paySlip')->name('student.reg.fee.payslip');

Route::get('monthly/fee/view' , 'Backend\Student\MonthlyFeeController@index')->name('student.monthly.fee.view');
Route::get('monthly/get-student' , 'Backend\Student\MonthlyFeeController@getStudent')->name('student.monthly_fee.get_student');
Route::get('monthly/fee/payslip' , 'Backend\Student\MonthlyFeeController@paySlip')->name('student.monthly.fee.payslip');

Route::get('exam/fee/view' , 'Backend\Student\ExamFeeController@index')->name('student.exam.fee.view');
Route::get('exam/get-student' , 'Backend\Student\ExamFeeController@getStudent')->name('student.exam_fee.get_student');
Route::get('exam/fee/payslip' , 'Backend\Student\ExamFeeController@paySlip')->name('student.exam.fee.payslip');
Route::resource('employee_registration', 'Backend\Employee\EmployeeRegController', ['names' => 'admin.employee_reg']);
Route::get('employee/details/{id}' , 'Backend\Employee\EmployeeRegController@details')->name('admin.employee_reg.details');
Route::resource('employee_salary', 'Backend\Employee\EmployeeSalaryController', ['names' => 'admin.employee_salary']);
Route::post('employee_salary/increment/{id}' , 'Backend\Employee\EmployeeSalaryController@storeSalary')->name('admin.employee_salary.storesalary');
Route::get('employee_salary/details/{id}' , 'Backend\Employee\EmployeeSalaryController@details')->name('admin.employee_salary.details');
Route::resource('employee_leave', 'Backend\Employee\EmployeeLeaveController', ['names' => 'admin.employee_leave']);
	// Setup Routes

    // Login routes
	Route::get('/login' , 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login/submit' , 'Backend\Auth\LoginController@login')->name('admin.login.submit');
	

	//Logout Routes
	Route::post('/logout/submit' , 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');


	// Forget pssword Routes
	Route::get('/password/reset' , 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset/submit' , 'Backend\Auth\ForgotPasswordController@reset')->name('admin.password.update');
});
