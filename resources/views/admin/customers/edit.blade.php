@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card-header mb-3 extra-header">
                <h4 class="card-title">Edit Customer</h4>
            </div>
            <form>
                <customer-edit-form :item="{{json_encode($item)}}"/>
            </form>
        </div>

    </div>


{{--    <div class="row">--}}
{{--        <div class="col-md-9">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>--}}

{{--                    <form>--}}
{{--                        <customer-edit-form :item="{{json_encode($item)}}"/>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
@endsection

@push('style')
    <style>
        .shipping_address_card{
            background: #eeeeee;
        }
        .extra-header{
            margin-left: 1px;
            font-size: 18px;
            width: 100%;
            background: white;
            padding: 15px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
        }
    </style>
@endpush
@push('script')
@endpush

