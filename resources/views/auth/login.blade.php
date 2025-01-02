<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Job Portal: Login</title>
    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
</head>

<body>
    <!-- Header -->
    @include('user.common.header')
    <!-- //Header -->

    <!-- Theme Switcher Dropdown (Light/Dark) -->
    <div class="theme-switcher">
        <select id="theme-switch-dropdown" aria-label="Switch Theme">
            <option value="light">Light Mode</option>
            <option value="dark">Dark Mode</option>
        </select>
    </div>

    <!-- Breadcrumb Section -->
    <section class="w3l-about-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about">
            <div class="container py-lg-5 py-sm-4">
                <div class="w3breadcrumb-gids text-center">
                    <div class="w3breadcrumb-info mt-5">
                        <h2 class="w3ltop-title pt-4">Get logged in</h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span> login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Breadcrumb Section -->

    <!-- Login Form Section -->
    <section class="w3l-contact-1 w3hny-form-btm py-5" id="login">
        <div class="contacts-9 py-lg-5 py-md-4">
            <div class="container">
                <div class="header-sec text-center mb-5">
                    <h6 class="title-subhny mb-2">Please Log In</h6>
                    <h3 class="title-w3l">
                        Access your job opportunities and <br> manage your career anytime
                    </h3>
                </div>

                <!-- Success Message -->
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Login Form -->
                <div class="contactct-fm map-content-9">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="form-group mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mt-4 mb-3">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember" style="width: 16px; height: 16px;">
                            <label for="remember_me" class="form-check-label text-sm text-gray-600 dark:text-gray-400" style="font-size: 0.875rem;">
                                {{ __('Remember me') }}
                            </label>
                        </div>



                        <!-- Forgot Password Link -->
                        <div class="flex items-center justify-between mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary ms-3">
                                {{ __('Log in') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- //Login Form Section -->

    <!-- Footer -->
    @include('user.common.footer')
    <!-- //Footer -->

    <!-- Js Scripts -->
    <script src="{{asset('user/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('user/assets/js/theme-change.js')}}"></script>
    <!-- Template JavaScript -->
    <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>

</body>

</html>
