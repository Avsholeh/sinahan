<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name') }} - Ganti Password</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}
</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-10">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Logo -->
                            <div
                                    class="sidebar-brand d-flex align-items-center justify-content-center flex-column py-3">
                                <div class="rounded">
                                    <img src="{{ asset('img/logo.png') }}" width="150">
                                </div>
                            </div>
                            <!-- END Logo -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="px-5 mb-4">
                                <hr>
                                <div class="text-center">
                                    <h2 class="h3 text-black-700 mb-2">{{ strtoupper(config('app.name')) }}</h2>
                                    <h4 class="h5 text-gray-700 mb-4">Sistem Informasi Layanan Tahanan</h4>
                                </div>
                                <hr>

                                @if(session('status'))
                                    <div class="alert alert-danger">{{ session('status') }}</div>
                                @endif

                                <form class="user" action="{{ route('password.update') }}" method="post">

                                    @csrf

                                    {{-- Token --}}
                                    <input type="text" name="token" value="{{ request()->route('token') }}" hidden>

                                    {{-- Email --}}
                                    <div class="form-group">
                                        <label class="control-label" for="email">Email</label>
                                        <input name="email" type="text" class="form-control"
                                               value="@if(old('email')) {{ old('email') }} @endif" id="email">

                                        @error('email')
                                        <small id="email_help" class="form-text text-danger">
                                            <i class="fa fa-info-circle"></i> {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                    {{-- Password --}}
                                    <div class="form-group">
                                        <label class="control-label" for="password_help">Password</label>
                                        <input name="password" type="password" class="form-control"
                                               value="@if(old('password')) {{ old('password') }} @endif"
                                               id="password" aria-describedby="password_help">

                                        @error('password')
                                        <small id="password_help" class="form-text text-danger">
                                            <i class="fa fa-info-circle"></i> {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                    {{-- Konfirmasi Password --}}
                                    <div class="form-group">
                                        <label class="control-label" for="password_confirmation_help">Konfirmasi
                                            Password</label>
                                        <input name="password_confirmation" type="password" class="form-control"
                                               aria-describedby="password_confirmation_help" id="password_confirmation">

                                        @error('password_confirmation')
                                        <small id="password_confirmation_help" class="form-text text-danger">
                                            <i class="fa fa-info-circle"></i> {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                    <input type="submit" class="btn btn-primary btn-block" value="Ganti Password">

                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>

</body>
</html>
