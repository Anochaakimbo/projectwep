<?php
use App\Models\rooms;
use App\Models\Booking;
use GuzzleHttp\Middleware;
use App\Http\Controllers\AdminComtroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/Report', function () {
        return view('Report');})->name('Report');
    Route::get('/Payrent', function () {
        return view('Payrent');
    })->name('Payrent');
    Route::get('/Roomdetails', function () {
        return view('Roomdetails');
    })->name('Roomdetails');
});

Route::post('/guest/bookings/{booking}/pay', [BookingController::class, 'payBooking']);

Route::post('/guest/book', [BookingController::class, 'create']);

Route::post('/admin/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->Middleware('admin');

route::get('/home',[HomeController::class,'index']);

Route::post('/admin/create-user', [AdminComtroller::class, 'createUserFromBooking']);

route::get('/admin/booking',[HomeController::class,'booking'])->Middleware('admin')->name('booking');

route::get('/adminpage',[HomeController::class,'page'])->Middleware('admin')->name('adminpage');

route::get('/guestpage',[HomeController::class,'guest'])->Middleware('admin')->name('guestpage');

route::get('/customerproblem',[HomeController::class,'customerprob'])->Middleware('admin')->name('customerproblem');

Route::get('/select', function () {
    $rooms = rooms::all();
    $bookings = Booking::all();
    return view('selectbook',['rooms' => $rooms],['bookings' => $bookings]);
})->name('select');

Route::post('/guest/bookings/{booking}/pay', [BookingController::class, 'pay']);


Route::get('/admin/booking/confirm/{id}', [AdminComtroller::class, 'showConfirmBooking'])->name('admin.booking.confirm')->Middleware('admin');

Route::post('/admin/booking/confirm/{id}', [AdminComtroller::class, 'confirmBooking'])->name('admin.booking.confirm.post')->Middleware('admin');

Route::post('/admin/booking/delete/{id}', [AdminComtroller::class, 'deleteBooking'])->name('admin.booking.delete')->Middleware('admin');

Route::post('/admin/create-user', [AdminComtroller::class, 'createUserFromBooking'])->name('admin.create.user')->Middleware('admin');




// Route::get('/Roomdetails', function () {
//     return view('Roomdetails');
// })->name('Roomdetails');

// Route::get('/Payrent', function () {
//     return view('Payrent');
// })->name('Payrent');