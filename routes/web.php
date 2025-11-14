<?php
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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
