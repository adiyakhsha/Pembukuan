<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a href="{{ route('pemasukan.index') }}" class="navbar-brand">Pembukuan</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pemasukan.index') }}">Kas Masuk</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pengeluaran.index') }}">Kas Keluar</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transaksi.index') }}">Kas Utama</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('stok.index') }}">Stok Barang</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inventaris.index') }}">Inventaris</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('labarugi.index') }}">Laba Rugi</a>
                    </li>
                </ul>
            </div>

                <ul>
                    <li class="nav-item" >
                        <a class="btn btn-outline-primary" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
        </nav>
                    
        <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <h5 class="lead">@yield('title')</h5>
                    <hr>
                </div>
                @yield('tool')
            </div>
            @yield('content')
        </div>
    </body>

    @stack('js')
    <script type="text/javascript">
        function userChange(element) {
            document.location.href = '{{ url('user/change') }}/' + element.value;
        }
    </script>
</html>