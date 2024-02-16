@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Order Number : {{$item->entrySKU}}</h4>
                        <a href="{{route('admin.entries.index')}}" class="btn btn-sm btn-primary text-capitalize" style="padding-top: 8px;">Back to list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <h5 class="card-title">Customer Info</h5>
                                <table class="table table-bordered mb-0">

                                    <thead>
                                    <tr>
                                        <th>Key</th>
                                        <th>Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Customer name</td>
                                        <td>Some Name</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <h5 class="card-title">Order Info</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>
                                            <th>Key</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Order number</td>
                                            <td>5666114448</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <h5 class="card-title">Order Item</h5>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered mb-0">

                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Date</td>
                                                    <td>Card</td>
                                                    <td>48</td>
                                                    <td>
                                                        modal button
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
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

@endpush

@push('script')
    <script>

    </script>
@endpush
