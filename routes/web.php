<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/testt', function () {
    Mail::raw('{{!!<h1>eeeeeeeeeeeeeeeeee</h1>!!}}', function ($message) {

        $message->to('taharom12345@gmail.com', 'John Doe');

        $message->subject('Subject');

    });

    return ('thnkssssssssssssssssssssssssssss');
});
Route::get('/index', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Auth::routes(['verify'=>true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
