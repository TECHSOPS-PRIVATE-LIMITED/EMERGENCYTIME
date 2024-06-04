<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('site/assets/css/sign-up-style.css') }}">
    <title>{{ __('Emergency Time') }}</title>
</head>
<body>
<div class="container" id="container">

{{-- sign up form start--}}
    <div class="form-container sign-up">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            @method('POST')
            <h1>Create Account</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            </div>
            <span>or use your email password</span>
{{-- name --}}
            <input type="text" name="name" placeholder="Name" required>
            @error('name')
            <div class="error-message">{{ $message }}</div>  <
            @enderror

{{-- email --}}
            <input type="email" name="email" placeholder="Email" required>
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror

{{--passowrd--}}
            <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror

{{-- confirm password --}}
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="password_confirmation">
            @error('password_confirmation')
            <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit" >Sign Up</button>
        </form>
    </div>
    {{-- sign up form end--}}

    {{-- sign in form start--}}
    <div class="form-container sign-in">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>{{ __('Sign In') }}</h1>

            <input type="email" name="email" placeholder="Email">
            @error('email')
            <div class="error-message">{{ $message }}</div>  <
            @enderror
            <input type="password" name="password" placeholder="Password">
            @error('password')
            <div class="error-message">{{ $message }}</div>  <
            @enderror
            <a href="#">{{ __('Forget Your Password?') }}</a>
            <button type="submit">{{ __('Sign In') }}</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <p>Register yourself so we can help you further</p>
                <button class="hidden" id="login"> Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Enter your credentials for further proceeding</p>
                <button class="hidden" id="register">Sign Up</button>
            </div>
        </div>
    </div>
</div>



<script src="{{ asset('site/assets/js/sign-up-script.js') }}"></script>

</body>
</html>
