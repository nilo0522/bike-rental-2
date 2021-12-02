<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\BikeDetailController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontpageController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeControllerV2;
use Illuminate\Http\Request;

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
		return view('frontpage');
	});
	

	
	Route::get('dashboard',[HomeControllerV2::class,'index']);
	
	
	
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');

//Route::get('/dashboard', [AdminController::class, 'index'])->name('home');

 Auth::routes(['verify'=>true]);
 //EMAIL VERIFICATION

 Route::get('about-us',[HomeController::class,'aboutus']);
 Route::get('contact',[HomeController::class,'contactus']);
Route::get('user/home',function(){
	return view('auth/login');
})->middleware(['auth','verified'])->name('user/home');

// SMS NOTIFY

//Route::any('send-sms',[SmsController::class,'send']);

//=========================================USERS=============================================
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::resource('bike_details',BikeDetailController::class);
/*
Route::get('allbikes',[BikeDetailController::class,'allbikes']);
Route::get('reg-users',[RegisterController::class,'reg-users']);
Route::get('withdriver',[BikeDetailController::class,'withdriver']);
Route::get('withoutdriver',[BikeDetailController::class,'withoutdriver']);
*/


Route::get('upload-bike',[BikeDetailController::class,'create']);
Route::get('bike-listing',[BikeDetailController::class,'index']);
Route::get('bikedetail/{bike_details}',[BikeDetailController::class,'show']);
//Route::get('myposts/{bike_details}',[BikeDetailController::class,'userpost']);
Route::get('editbike/{BikeDetail}',[BikeDetailController::class,'edit']);
Route::get('deletebike/{bike_details}',[BikeDetailController::class,'destroy']);
Route::get('updatebike/{bike_details}',[BikeDetailController::class,'update']);
Route::get('booking/{bike_details}',[BookingController::class, 'booking']);


//KAILANGAN I CHANGE ANG ROUTE BOOKING FORM to PAYMENT PAGE
Route::get('checkout',[CheckoutController::class, 'checkout'])->name('checkout');


Route::post('checkout',[CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');

//USER PROFILE
Route::get('account/{users}',[HomeController::class,'profile']);




//=============================================ADMIN=====================================
Route::get('admin/dashboard', [AdminController::class,'index'])->name('dashboard')->middleware('auth');
Route::get('admin/usermanagement',[AdminController::class,'users'])->name('usermanagement');
Route::get('admin/bikes',[AdminController::class,'bikes'])->name('bikes');
Route::get('admin/edit',[AdminController::class,'profile'])->name('profile');
Route::get('admin/payments',[AdminController::class,'payments'])->name('payments');
Route::get('admin/rentals',[AdminController::class,'rentals'])->name('rentals');
Route::get('admin/return',[AdminController::class,'return'])->name('return');
Route::get('admin/extend',[AdminController::class,'extend'])->name('extend');
Route::get('admin/map',[AdminController::class,'maps'])->name('maps');
Route::get('admin/edituser',[AdminController::class,'edituser'])->name('edituser');
//Route::get('viewbike/{viewwbike}',[BikeDetailController::class,'view']);


//KAILANGAN IFIX====== EDIT.PROFILE THEN PROFILECONTROLLER===========================================================
//Route::get('editprofile',[ProfileController::class,'update'])->name('profileedit')->middleware('auth');

//==========================================BIKES=============================================
Route::post('approval',[AdminController::class, 'approval'])->name('approval');
Route::post('disable',[AdminController::class, 'disable'])->name('disable');