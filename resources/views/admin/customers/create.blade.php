@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

                    <form>
                        <customer-create-form/>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('style')
    <style>
        .shipping_address_card{
            background: #eeeeee;
        }
    </style>
@endpush
@push('script')
@endpush

