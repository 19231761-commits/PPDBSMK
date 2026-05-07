<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Login - PPDB SMK Sehati Karawang</title>
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/dist/css/custom-dashboard.css') }}" rel="stylesheet">
</head>
<body class="auth-page">
    <div class="auth-wrap">
        <div class="auth-left">
            <div class="auth-hero">
                <h1>PPDB SMK Sehati</h1>
                <p>Dashboard pendaftar & admin yang cepat dan rapi.</p>
            </div>
        </div>
        <div class="auth-right">
            <div class="auth-card">
                <h3 class="mb-3">Masuk ke akun Anda</h3>
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{ route('backend.v_login.login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required class="form-control">
                        <button type="button" class="show-pass" onclick="togglePass()"><i class="mdi mdi-eye-outline"></i></button>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="#" class="small">Lupa password?</a>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg" type="submit">Masuk</button>
                </form>
            </div>
        </div>
    </div>

<script>
    function togglePass(){
        var p = document.getElementById('password');
        if(p.type === 'password') p.type = 'text'; else p.type = 'password';
    }
</script>
</body>
</html>