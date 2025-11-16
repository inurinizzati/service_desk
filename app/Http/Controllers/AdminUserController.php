<?php
// ... namespace and use statements ...

use App\Models\User;
use App\Models\Role; // Assuming this model now exists
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
// ... (rest of your existing code)

class AdminUserController extends Controller
{
    // ... other methods (index, edit, update, etc.) ...

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
