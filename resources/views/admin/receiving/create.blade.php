@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between" style="padding-left: 30px;padding-right: 30px;">
                        <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>
                        <a href="{{route('admin.receiving.index')}}" class="btn btn-sm btn-warning text-capitalize" style="padding-top: 8px;">Cancel</a>
                    </div>

                    <create-entry :products="{{json_encode($products)}}" :customers="{{json_encode($allCustomers)}}" :promos="{{json_encode($allPromos)}}" :parties="{{json_encode($allThirdParties)}}" :authenticators="{{json_encode($allAuthenticators)}}"/>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')

@endpush

