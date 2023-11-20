
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="images/logo.png" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('admin_light/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_light/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_light/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('admin_light/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin_light/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin_light/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_light/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_light/assets/css/icons.css') }}" rel="stylesheet">
    <title>Luckys - LogIn</title>
</head>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- <x-authentication-card-logo /> -->
            <div class="col mx-auto">
                <div class=" text-center">
                    
                </div>
            </div>
        </x-slot>


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif


        <div class="border p-4 rounded">

            <div class="text-center">
                <img src="{{ asset('images/headerlogomx.gif') }}" width="180" alt="" class="col mx-auto" />
                <h3 class="display-6 fw-bold">Login</h3>
                <p class="pt-2" style="font-size: medium;">Don't have an account yet? <a href="{{ route('register') }}"><u>Register here</u></a>
                </p>
            </div>
            <div class="d-grid">
                <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                    <img class="me-2" src="{{ asset('admin_light/assets/images/icons/search.svg') }}" width="16" alt="Image Description">
                    <span>Sign in with Google</span>
                    </span>
                </a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Sign in with Facebook</a>
            </div>
            <div class="login-separater text-center mb-4 py-3"> <span>OR SIGN IN WITH EMAIL</span>
                <hr/>
            </div>




        <x-validation-errors class="mb-4" />


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>


    </div>

    </x-authentication-card>
</x-guest-layout>


<!-- Bootstrap JS -->
    <script src="{{ asset('admin_light/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('admin_light/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_light/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin_light/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin_light/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--Password show & hide js -->
    <!--app JS-->
    <script src="{{ asset('admin_light/assets/js/app.js') }}"></script>