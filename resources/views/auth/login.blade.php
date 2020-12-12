<html>
    <head>
        <title>Login</title>

        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

        <style type="text/css">
            html {
                height: 100vh;
            }
        </style>
    </head>

    <body class="h-100">
        <div class="row h-100 m-0 align-items-center justify-content-center">
            <div class="col-3">
                <h4 class="text-center">Pembukuan</h4>
                <form class="border p-4" action="{{ route('postLogin') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    @if (session()->has('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group clearfix">
                        <button type="submit" class="btn btn-primary float-right">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>