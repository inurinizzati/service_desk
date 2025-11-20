<x-guest-layout>
    <div class="auth-title">Create Account</div>
    <div class="auth-subtitle">Register to start managing your tickets.</div>

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div class="mb-4">
            <label class="form-label">User ID</label>
            <input type="text" class="form-control bg-light" value="Generated automatically" readonly>
            <small class="text-muted">Your UserID will be generated after registration.</small>
        </div>

        <div class="mb-4">
            <label for="name" class="form-label required">Full Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="form-label required">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="student_id" class="form-label required">Student ID</label>
            <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror"
                   name="student_id" value="{{ old('student_id') }}" required placeholder="e.g. STU12345">
            @error('student_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="form-label required">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label required">Confirm Password</label>
            <input id="password_confirmation" type="password" class="form-control"
                   name="password_confirmation" required autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-primary w-100 py-3">
            Create Account
        </button>
    </form>

    <div class="auth-footer">
        Already have an account?
        <a href="{{ route('login') }}" class="auth-link">Log in</a>
    </div>
</x-guest-layout>