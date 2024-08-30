<!-- success.blade.php -->
@if (session('status'))
    <p>{{ session('status') }}</p>
    <p>{{ session('user_verification_data') }}</p>
@endif