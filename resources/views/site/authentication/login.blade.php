<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('site/assets/css/auth-login.css') }}">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <title>Emergency Time</title>
</head>
<body>
    <div class="login">
        <div class="login__content">
            <div class="login__img">
                <img src="{{ asset('site/assets/images/img-login.svg') }}" alt="">
            </div>

            <div class="login__forms">
                {{-- sign in form start --}}
                <form method="POST" action="{{ route('login') }}" class="login__registre" id="login-in">
                    @csrf
                    <h1 class="login__title">Sign In</h1>

                    <div class="login__box">
                        <i class='bx bx-at login__icon'></i>
                        <input type="email" name="email" placeholder="Email" class="login__input" required>
                    </div>
                    @error('email')
                        <div style="color: red" class="error-message">{{ $message }}</div>
                    @enderror

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" name="password" placeholder="Password" class="login__input" required>
                    </div>
                    @error('password')
                        <div style="color: red"  class="error-message">{{ $message }}</div>
                    @enderror

                    <a href="{{ route('password.request') }}" class="login__forgot">Forgot password?</a>
                    <button type="submit" class="login__button">Sign In</button>

                    <div>
                        <span class="login__account">Don't have an Account ?</span>
                        <span class="login__signin" id="sign-up">
                             Sign Up
                            </span>
                    </div>
                </form>
                {{-- sign in form end --}}

                {{-- sign up form start --}}
                <form method="POST" action="{{ route('register') }}" class="login__create none" id="login-up">
                    @csrf
                    @method('POST')
                    <h1 class="login__title">Create Account</h1>

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" name="name" placeholder="Name" class="login__input" required>
                        @error('name')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="login__box">
                        <i class='bx bx-at login__icon'></i>
                        <input type="email" name="email" placeholder="Email" class="login__input" required>
                        @error('email')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" name="password" placeholder="Password" class="login__input" required autocomplete="new-password">
                        @error('password')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="login__input" required autocomplete="new-password">
                        @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="login__button">Sign Up</button>

                    <div>
                        <span class="login__account">Already have an Account ?</span>
                        <span class="login__signup" id="sign-in">Sign In</span>
                    </div>

                    {{-- <div class="login__social">
                        <a href="#" class="login__social-icon"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="login__social-icon"><i class='bx bxl-twitter'></i></a>
                        <a href="#" class="login__social-icon"><i class='bx bxl-google'></i></a>
                    </div> --}}
                </form>
                {{-- sign up form end --}}
            </div>
        </div>
    </div>

    <!--===== MAIN JS =====-->
    <script src="{{ asset('site/assets/js/auth-login.js') }}"></script>
</body>
</html>
