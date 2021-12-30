<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset("assets/login/images/icons/favicon.ico") }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/bootstrap/css/bootstrap.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/animate/animate.css") }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/css-hamburgers/hamburgers.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/animsition/css/animsition.min.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/select2/select2.min.css") }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/daterangepicker/daterangepicker.css") }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset("assets/login/css/util.css") }}">
	<link rel="stylesheet" type="text/css" href="{{asset("assets/login/css/main.css") }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url({{asset("assets/login/images/bg-01.jpg")}});">
					<span class="login100-form-title-1">
						Register
					</span>
                </div>
                
                <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
            @csrf

            <!-- Name -->
            <div class="wrap-input100 validate-input m-b-26">
                <x-label class="label-input100" for="name" :value="__('Name')" />

                <x-input id="name" class="input100" type="text" name="name" :value="old('name')" required autofocus />
                <span class="focus-input100"></span>
            </div>

            <!-- Email Address -->
            <div class="wrap-input100 validate-input m-b-26">
                <x-label class="label-input100" for="email" :value="__('Email')" />

                <x-input id="email" class="input100" type="email" name="email" :value="old('email')" required />
                <span class="focus-input100"></span>
            </div>

            <!-- Password -->
            <div class="wrap-input100 validate-input m-b-26">
                <x-label class="label-input100" for="password" :value="__('Password')" />

                <x-input id="password" class="input100"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <span class="focus-input100"></span>
            </div>

            <!-- Confirm Password -->
            <div class="wrap-input100 validate-input m-b-26">
                <x-label class="label-input100" for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="input100"
                                type="password"
                                name="password_confirmation" required />
                <span class="focus-input100"></span>
            </div>
            
            <div class="flex-sb-m w-full p-b-30">
                
                <div class="container-login100-form-btn">
                    <x-button class="login100-form-btn">
                        {{ __('Register') }}
                    </x-button>
                </div>
                <div>
                    
                    <a class="txt1" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
            
                </div>
            </div>

        </form>


	</div>
</div>
</div>


<!--===============================================================================================-->
<script src="{{asset("assets/login/vendor/jquery/jquery-3.2.1.min.js") }}"></script>
<!--===============================================================================================-->
<script src="{{asset("assets/login/vendor/animsition/js/animsition.min.js") }}"></script>
<!--===============================================================================================-->
<script src="{{asset("assets/login/vendor/bootstrap/js/popper.js") }}"></script>
<script src="{{asset("assets/login/vendor/bootstrap/js/bootstrap.min.js") }}"></script>
<!--===============================================================================================-->
<script src="{{asset("assets/login/vendor/select2/select2.min.js") }}"></script>
<!--===============================================================================================-->
<script src="{{asset("assets/login/vendor/daterangepicker/moment.min.js") }}"></script>
<script src="{{asset("assets/login/vendor/daterangepicker/daterangepicker.js") }}"></script>
<!--===============================================================================================-->
<script src="{{asset("assets/login/vendor/countdowntime/countdowntime.js") }}"></script>
<!--===============================================================================================-->
<script src="{{asset("assets/login/js/main.js") }}"></script>

</body>
</html>
