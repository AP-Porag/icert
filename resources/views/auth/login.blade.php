@extends('layouts.master')

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary-theme">
                            <div class="text-primary text-center p-4">
{{--                                <h5 class="text-white font-size-20 p-2">Reset Password</h5>--}}
                                <h4 class="font-size-18 p-2 text-center text-white">Welcome Back !</h4>
                                <p class="text-muted text-center">Log in to continue.</p>
                                <a href="index.html" class="logo logo-admin">
                                    <img src="{{asset('admin/images/logo-light.png')}}" height="40" alt="ICert Certification Service">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
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
                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>Copyright <span class="text-warning">©</span> <span class="text-info"><script>document.write(new Date().getFullYear())</script></span> ICert Certification Services</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .main-content{
            margin-left: 0px!important;
        }
    </style>
@endpush
