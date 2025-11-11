<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\AdminUserController;   // Admin routes for user management
use App\Models\Role;

// Dashboard route: shows a list of up to 50 users (admin user list)
Route::get('/dashboard', function () {
    $users = \App\Models\User::limit(50)->get(); // or ->all()
    return view('user_management.admin.admin_user_list', compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Group admin user management routes with middleware and prefix for clarity and maintainability
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {

    // Unified store route for both students and technicians
    Route::post('/users', [AdminUserController::class, 'store'])->name('admin.users.store');

    // Student creation page
    Route::get('/admin_stud_create', function () {
        // Attempt to retrieve hostels for assigning to students, if exist
        $hostels = collect([]);
        if (Schema::hasTable('hostels')) {
            try {
                $hostels = DB::table('hostels')->get();
            } catch (\Exception $e) {
                $hostels = collect([]);
            }
        }
        return view('user_management.admin.admin_stud_create', compact('hostels'));
    })->name('admin.stud.create');

    // Technician creation page
    Route::get('/admin_tech_create', function () {
        // Could fetch additional technician-relevant data for the form if needed
        return view('user_management.admin.admin_tech_create');
    })->name('admin.tech.create');
});

// Admin: show user edit page for a specific user
Route::get('/admin/users/{user}/update', function (\App\Models\User $user) {
    // THE FIX: Fetch all roles
    $roles = DB::table('roles')->get();
    // Pass BOTH 'user' AND 'roles' to the view
    return view('user_management.admin.admin_user_update', compact('user', 'roles'));
})->name('admin.users.update');


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
