@extends('layouts.master')

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary-theme">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20 p-2">Reset Password</h5>
                                <a href="index.html" class="logo logo-admin">
                                    <img src="{{asset('admin/images/logo-light.png')}}" height="40" alt="ICert Certification Service">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class=" mt-4" method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
{{--                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email">--}}
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password">New Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
{{--                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">--}}
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        {{--                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">--}}
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary btn-primary-theme">
                                                {{ __('Reset Password') }}
                                            </button>
                                        </div>
                                    </div>

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
