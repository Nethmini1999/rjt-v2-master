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

Auth::routes();
Route::get('/', 'StudentController@index')->name('home');
Route::get('/home', 'StudentController@index');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/student/update-profile','StudentController@update_profile')->name('update.profile');
Route::post('/student/update-profile','StudentController@save_profile_updates');
Route::get('/student/profile-picture/{id}','StudentController@profile_images');

Route::get('/student/update-password','StudentController@update_password')->name('update.password');
Route::post('/student/update-password','StudentController@save_updated_password');


Route::get('/student/annual-registration','StudentRegistrationController@annual_registration');
Route::get('/student/semester-registration','StudentRegistrationController@semester_registration');
Route::post('/student/semester-registration','StudentRegistrationController@save_semester_registration');

Route::get('/student/specialization-selection','StudentRegistrationController@specialization_selection');
Route::post('/student/request-specialization','StudentRegistrationController@save_specialization_selection');


Route::get('/student/exam-registration','StudentExamController@exam_registration');
Route::get('/student/exam-registration-view','StudentExamController@exam_registration_view');
Route::post('/student/exam-registration-view','StudentExamController@save_register_exam');
Route::get('/student/view-approved-exam-subjects','StudentExamController@view_approved_exam_subjects');

Route::get('/student/view-results','StudentExamController@view_results');






// Route::get('/request-specialization','StudentRegistrationController@request_specialization');
// Route::post('/request-specialization','StudentRegistrationController@store_specialization_request');


// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');


Route::get('/admin/student', 'AdminStudentController@index');
Route::get('/admin/student/list', 'AdminStudentController@listing')->name('admin.student.list');
Route::get('/admin/student/view/{id}', 'AdminStudentController@view')->name('admin.student.view');
Route::get('/admin/student/profile-pic', 'AdminStudentController@view_profile_images');
Route::post('/admin/student/update-personal-details', 'AdminStudentController@update_personal_details')->name('admin.student.update-personal-details');
Route::post('/admin/student/update-al-details','AdminStudentController@update_al_details');

Route::post('/admin/student/update-scholarship-details', 'AdminStudentController@update_student_scholarship');
Route::post('/admin/student/add-batch-mis', 'AdminStudentController@add_batch_mis');
Route::post('/admin/student/add-student-achievemnt', 'AdminStudentController@add_student_achievemnt');



Route::get('/admin/student/upload', 'AdminStudentController@import');
Route::post('/admin/student/upload', 'AdminStudentController@upload')->name('admin.student.upload');
Route::post('/admin/student/get-uploaded-list', 'AdminStudentController@uploaded_list');
Route::post('/admin/student/process-uploaded', 'AdminStudentController@process_import');

Route::get('/admin/student/transfer', 'AdminStudentController@transfer');
Route::post('/admin/student/transfer', 'AdminStudentController@upload_transfer')->name('admin.student.transfer');
Route::get('/admin/student/get-transferred-list', 'AdminStudentController@transfer_list');
Route::post('/admin/student/process-transfer', 'AdminStudentController@process_transfer');


Route::get('/admin/student/graduate', 'AdminStudentController@graduate');
Route::post('/admin/student/graduate', 'AdminStudentController@upload_graduate')->name('admin.student.graduate');
Route::get('/admin/student/get-graduated-list', 'AdminStudentController@graduate_list');
Route::post('/admin/student/process-graduate', 'AdminStudentController@process_graduate');


Route::get('/admin/student/upload-profile-pic', 'AdminStudentController@view_upload_profile_pictures');
Route::post('/admin/student/upload-profile-pic', 'AdminStudentController@upload_profile_pictures');

Route::get('/admin/student/upload-documents', 'AdminStudentController@view_upload_documents');
Route::post('/admin/student/upload-documents', 'AdminStudentController@upload_documents');
Route::get('/admin/student/get-document/{id}', 'AdminStudentController@download_document');

Route::get('/admin/student/upload-scholarship', 'AdminStudentController@view_upload_scholarships');
Route::post('/admin/student/upload-scholarship', 'AdminStudentController@upload_scholarships');

Route::get('/admin/settings', 'SettingsController@index');
Route::get('/admin/settings/system-settings', 'SettingsController@list_settings');
Route::post('/admin/settings/update-system-settings', 'SettingsController@update_setting');

Route::get('/admin/settings/fees', 'SettingsController@list_fees');
Route::post('/admin/settings/update-fees', 'SettingsController@update_fees');
// Route::post('/admin/settings/add-fees', 'SettingsController@add_fees');
// Route::post('/admin/settings/delete-fees', 'SettingsController@delete_fees');

Route::get('/admin/settings/regulations', 'SettingsController@list_regulations');
Route::post('/admin/settings/update-regulations', 'SettingsController@update_regulations');
Route::post('/admin/settings/add-regulations', 'SettingsController@add_regulations');

Route::get('/admin/settings/batch', 'SettingsController@list_batch');
Route::post('/admin/settings/update-batch', 'SettingsController@update_batch');
Route::post('/admin/settings/add-batch', 'SettingsController@add_batch');

Route::get('/admin/settings/regulation', 'SettingsController@list_regulations');
Route::post('/admin/settings/update-regulation', 'SettingsController@update_regulation');
Route::post('/admin/settings/add-regulation', 'SettingsController@add_regulation');

Route::get('/admin/settings/courses', 'SettingsController@list_courses');
Route::get('/admin/settings/courses-specialization', 'SettingsController@get_course_specialization');
Route::post('/admin/settings/add-course', 'SettingsController@add_course');
Route::post('/admin/settings/update-course', 'SettingsController@update_course');
Route::post('/admin/settings/update-course-specialization', 'SettingsController@update_course_specialization');
Route::get('/admin/settings/courses-lectuerer', 'SettingsController@get_course_lecturer_list');
Route::post('/admin/settings/assign-courses-lectuerer', 'SettingsController@update_course_lecturer');


Route::post('/admin/settings/delete-course', 'SettingsController@delete_course');

Route::get('/admin/settings/schedules', 'SettingsController@list_schedules');
Route::post('/admin/settings/update-schedule', 'SettingsController@update_schedule');
// Route::post('/admin/settings/add-schedule', 'SettingsController@add_schedule');
// Route::post('/admin/settings/delete-schedule', 'SettingsController@delete_schedule');

Route::get('/admin/settings/roles', 'SettingsController@list_roles');
Route::get('/admin/settings/add-roles', 'SettingsController@create_role_view');
Route::post('/admin/settings/add-roles', 'SettingsController@create_role');
Route::get('/admin/settings/update-roles/{id}', 'SettingsController@update_role_view');
Route::post('/admin/settings/update-roles', 'SettingsController@update_role');

Route::get('/admin/settings/users', 'SettingsController@list_users');
Route::get('/admin/settings/add-user', 'SettingsController@create_user_view');
Route::post('/admin/settings/add-user', 'SettingsController@create_user');
Route::get('/admin/settings/update-user/{id}', 'SettingsController@update_user_view');
Route::post('/admin/settings/update-user', 'SettingsController@update_user');

Route::get('/admin/settings/system-logs', 'SettingsController@list_system_logs');
Route::get('/admin/settings/get-file', 'SettingsController@get_uploaded_files');


Route::get('/admin/account', 'AdminController@view_account');
Route::post('/admin/account', 'AdminController@update_account');


Route::get('/admin/registration/view-year-registration', 'AdminRegistrationController@view_year_registration');

Route::get('/admin/registration/upload-year-registration', 'AdminRegistrationController@view_upload_year_registration');
Route::post('/admin/registration/upload-year-registration', 'AdminRegistrationController@upload_year_registration');
Route::get('/admin/registration/process-specialization', 'AdminRegistrationController@view_process_specialization');
Route::get('/admin/registration/download-specialization', 'AdminRegistrationController@download_specialization');
Route::post('/admin/registration/upload-specialization', 'AdminRegistrationController@upload_specialization_selection');
Route::get('/admin/registration/export-to-lms', 'AdminRegistrationController@view_lms_export');
Route::get('/admin/registration/download-vle-export', 'AdminRegistrationController@download_vle_export_file');


Route::get('/admin/exam','AdminExamController@index')->name('admin.exam');
Route::get('/admin/exam/list','AdminExamController@listing');
Route::get('/admin/exam/application/{id}','AdminExamController@view_application');
Route::get('/admin/exam/get-subjects','AdminExamController@get_subjects');
Route::get('/admin/exam/approve-by-subject','AdminExamController@approve_by_subject');
Route::post('/admin/exam/approve-app-subject','AdminExamController@approve_application_subject');
Route::get('/admin/exam/download-applications','AdminExamController@download_applications');
Route::get('/admin/exam/print-applications','AdminExamController@print_applications');
Route::get('/admin/exam/export-to-excel','AdminExamController@excel_export_applications');

Route::get('/admin/results/view-uploaded-results','AdminResultController@view_uploaded_resutls');
Route::get('/admin/results/upload-results','AdminResultController@view_results_upload');
Route::post('/admin/results/upload-results','AdminResultController@upload_results');
Route::get('/admin/results/get-uploaded-results','AdminResultController@get_uploaded_results');
Route::post('/admin/results/process-upload-results','AdminResultController@process_uploaded_results');
Route::get('/admin/results/upload-results-bulk','AdminResultController@view_bulk_results_upload');
Route::post('/admin/results/upload-results-bulk','AdminResultController@upload_bulk_results');
Route::post('/admin/results/process-upload-bulk-results','AdminResultController@process_bulk_uploaded_results');
Route::get('/admin/results/process-gpa','AdminResultController@gpa_process_view');
Route::get('/admin/results/download-raw-gpa','AdminResultController@download_raw_gpa_file');
Route::get('/admin/results/upload-gpa','AdminResultController@view_upload_gpa');
Route::post('/admin/results/upload-gpa','AdminResultController@upload_gpa');


Route::get('/admin/transcripts/semester-transcripts','AdminTranscriptController@print_semester_transcripts');
Route::get('/admin/transcripts/semester-transcripts-download','AdminTranscriptController@print_semester_transcripts_download');
Route::get('/admin/transcripts/final-transcripts','AdminTranscriptController@print_final_transcripts_view');
Route::get('/admin/transcripts/final-transcripts-download','AdminTranscriptController@print_final_transcripts_download');
Route::get('/admin/transcripts/final-detail-certificate','AdminTranscriptController@print_final_detail_certificate_view');
Route::get('/admin/transcripts/final-detail-certificate-download','AdminTranscriptController@print_final_detail_certificate_download');

