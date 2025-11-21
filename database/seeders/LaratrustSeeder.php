<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class LaratrustSeeder extends Seeder
{
    public function run()
    {
        // === Create Roles ===
        $admin = Role::create(['name' => 'admin', 'display_name' => 'Admin']);
        $student = Role::create(['name' => 'student', 'display_name' => 'Student']);
        $technician = Role::create(['name' => 'technician', 'display_name' => 'Technician']);

        // === Permission List ===
        $permissions = [
            'register-technician',
            'assign-technician',
            'view-all-feedback',
            'view-admin-dashboard',

            'create-complaint',
            'view-own-ticket-status',
            'submit-feedback',
            'view-student-dashboard',

            'view-assigned-ticket',
            'update-ticket-status',
            'view-technician-dashboard'
        ];

        // === Create Permissions ===
        foreach ($permissions as $p) {
            Permission::create([
                'name' => $p,
                'display_name' => ucwords(str_replace('-', ' ', $p)),
            ]);
        }

        // Now attach permissions properly (Laratrust v8 style)

        $admin->permissions()->sync(
            Permission::whereIn('name', [
                'register-technician',
                'assign-technician',
                'view-all-feedback',
                'view-admin-dashboard',
            ])->pluck('id')->toArray()
        );

        $student->permissions()->sync(
            Permission::whereIn('name', [
                'create-complaint',
                'view-own-ticket-status',
                'submit-feedback',
                'view-student-dashboard',
            ])->pluck('id')->toArray()
        );

        $technician->permissions()->sync(
            Permission::whereIn('name', [
                'view-assigned-ticket',
                'update-ticket-status',
                'view-technician-dashboard',
            ])->pluck('id')->toArray()
        );
    }
}
