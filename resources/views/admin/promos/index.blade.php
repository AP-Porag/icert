@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Promo Codes</h4>
                        <div class="d-flex justify-content-between">
                            <a href="{{route('admin.promos.create')}}" class="btn btn-sm btn-primary text-capitalize" style="padding-top: 8px;margin-right: 15px;">Create New Promo Code</a>
                            <a href="{{route('admin.slpromos.create')}}" class="btn btn-sm btn-primary text-capitalize" style="padding-top: 8px;">Create New Special Promo Code</a>
                        </div>
                    </div>
                    {!! $dataTable->table(['class'=>'table-responsive']) !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    @include('includes.styles.datatable')
@endpush

@push('script')
    @include('includes.scripts.datatable')
@endpush
