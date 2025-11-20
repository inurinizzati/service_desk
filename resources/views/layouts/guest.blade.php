<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Service Desk') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('metronic/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

        <style>
            body {
                font-family: 'Inter', sans-serif;
                min-height: 100vh;
                margin: 0;
                background: radial-gradient(circle at top, #f0e8ff 0%, #f8f7ff 40%, #ffffff 80%);
                color: #1f1f1f;
            }
            .auth-wrapper {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem;
            }
            .auth-card {
                width: 100%;
                max-width: 430px;
                background: #fff;
                border-radius: 1.25rem;
                box-shadow: 0 30px 60px rgba(111, 66, 193, 0.15);
                padding: 2.5rem 2.75rem;
            }
            .auth-brand {
                text-align: center;
                margin-bottom: 1.5rem;
            }
            .auth-brand .logo-text {
                font-size: 1.25rem;
                font-weight: 700;
                color: #6f42c1;
            }
            .auth-title {
                font-size: 1.5rem;
                font-weight: 600;
                color: #1f1f1f;
                margin-bottom: .35rem;
                text-align: center;
            }
            .auth-subtitle {
                font-size: .95rem;
                color: #6f6b82;
                text-align: center;
                margin-bottom: 1.75rem;
            }
            .auth-form .form-label {
                font-weight: 500;
                color: #4b4b63;
            }
            .auth-form .form-control {
                border-radius: .85rem;
                border-color: #e8e5f2;
                padding: .85rem 1rem;
                font-size: .95rem;
            }
            .auth-form .form-control:focus {
                border-color: #6f42c1;
                box-shadow: 0 0 0 .2rem rgba(111, 66, 193, 0.15);
            }
            .auth-footer {
                margin-top: 1.5rem;
                text-align: center;
                font-size: .9rem;
            }
            .auth-link {
                color: #6f42c1;
                font-weight: 600;
                text-decoration: none;
            }
            .auth-link:hover {
                text-decoration: underline;
            }
        </style>
        @stack('styles')
    </head>
    <body>
        <div class="auth-wrapper">
            <div class="auth-card">
            <div class="auth-brand">
                <span class="logo-text">{{ config('app.name', 'Service Desk') }}</span>
            </div>

                {{ $slot }}
            </div>
        </div>

        <script src="{{ asset('metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('metronic/assets/js/scripts.bundle.js') }}"></script>
        @stack('scripts')
    </body>
</html>
