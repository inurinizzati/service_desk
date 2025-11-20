<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    /**
     * Display a listing of users with search and filter.
     */
    public function index(Request $request)
    {
        $query = User::with('role');

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('userid', 'like', "%{$search}%")
                  ->orWhere('student_id', 'like', "%{$search}%");
            });
        }

        // Filter by role
        if ($request->has('role') && !empty($request->role)) {
            $query->whereHas('role', function($q) use ($request) {
                $q->where('slug', $request->role);
            });
        }

        // Get roles for filter dropdown
        $roles = Role::all();

        // Get users (limit to 50 or paginate)
        $users = $query->limit(50)->get();

        return view('user_management.admin.admin_user_list', compact('users', 'roles'));
    }

    /**
     * Export users to CSV
     */
    public function export(Request $request)
    {
        $query = User::with('role');

        // Apply same filters as index
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('userid', 'like', "%{$search}%")
                  ->orWhere('student_id', 'like', "%{$search}%");
            });
        }

        if ($request->has('role') && !empty($request->role)) {
            $query->whereHas('role', function($q) use ($request) {
                $q->where('slug', $request->role);
            });
        }

        $users = $query->get();

        $filename = 'users_export_' . date('Y-m-d_His') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function() use ($users) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, ['No', 'UserID', 'Student ID', 'Name', 'Email', 'Role', 'Status', 'Phone', 'Created At']);
            
            // Add data rows
            $no = 1;
            foreach ($users as $user) {
                fputcsv($file, [
                    $no++,
                    $user->userid ?? '—',
                    $user->student_id ?? '—',
                    $user->name,
                    $user->email,
                    $user->role->name ?? '—',
                    $user->is_active ? 'Active' : 'Inactive',
                    $user->phone_num ?? '—',
                    $user->created_at ? $user->created_at->format('Y-m-d') : '—',
                ]);
            }
            
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function store(Request $request)
    {
        // 1. Validation: We validate the fields provided by the form.
        $request->validate([
            // 'userid' validation is REMOVED as you want it generated automatically
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            // Validate the field named 'role' and check if the slug exists in the 'roles' table
            'role' => ['required', 'string', Rule::exists('roles', 'slug')],

            // Validate the field named 'status'
            'status' => ['required', 'string', Rule::in(['ACTIVE', 'INACTIVE'])],

            'phone_num' => ['nullable', 'string', 'max:20'],
            // 'hostel_id' validation would go here if uncommented
        ]);

        // 2. Data Preparation: Convert form data into database format

        // A. Convert Role Name (slug) to role_id
        $role = Role::where('slug', strtolower($request->role))->first();
        if (!$role) {
            // Should not happen if validation passed, but good safeguard
            return back()->withInput()->withErrors(['role' => 'The selected role is invalid.']);
        }

        // B. Convert Status (string) to is_active (boolean/integer)
        $isActive = ($request->status === 'ACTIVE'); // True if 'ACTIVE', False if 'INACTIVE'

        // C. Handle automatic UserID generation
        // (This happens in the User model's 'creating' event, but we need to ensure
        // the form doesn't send a hidden 'userid' input to conflict with it.)

        // 3. Create the User
        User::create([
            // 'userid' is handled by the User model's boot method (from previous answer)
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            // Insert the converted data
            'role_id' => $role->id,      // The required foreign key
            'is_active' => $isActive,    // The required boolean status

            // Optional fields
            'phone_num' => $request->phone_num,
            // 'hostel_id' => $request->hostel_id,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }
}
