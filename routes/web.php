<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\backendController;
use App\Http\Controllers\LawnController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function (){
//     return "Subscription Expired";
// });
Route::get('/', [backendController::class, 'home']);
Route::get('/about', [backendController::class, 'about']);
Route::get('/lawns', [backendController::class, 'lawn']);
Route::get('/lawn/{id}', [backendController::class, 'aboutlawn']);
Route::get('/agents', [backendController::class, 'agent']);
Route::get('/lawns/search', function () {
    return redirect('/lawns');
});
Route::post('/lawns/search', [backendController::class, 'lawns_search']);
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/refund', function () {
    return view('refund');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/single', function () {
    return view('single');
});
// Route::get('/services', function () {
//     return view('services');
// });
Route::post('/enquery', [backendController::class, 'senquery']);
Route::delete('/enquery_destroy/{id}', [backendController::class, 'enquery_destroy']);
Route::get('/contact', [backendController::class, 'get_enquery']);
// user Route
Route::get('/check_availibility', [backendController::class, 'check_availibility']);

Route::post('/booknow', [backendController::class, 'booknow'])->middleware('authcusto');
Route::get('/login', function () {
    if (Auth::guard('customer')->check()) {
        return redirect()->route('mybooking');
    } else {

        return view('login');
    }
})->name('customer_login');

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [backendController::class, 'register']);
Route::post('/login', [backendController::class, 'login']);

Route::get('/logout', [backendController::class, 'logout']);
Route::middleware('authcusto')->group(function () {
    Route::get('/mybooking', [backendController::class, 'mybooking'])->name('mybooking');
});



// Vendor
Route::get("/vendor/login", function () {
    return view('vendor.login');
})->name('vendor_login');
Route::post('/vendor/login', [backendController::class, 'vendor_login']);
Route::get('/vendor/logout', [backendController::class, 'vendor_logout']);
Route::middleware('authvendor')->prefix('/vendor')->group(function () {
    Route::get('/', function () {
        return view('vendor.dashboard');
    })->name("vendordashboard");
    Route::post('/booking_lawn', [backendController::class, 'lawn_vendor_booking']);
    Route::get('/profile', [backendController::class, 'vendor_profile']);
    Route::post('/update_profile', [backendController::class, 'vendor_update_profile']);
    Route::post('/update', [backendController::class, 'vendor_update']);
    Route::get('/change_password', [backendController::class, 'vendor_change_password']);
    Route::post('/change_password', [backendController::class, 'vendor_change_password_post']);
    Route::get('/notification', [backendController::class, 'vendor_notification']);
    Route::get('/booking', [backendController::class, 'vendor_all_booking']);
    Route::get('/lawns' ,[backendController::class,'vendor_lawn_list']);
    Route::get('/lawn/{id}' ,[backendController::class,'vendor_lawn'])->name('vendor_lawn_edit');
    Route::post('/lawn' ,[backendController::class,'vendor_lawn_update']);
    Route::post('/lawn/image/add' ,[backendController::class,'vendor_lawn_add_image'])->name('vendor_lawn_add_image');
    Route::post('/lawn/image/del' ,[backendController::class,'vendor_lawn_del_image'])->name('vendor_lawn_del_image');
    Route::get('/get/booking/{month}/{year}' ,[backendController::class,'vendor_get_booking']);
    Route::get('/get/bookingdetail/{bookingid}' ,[backendController::class,'vendor_get_bookingdetail']);
    Route::get('/get/lawn',[backendController::class,'vendor_get_lawn']);
});






// Admin routes
Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name("admindashboard");
    Route::resource('/vendor', VendorController::class)->name("vendor", "*");
    Route::resource('/lawn', LawnController::class)->name("lawn", "*");
    Route::resource('/agent', AgentController::class)->name("agent", "*");
    Route::resource('/feedback', FeedbackController::class)->name("feedback", "*");

    Route::get('/enquery', [backendController::class, 'enquery']);
    Route::get('/customer', [backendController::class, 'customer']);
    Route::get('/booking', [backendController::class, 'booking']);
    Route::get('/enquery/del/{id}', [backendController::class, 'delete_enquery']);
    Route::get('/profile', [backendController::class, 'profile']);
    Route::get('/billing', [backendController::class, 'billing']);
    Route::get('/security', [backendController::class, 'security']);

    Route::post('/update_profile', [backendController::class, 'admin_update_profile']);
    Route::post('/update', [backendController::class, 'admin_update']);
    Route::get('/change_password', [backendController::class, 'admin_change_password']);

    Route::post('/change_password', [backendController::class, 'admin_change_password_post']);
    Route::get('/notification', [backendController::class, 'notification']);
});


Route::get('/admin/login', function () {
    if (auth()->check()) {
        return redirect()->route('admindashboard');
    } else {
        return view('admin.login');
    }
});
Route::post('/admin/login', [backendController::class, 'admin_login'])->name('admin_login');

Route::get('/admin/logout', [backendController::class, 'admin_logout']);

// agent
Route::get("/agent/login", function () {
    return view('agent.login');
})->name('agent_login');
Route::post('/agent/login', [backendController::class, 'agent_login']);
Route::get('/agent/logout', [backendController::class, 'agent_logout']);
Route::middleware('authagent')->prefix('/agent')->group(function () {
    Route::get('/dashboard', function () {
        return view('agent.dashboard');
    })->name("agentdashboard");
    Route::get('/', function () {
        return view('agent.dashboard');
    })->name("agentdashboard");
    Route::post('/booking_lawn', [backendController::class, 'lawn_agent_booking']);
    Route::get('/profile', [backendController::class, 'agent_profile']);
    Route::post('/update_profile', [backendController::class, 'agent_update_profile']);
    Route::post('/update', [backendController::class, 'agent_update']);
    Route::get('/change_password', [backendController::class, 'agent_change_password']);
    Route::post('/change_password', [backendController::class, 'agent_change_password_post']);
    Route::get('/notification', [backendController::class, 'agent_notification']);
    // Route::get('/security', [backendController::class, 'agent_notification']);
    Route::get('/booking', [backendController::class, 'agent_all_booking']);
    Route::get('/customer', [backendController::class, 'agent_customer']);
    Route::get('/addcustomer', [backendController::class, 'add_customer']);
    Route::post('/addcustomer', [backendController::class, 'add_post_customer']);
});
