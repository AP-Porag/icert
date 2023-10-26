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
                                <form class=" mt-4" action="{{ route('password.update') }}">

                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">New Password</label>
                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
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
