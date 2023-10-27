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

    @if(Auth::check())
        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary"><i class="fa fa-plus" aria-hidden="true"></i> Edit Profil {{ Auth::user()->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.edit', Auth::user()->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nama <sup class="text-warning">*</sup></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="ex: Andi" required value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email <sup class="text-warning">*</sup></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="andi@mail.com" required value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="role" class="form-label">Role <sup class="text-warning">*</sup></label>
                                <input type="text" class="form-control" readonly value="@if(Auth::user()->role == 1) Admin @else User @endif">
                                <input type="hidden" name="role" value="{{ Auth::user()->role }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password <sup class="text-warning">*</sup></label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Tambah Data User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @include('includes.js')
    @yield('custom-js')
</body>
</html>
