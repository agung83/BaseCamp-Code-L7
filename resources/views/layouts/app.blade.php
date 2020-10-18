<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body style="background-color: #FFFFFF">

    <div id="app">
        @if (Auth::check() && Auth::user()->email_verified_at == null )

        <div class="alert alert-danger text-center mb-n2" role="alert">
            Silahkan Verivikasi Email Anda
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Verifikasi ulang') }}</button>.
            </form>
        </div>
        @endif
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('Silahkan Cek Email Anda') }}
        </div>
        @endif

        @include('layouts.components.navbar')


        @yield('content')

    </div>

    @include('layouts.components.footer')

    <script src="{{ asset('assets_admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
