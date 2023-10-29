@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">About</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow shadow-lg">
                                <div class="card-body">
                                    <div class="logo_box">
                                        <img src="{{asset('storage/settings/logo-light.png')}}" alt="" height="60">
                                    </div>
                                    <div class="details_box" style="padding-top: 25px;padding-bottom: 25px;">
                                        <p>iCert Certification Services</p>
                                        <p>Order Processing Software</p>
                                    </div>
                                    <div class="details_box">
                                        <p>Copyright <script>document.write(new Date().getFullYear())</script> iCert Inc. All rights reserved</p>
                                        <div class="d-flex justify-content-between">
                                            <p>Version {{env('SOFTWARE_VERSION')}}</p>
                                            <a href="#">
                                                <img src="{{asset('storage/settings/up-right-box.png')}}" alt="" height="20">
                                            </a>
                                        </div>
                                    </div>
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
        .details_box p{
            color: #777;
            line-height: 0;
            margin-left: 5px;
            margin-bottom: 21px;
            font-size: 14px;
        }
    </style>
@endpush
