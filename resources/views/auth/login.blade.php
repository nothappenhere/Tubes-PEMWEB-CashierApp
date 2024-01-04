<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}" />
    <title>Login Form</title>
</head>

<body>
    <div class="wrapper">
        <form action="{{ route('login.proses') }}" method="POST">
            @csrf
            <h1>Log in</h1>
            <div class="input-box">
                <input name="username" type="text" placeholder="Username" value="{{ old('username') }}" autofocus>
                @error('username')
                    <span>{{ $message }}</span>
                @enderror
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input name="password" type="password" placeholder="Password">
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
                <i class="bx bxs-lock-alt"></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="{{ route('register') }}">Register!</a></p>
            </div>
        </form>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if ($message = Session::get('failed'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ $message }}"
        });
    </script>
@endif
@if ($message = Session::get('success_register'))
    <script>
        Swal.fire("{{ $message }}");
    </script>
@endif
@if ($message = Session::get('success_logout'))
    <script>
        Swal.fire({
            icon: "success",
            title: "{{ $message }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

</html>
