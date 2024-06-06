@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between" style="padding-left: 30px;">
                        <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>
                        <a href="{{route('admin.receiving.index')}}" class="btn btn-sm btn-warning text-capitalize" style="padding-top: 8px;">Cancel</a>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-md-10">
            <create-receiving :authenticators="{{json_encode($allAuthenticators)}}" :entr="{{json_encode($entry)}}"/>
        </div>
    </div>
@endsection

@push('script')

@endpush

