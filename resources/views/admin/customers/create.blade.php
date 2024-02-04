@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card-header mb-3 extra-header">
                <h4 class="card-title">Create Customer</h4>
{{--                <a href="{{route('admin.customers.index')}}" class="btn btn-sm btn-secondary text-capitalize" style="padding-top: 8px;"><i class="fa fa-times"></i> Cancel</a>--}}
            </div>
            <form>
                <customer-create-form :prop-from-blade="{{ json_encode($partOfPreviousUrl) }}"/>
            </form>
        </div>

    </div>
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

