<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //feedback
    Route::prefix('feedback')->name('feedback.')->group(function () {
        Route::get('/index', [FeedbackController::class, 'index'])->name('index');
        Route::get('/Admin', [FeedbackController::class, 'index_admin'])->name('index_admin');
        Route::get('/technian', [FeedbackController::class, 'index_technian'])->name('index_technian');
        Route::get('/feedback', [FeedbackController::class, 'create'])->name('create');




    });



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

Route::get('/createticket', function () {
    return view('complaintmodule.createticket');
});

Route::get('/ticketlistnodata', function () {
    return view('complaintmodule.ticketlistnodata');
});

Route::get('/ticketlistdata', [TicketController::class, 'index'])->name('ticket.list');

// Route::get('/ticketdetails', function () {
//     return view('complaintmodule.ticketdetails', ['ticket' => $ticket]);
// });

Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.details');


// Route::get('/ticket/{id}/edit', [TicketController::class, 'edit'])->name('ticket.edit');



require __DIR__.'/auth.php';
