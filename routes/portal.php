<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portal\Auth\AuthController;
use App\Http\Controllers\Portal\Auth\GoogleController;
use App\Http\Controllers\Portal\CityController;
use App\Http\Controllers\Portal\EventController;
use App\Http\Controllers\Portal\DistrictController;
use App\Http\Controllers\Portal\DashboardController;
use App\Http\Controllers\Portal\EventInvitationController;

Route::group(['prefix' => '/auth', 'as' => 'auth.', 'controller' => AuthController::class], function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('login-post');
    Route::post('/log-out', 'logOutPost')->name('logout-post');

    Route::get('/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['prefix' => 'events', 'as' => 'events.', 'controller' => EventController::class], function () {
        Route::get('/create', 'create')->name('create');
    });
});

Route::group(['prefix' => '/events', 'as' => 'events.', 'controller' => EventController::class], function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/{event}', 'show')->name('show');
});


Route::group(['prefix' => '/event-invitation-links', 'as' => 'event-invitation-links.', 'controller' => EventInvitationController::class], function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{id?}', 'show')->name('show');
    Route::post('/update/{id?}', 'update')->name('update');
});

Route::group(['prefix' => '/cities', 'as' => 'cities.'], function () {
    Route::get('/search', [CityController::class, 'search'])->name('search');
});

Route::group(['prefix' => '/districts', 'as' => 'districts.'], function () {
    Route::get('/search', [DistrictController::class, 'search'])->name('search');
});
