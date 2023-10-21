@extends('layouts.master')

@section('content')
    <div class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('admin/images/bg.png');background-size: cover;background-position: center;">
            <div class="overlay_container"></div>
        </div>

        <div class="wrapper-page account-page-full">

            <div class="card shadow-none">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box shadow-none p-4">
                            <div class="p-2">
                                <div class="text-center mt-4">
                                    <img src="admin/images/logo-sm.png" height="100" alt="logo">
                                </div>

                                <h4 class="font-size-18 mt-5 text-center">Welcome Back !</h4>
                                <p class="text-muted text-center">Sign in to continue.</p>

                                <form method="POST" action="{{ route('login') }}">

                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Email</label>
{{--                                        <input type="text" class="form-control" id="username" placeholder="Enter email">--}}

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
{{--                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">--}}
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
{{--                                                <input type="checkbox" class="form-check-input" id="customControlInline">--}}
{{--                                                <label class="form-check-label" for="customControlInline">Remember me</label>--}}

                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check text-end">
                                                <a href="{{route('password.request')}}"><i class="mdi mdi-lock"></i> Forgot Password</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 text-end mt-5">
                                            <button class="btn btn-primary w-md waves-effect waves-light btn-primary-theme" type="submit">Log In</button>
                                        </div>
                                    </div>

{{--                                    <div class="mb-3 mt-2 mb-0 row">--}}
{{--                                        <div class="col-12 mt-3">--}}
{{--                                            <a href="pages-recoverpw-2.html"><i class="mdi mdi-lock"></i> Forgot your password?</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                </form>

                                <div class="mt-5 pt-4 text-center">
{{--                                    <p>Don't have an account ? <a href="pages-register-2.html" class="fw-medium text-primary"> Signup now </a> </p>--}}
                                    <p>Copyright <span class="text-warning">©</span> <span class="text-info"><script>document.write(new Date().getFullYear())</script></span> ICert Certification Services</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
@push('style')
    <style>
        .overlay_container{
            width: 100%;
            height: 100%;
            background: #000000;
            opacity: 0.6;
        }
    </style>
@endpush
