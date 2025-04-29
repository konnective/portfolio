
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/toastify/toastify.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{asset('mazer/assets/css/bootstrap.css')}}>
    <link rel="stylesheet" href={{asset('mazer/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}>
    <link rel="stylesheet" href={{asset('mazer/assets/css/app.css')}}>
    <link rel="stylesheet" href={{asset('mazer/assets/css/pages/auth.css')}}>
</head>

<body>
    {{-- 
    
        <form id="" action="{{route('login_attempt')}}" method="POST">
            @csrf
            <h2>Sign in</h2>
            <div class="inputBox">
                <input type="text" name="email" required>
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required>
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">Forgot Password</a>
                <a href="{{route('register')}}">Register</a>
            </div>
            <input type="submit" id="submit" value="Login">
        </form>
    
    --}}
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        {{-- <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a> --}}
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form id="" action="{{route('login_attempt')}}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" name="email" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        {{-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> --}}
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="{{route('register')}}"
                                class="font-bold">Sign
                                up</a>.</p>
                        {{-- <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @include('admin.partials.flash-msg')
    <script src="{{ asset('mazer/assets/vendors/toastify/toastify.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/extensions/toastify.js') }}"></script>
</body>

</html>