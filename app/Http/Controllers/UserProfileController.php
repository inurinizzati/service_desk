<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserProfileController extends Controller
{
    /**
     * Show the student profile form.
     */
    public function editStudent(Request $request): View
    {
        $user = $request->user();
        $this->authorizeRole($user, 'student');

        return view('user_management.student.stud_profile_view', [
            'user' => $user,
        ]);
    }

    /**
     * Update the student profile.
     */
    public function updateStudent(Request $request): RedirectResponse
    {
        $user = $request->user();
        $this->authorizeRole($user, 'student');

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'student_id' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'student_id')->ignore($user->id),
            ],
            'phone_num' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->student_id = $validated['student_id'];
        $user->phone_num = $validated['phone_num'] ?? null;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back()->with('status', 'Profile updated successfully.');
    }

    /**
     * Show the technician profile form.
     */
    public function editTechnician(Request $request): View
    {
        $user = $request->user();
        $this->authorizeRole($user, 'technician');

        return view('user_management.technician.tech_profile_view', [
            'user' => $user,
        ]);
    }

    /**
     * Update the technician profile.
     */
    public function updateTechnician(Request $request): RedirectResponse
    {
        $user = $request->user();
        $this->authorizeRole($user, 'technician');

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'phone_num' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone_num = $validated['phone_num'] ?? null;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back()->with('status', 'Profile updated successfully.');
    }

    /**
     * Ensure the authenticated user has the expected role.
     */
    protected function authorizeRole($user, string $expectedRole): void
    {
        $roleSlug = optional($user->role)->slug;
        if ($roleSlug !== $expectedRole) {
            abort(403, 'You are not authorized to access this page.');
        }
    }
}

