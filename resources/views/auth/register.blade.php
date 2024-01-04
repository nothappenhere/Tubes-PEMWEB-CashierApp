<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin_assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    {{-- <link href="{{ asset('admin_assets/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" /> --}}
    <title>Register Form</title>
</head>

<body>
    <div class="wrapper">
        {{-- @if (Session::has('success'))
                <div class="alert alert-info alert-with-icon" data-notify="container">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                    <span data-notify="icon" class="tim-icons icon-bell-55"></span>
                    <span data-notify="message">{{ Session::get('success') }}</span>
                </div> --}}
        {{-- <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div> --}}
        {{-- @endif --}}
        <form action="{{ route('register.proses') }}" method="POST">
            @csrf
            <h1>Create account</h1>
            <div class="input-box">
                <input name="username" type="text" class="@error('username')is-invalid @enderror" placeholder="Username"
                    value="{{ old('username') }}">
                @error('username')
                    <span>{{ $message }}</span>
                @enderror
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input name="email" type="email" class="@error('email')is-invalid @enderror"
                    placeholder="Email Address" value="{{ old('email') }}">
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input name="password" type="password" class="@error('password')is-invalid @enderror"
                    placeholder="Password">
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
                <i class="bx bxs-lock-alt"></i>
            </div>
            <button type="submit" class="btn">Create Account</button>
            <div class="register-link">
                <p>Already have an account? <a href="{{ route('login') }}">Login!</a></p>
            </div>
        </form>
    </div>
</body>

</html>
