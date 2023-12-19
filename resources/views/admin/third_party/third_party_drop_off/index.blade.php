@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Name of TPDOC</h4>
                        <a href="{{route('admin.thirds.create')}}" class="btn btn-sm btn-primary text-capitalize" style="padding-top: 8px;">Create New Drop Off Center</a>
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

    <script>

    </script>
@endpush
