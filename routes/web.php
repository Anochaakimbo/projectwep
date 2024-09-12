<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use PHPUnit\Framework\Attributes\Group;
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
    Route::get('/Roomdetails', function () {
        return view('Roomdetails');  
    })->name('Roomdetails');
    Route::get('/Payrent', function () {
        return view('Payrent');
    })->name('Payrent');
    Route::get('/Report', function () {
        return view('Report');
    })->name('Report');
});

route::get('/home',[HomeController::class,'index'])->name('home');

route::get('/adminpage',[HomeController::class,'page'])->Middleware('admin')->name('adminpage');

route::get('/guestpage',[HomeController::class,'guest'])->Middleware('auth')->name('guestpage');

Route::get('/select', function () {
    return view('selectbook');
})->name('selectbook');

Route::get('/Roomdetail_Guest', function () {
    return view('roomdetail');
});
Route::get('/Rent_1', function () {
    return view('rent_1');
})->name('rent_1');;

Route::get('/Rent_2', function () {
    return view('rent_2');
})->name('rent_2');

Route::get('/Rent_3', function () {
    return view('rent_3');
})->name('rent_3');

Route::get('/Rent_4', function () {
    return view('rent_4');
})->name('rent_4');