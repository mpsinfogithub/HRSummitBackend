<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AuthController;
use App\Http\Controllers\Backend\Admin\SpeakerController;
use App\Http\Controllers\Backend\Admin\LeaderController;
use App\Http\Controllers\Backend\Admin\AgendaController;
use App\Http\Controllers\Backend\Admin\GalleryController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\AccomodationController;
use App\Http\Controllers\Backend\Admin\ActivityController;
use App\Http\Controllers\Backend\Admin\DeligateController;
use App\Http\Controllers\Backend\Admin\EInviteController;
use App\Http\Controllers\Backend\Admin\HappyController;
use App\Http\Controllers\Backend\Admin\VideoController;
use App\Http\Controllers\Backend\Admin\FeedbackController;

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

Route::get('/admin',[AuthController::class,'index']);
Route::post('/admin/auth',[AuthController::class,'auth'])->name('admin.auth');

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['admin_auth']],function(){

	Route::get('/dashboard',[AuthController::class,'dashboard']);

	 // User
 	 Route::get('/all-user',[AuthController::class,'all_user']);
   Route::get('/add-user',[AuthController::class,'add_edit_user']);
   Route::get('/edit-user/{id}',[AuthController::class,'add_edit_user']);
   Route::post('/add-edit-user-process',[AuthController::class,'add_edit_user_process'])->name('user_add_edit');
   Route::get('/change-user-status/{status}/{id}',[AuthController::class,'change_user_status']);
   Route::get('/delete-user/{id}',[AuthController::class,'delete_user']);

   // Speaker
 	 Route::get('/all-speaker',[SpeakerController::class,'all_speaker']);
   Route::get('/add-speaker',[SpeakerController::class,'add_edit_speaker']);
   Route::get('/edit-speaker/{id}',[SpeakerController::class,'add_edit_speaker']);
   Route::post('/add-edit-speaker-process',[SpeakerController::class,'add_edit_speaker_process'])->name('speaker_add_edit');
   Route::get('/change-speaker-status/{status}/{id}',[SpeakerController::class,'change_speaker_status']);
   Route::get('/delete-speaker/{id}',[SpeakerController::class,'delete_speaker']);

   // Leader
 	 Route::get('/all-leader',[LeaderController::class,'all_leader']);
   Route::get('/add-leader',[LeaderController::class,'add_edit_leader']);
   Route::get('/edit-leader/{id}',[LeaderController::class,'add_edit_leader']);
   Route::post('/add-edit-leader-process',[LeaderController::class,'add_edit_leader_process'])->name('leader_add_edit');
   Route::get('/change-leader-status/{status}/{id}',[LeaderController::class,'change_leader_status']);
   Route::get('/delete-leader/{id}',[LeaderController::class,'delete_leader']);

   // Agenda
 	Route::get('/all-agenda',[AgendaController::class,'all_agenda']);
   Route::get('/add-agenda',[AgendaController::class,'add_edit_agenda']);
   Route::get('/edit-agenda/{id}',[AgendaController::class,'add_edit_agenda']);
   Route::post('/add-edit-agenda-process',[AgendaController::class,'add_edit_agenda_process'])->name('agenda_add_edit');
   Route::get('/change-agenda-status/{status}/{id}',[AgendaController::class,'change_agenda_status']);
   Route::post('/delete-agenda-event',[AgendaController::class,'delete_agenda_event']);
   Route::get('/delete-agenda/{id}',[AgendaController::class,'delete_agenda']);

   // Gallery
   Route::get('/all-gallery',[GalleryController::class,'all_gallery']);
   Route::get('/add-gallery',[GalleryController::class,'add_edit_gallery']);
   Route::get('/edit-gallery/{id}',[GalleryController::class,'add_edit_gallery']);
   Route::post('/add-edit-gallery-process',[GalleryController::class,'add_edit_gallery_process'])->name('gallery_add_edit');
   Route::get('/change-gallery-status/{status}/{id}',[GalleryController::class,'change_gallery_status']);
   Route::get('/delete-gallery/{id}',[GalleryController::class,'delete_gallery']);

   // About
   Route::get('/about',[AdminController::class,'about']);
   Route::post('/add-edit-about-process',[AdminController::class,'add_edit_about_process'])->name('about_add_edit');

   // Accomodation
   Route::get('/all-accomodation',[AccomodationController::class,'all_accomodation']);
   Route::get('/add-accomodation',[AccomodationController::class,'add_edit_accomodation']);
   Route::get('/edit-accomodation/{id}',[AccomodationController::class,'add_edit_accomodation']);
   Route::post('/add-edit-accomodation-process',[AccomodationController::class,'add_edit_accomodation_process'])->name('accomodation_add_edit');
   Route::get('/change-accomodation-status/{status}/{id}',[AccomodationController::class,'change_accomodation_status']);
   Route::get('/delete-accomodation/{id}',[AccomodationController::class,'delete_accomodation']);

   // Minutes
   Route::get('/minute',[AdminController::class,'minute']);
   Route::post('/add-edit-minute-process',[AdminController::class,'add_edit_minute_process'])->name('minute_add_edit');

   // Activity
 	 Route::get('/all-activity',[ActivityController::class,'all_activity']);
   Route::get('/add-activity',[ActivityController::class,'add_edit_activity']);
   Route::get('/edit-activity/{id}',[ActivityController::class,'add_edit_activity']);
   Route::post('/add-edit-activity-process',[ActivityController::class,'add_edit_activity_process'])->name('activity_add_edit');
   Route::get('/change-activity-status/{status}/{id}',[ActivityController::class,'change_activity_status']);
   Route::post('/delete-activity-event',[ActivityController::class,'delete_activity_event']);
   Route::get('/delete-activity/{id}',[ActivityController::class,'delete_activity']);

   // Deligate
   Route::get('/all-deligate',[DeligateController::class,'all_deligate']);
   Route::get('/add-deligate',[DeligateController::class,'add_edit_deligate']);
   Route::get('/edit-deligate/{id}',[DeligateController::class,'add_edit_deligate']);
   Route::post('/add-edit-deligate-process',[DeligateController::class,'add_edit_deligate_process'])->name('deligate_add_edit');
   Route::get('/change-deligate-status/{status}/{id}',[DeligateController::class,'change_deligate_status']);
   Route::post('/delete-deligate-detail',[DeligateController::class,'delete_deligate_detail']);
   Route::get('/delete-deligate/{id}',[DeligateController::class,'delete_deligate']);
   
   // Account
   Route::get('/account',[AdminController::class,'account']);
   Route::post('/account-process',[AdminController::class,'account_process'])->name('account_process');
   Route::post('/change-password',[AdminController::class,'change_password'])->name('change_password');
   
   // EInvites
   Route::get('/all-einvite',[EInviteController::class,'all_einvite']);
   Route::get('/add-einvite',[EInviteController::class,'add_edit_einvite']);
   Route::get('/edit-einvite/{id}',[EInviteController::class,'add_edit_einvite']);
   Route::post('/add-edit-einvite-process',[EInviteController::class,'add_edit_einvite_process'])->name('einvite_add_edit');
   Route::get('/change-einvite-status/{status}/{id}',[EInviteController::class,'change_einvite_status']);
   Route::get('/delete-einvite/{id}',[EInviteController::class,'delete_einvite']);
   
   // Happy To Help
 	Route::get('/all-happy',[HappyController::class,'all_happy']);
   Route::get('/add-happy',[HappyController::class,'add_edit_happy']);
   Route::get('/edit-happy/{id}',[HappyController::class,'add_edit_happy']);
   Route::post('/add-edit-happy-process',[HappyController::class,'add_edit_happy_process'])->name('happy_add_edit');
   Route::get('/change-happy-status/{status}/{id}',[HappyController::class,'change_happy_status']);
   Route::post('/delete-happy-detail',[HappyController::class,'delete_happy_event']);
   Route::get('/delete-happy/{id}',[HappyController::class,'delete_happy']);
   
   // Video
   Route::get('/all-video',[VideoController::class,'all_video']);
   Route::get('/add-video',[VideoController::class,'add_edit_video']);
   Route::get('/edit-video/{id}',[VideoController::class,'add_edit_video']);
   Route::post('/add-edit-video-process',[VideoController::class,'add_edit_video_process'])->name('video_add_edit');
   Route::get('/change-video-status/{status}/{id}',[VideoController::class,'change_video_status']);
   Route::get('/delete-video/{video}',[VideoController::class,'delete_video']);
   
   // Feedback
   Route::get('/all-feedback',[FeedbackController::class,'all_feedback']);
   Route::get('/view-feedback/{feedback}',[FeedbackController::class,'view_feedback']);
   Route::get('/change-feedback-status/{status}/{feedback}',[FeedbackController::class,'change_feedback_status']);
   Route::get('/delete-feedback/{feedback}',[FeedbackController::class,'delete_feedback']);

   Route::get('/logout', function () {
        session()->forget('user_id');
        session()->forget('name');
        session()->forget('email');
        session()->forget('role');
        session()->forget('app_logo');

        return redirect('admin');
   });

});