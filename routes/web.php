<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Dashboard route: shows a list of up to 50 users (admin user list)
Route::get('/dashboard', function () {
    $users = \App\Models\User::limit(50)->get(); // or ->all()
    return view('user_management.admin.admin_user_list', compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin: show user creation page (to be implemented)
Route::get('/admin/admin_users_create', function () {
    return 'User Create Page (to be implemented)';
})->name('admin.users.create');

// Admin: show user edit page for a specific user (to be implemented)
Route::get('/admin/admin_users_edit/{id}', function ($id) {
    return "Edit User $id (to be implemented)";
})->name('admin.users.edit');

// Admin: destroy a specific user (to be implemented)
Route::get('/admin/admin_users_destroy/{id}', function ($id) {
    return "Destroy User $id (to be implemented)";
})->name('admin.users.destroy');

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
