<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SpeakerController;
use App\Http\Controllers\API\LeaderController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AgendaController;
use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\DeligateController;
use App\Http\Controllers\API\EInviteController;
use App\Http\Controllers\API\HappyController;
use App\Http\Controllers\API\FeedbackController;
use App\Http\Controllers\API\AccomodationController;
use App\Http\Controllers\API\VideoController;

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

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
Route::get('/home',[AdminController::class,'home']);
Route::get('/all-sponsor',[GalleryController::class,'all_sponsor']);
Route::patch('/update-notification-token',[AuthController::class,'update_notification_token']);

Route::middleware(['auth:sanctum'])->group(function (){

    Route::get('/all-speaker',[SpeakerController::class,'all_speaker']);
    Route::get('/speaker/{speaker}',[SpeakerController::class,'view']);
    
    Route::get('/all-leader',[LeaderController::class,'all_leader']);
    Route::get('/leader/{leader}',[LeaderController::class,'view']);
    
    Route::get('/all-agenda',[AgendaController::class,'all_agenda']);
    
    Route::get('/all-activity',[ActivityController::class,'all_activity']);
    
    Route::get('/all-deligate',[DeligateController::class,'all_deligate']);
    Route::get('/deligate-detail/{deligate}',[DeligateController::class,'view']);
    
    Route::get('/all-gallery',[GalleryController::class,'all_gallery']);
    
    Route::get('/all-carousel',[GalleryController::class,'all_carousel']);
    
    Route::get('/all-video',[VideoController::class,'all_video']);
    
    Route::get('/about',[AdminController::class,'about']);
    
    Route::get('/get-accomodation/{id}',[AccomodationController::class,'get_accomodation']);
    
    Route::get('/minute',[AdminController::class,'minute']);
   
    
    Route::get('/all-einvite',[EInviteController::class,'all_einvite']);
    
    Route::get('/all-happy',[HappyController::class,'all_happy']);
    
    Route::post('/update-password',[AdminController::class,'update_password'])->name('update_password');
    
    Route::post('/update-profile-picture',[AdminController::class,'update_profile_picture'])->name('update_profile_picture');
    
    Route::post('/add-edit-feedback-process',[FeedbackController::class,'add_edit_feedback_process'])->name('add_edit_feedback_process');
    
    Route::get('/all-feedback',[FeedbackController::class,'all_feedback']);
    
    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
