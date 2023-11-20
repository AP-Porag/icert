@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

                    <create-third-party-drop-off :products="{{json_encode($products)}}"/>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')

@endpush

