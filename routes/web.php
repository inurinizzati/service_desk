<?php
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\TechnicianTicketController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return Auth::check()
//         ? redirect('/dashboard')
//         : redirect('/login');
// });


Route::redirect('/', '/dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboardadmin', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'student']) //for student and technician dashboard
    ->middleware(['auth', 'verified'])
    ->name('dashboard.student');

Route::middleware('auth')->group(function () {

    //feedback
    Route::prefix('feedback')->name('feedback.')->group(function () {
        Route::get('/index', [FeedbackController::class, 'index'])->name('index');
        Route::get('/Admin', [FeedbackController::class, 'index_admin'])->name('index_admin');
        Route::get('/technian', [FeedbackController::class, 'index_technian'])->name('index_technian');
        Route::get('/create', [FeedbackController::class, 'create'])->name('create');
        Route::post('/save', [FeedbackController::class, 'store'])->name('save');

    });



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});


//Complaint Ticket Module

Route::get('/createticket', function () {
    return view('complaintmodule.createticket');
});

Route::get('/ticketlistdata', [TicketController::class, 'index'])->name('ticket.list');

Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.details');

//Admin Ticket
Route::prefix('admin')->group(function () {
    Route::get('/tickets', [AdminTicketController::class, 'index'])->name('admin.ticket.list');
    Route::get('/tickets/{id}', [AdminTicketController::class, 'show'])->name('admin.ticket.details');
    Route::post('/tickets/assign', [AdminTicketController::class, 'assignTechnician'])->name('admin.assign.technician');
});

// Technician
Route::prefix('technician')->middleware(['auth'])->group(function () {

    Route::get('/tickets', [TechnicianTicketController::class, 'index'])
        ->name('technician.ticket.list');

    Route::get('/tickets/{id}', [TechnicianTicketController::class, 'show'])
        ->name('technician.ticket.details');

    Route::get('/tickets/{id}/update', [TechnicianTicketController::class, 'edit'])
        ->name('technician.ticket.update');

    Route::post('/tickets/{id}/update', [TechnicianTicketController::class, 'update'])
        ->name('technician.ticket.update.submit');
});

require __DIR__.'/auth.php';
