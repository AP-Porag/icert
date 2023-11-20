@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

                    <edit-third-party-drop-off :third_party="{{json_encode($item)}}" :products="{{json_encode($products)}}"/>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')

@endpush
