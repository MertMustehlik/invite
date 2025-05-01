<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\InvitationController;


Route::get('/',[HomeController::class,'index'])->name('home.index');


//baseurl/eventId/ece-efe/code
Route::get('etkinlik/{eventId}/{partnerNames}/{code}', [InvitationController::class, 'show'])->name('invitation.show');
