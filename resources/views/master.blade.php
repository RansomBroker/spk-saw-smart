<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @include('includes.css')
</head>
<body id="page-top">

    <div id="wrapper">

        @if(!Route::is('user.login.view'))
            @include('includes.sidebar')
        @endif

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @if(!Route::is('user.login.view'))
                    @include('includes.navbar')
                @endif

                <div class="container-fluid @if(Route::is('user.login.view')) p-0 @endif">
                    @yield('content')
                </div>

            </div>

        </div>

    </div>

    @include('includes.js')
    @yield('custom-js')
</body>
</html>
