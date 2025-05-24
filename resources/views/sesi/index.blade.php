<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="card">
                <div class="card-header text-center">Login Admin</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('sesi.login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button class="btn btn-primary btn-block mt-3" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
