<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\RewardRequestController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

Route::get('user/login', 'FrontendController@login')->name('login.form');
Route::post('user/login', 'FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout', 'FrontendController@logout')->name('user.logout');

Route::get('user/register', 'FrontendController@register')->name('register.form');
Route::post('user/register', 'FrontendController@registerSubmit')->name('register.submit');
// Reset password
Route::post('password-reset', 'FrontendController@showResetForm')->name('password.reset');
// Socialite
Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/home', function () {
    return view('frontend.index');
});

Route::get('/product', [FrontendController::class, 'productLists'])->name('layanan.harga.sampah');
Route::get('/reward', [FrontendController::class, 'rewardLists'])->name('layanan.reward');
// Route::get('/pickup', [FrontendController::class, 'pickupForm'])->name('layanan.pickup')->middleware('user');
// Route::get('/pickup-store', [FrontendController::class, 'submitPickup'])->name('layanan.pickup.save')->middleware('user');


Route::get('/about', function () {
    return view('frontend.pages.about');
});
Route::get('/contact', function () {
    return view('frontend.pages.contact');
});

Route::get('/product-grids', 'FrontendController@productGrids')->name('product-grids');
Route::get('/product-lists', 'FrontendController@productLists')->name('product-lists');

// Backend section start

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/file-manager', function () {
        return view('backend.layouts.file-manager');
    })->name('file-manager');
    // user route
    Route::resource('users', 'UsersController');
    // Profile
    Route::get('/profile', 'AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}', 'AdminController@profileUpdate')->name('profile-update');
    // Category
    Route::resource('/faculty', 'FacultyController');
    // Category
    Route::resource('/category', 'CategoryController');
    // Product
    Route::resource('/product', 'ProductController');
    // Reward
    Route::resource('/reward', 'RewardController');
    // Message
    Route::resource('/message', 'MessageController');
    Route::get('/message/five', 'MessageController@messageFive')->name('messages.five');

    // Order
    Route::resource('/order', 'OrderController');
    Route::get('/orders/export-pdf', [OrderController::class, 'exportPdf'])->name('orders.exportPdf');

    // Withdraw
    Route::get('/withdrawals', 'WithdrawController@index')->name('withdraw.index');
    Route::get('/withdraw/create', 'WithdrawController@create')->name('withdraw.create');
    Route::post('/withdraw/store', 'WithdrawController@store')->name('withdraw.store');
    Route::delete('/withdraw/{id}/cancel', 'WithdrawController@cancel')->name('withdraw.cancel');

    // RewardRequest
    Route::get('/reward_requests', 'RewardRequestController@index')->name('reward_requests.index');
    Route::get('/reward_requests/create', 'RewardRequestController@create')->name('reward_requests.create');
    Route::post('/reward_requests/store', 'RewardRequestController@store')->name('reward_requests.store');
    Route::get('/reward_requests/{id}/approve', 'RewardRequestController@approve')->name('reward_requests.approve');
    Route::get('/reward_requests/{id}/decline', 'RewardRequestController@decline')->name('reward_requests.decline');
    Route::get('/reward-requests/export-pdf', [RewardRequestController::class, 'exportPdf'])->name('rewardRequests.exportPdf');


    // Settings
    Route::get('settings', 'AdminController@settings')->name('settings');
    Route::post('setting/update', 'AdminController@settingsUpdate')->name('settings.update');

    // Notification
    Route::get('/notification/{id}', 'NotificationController@show')->name('admin.notification');
    Route::get('/notifications', 'NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}', 'NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');
});

// User section start
Route::group(['prefix' => '/user', 'middleware' => ['user']], function () {
    Route::get('/', 'HomeController@index')->name('user');
    // Profile
    Route::get('/profile', 'HomeController@profile')->name('user-profile');
    Route::post('/profile/{id}', 'HomeController@profileUpdate')->name('user-profile-update');
    //  Order
    Route::get('/order', "HomeController@orderIndex")->name('user.order.index');
    Route::get('/reward', "HomeController@rewardIndex")->name('user.reward.index');
    Route::get('/rewards/{id}/request', [HomeController::class, 'requestReward'])->name('rewards.request');

    // Password Change
    Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
    Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
