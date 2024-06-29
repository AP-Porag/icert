@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row show" id="box-for-search">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <input type="text" class="form-control" placeholder="Search with order ID" id="search-input">
                                <button class="btn btn-sm btn-primary d-flex justify-content-between" id="searchBtn">
                                    <i class="fa fa-search text-white" style="margin-top: 6px; margin-right: 9px;"></i>
                                    <span style="margin-top: 2px; font-size: 14px;">Search</span>
                                </button>
                            </div>
                            <p class="hide text-warning" id="if-nothing-in-input">Please enter Order ID</p>
                        </div>
                    </div>
                    <div class="row hide mt-3" id="result-if-nothing-or-error">
                        <div class="col-md-12">
                            <div class="result-if-nothing-or-error d-flex justify-content-between">
                                <div class="text-warning" id="error-text">No Data Found in this order ID</div>
                                <button class="btn btn-secondary btn-sm reset">Reset</button>
                            </div>
                        </div>
                    </div>
                    <div class="row hide" id="result-if-success">
                        <div class="col-md-12">
                            <div class="result-if-success w-100">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <h6>Order details</h6>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a href="#" id="create-receiving-btn" class="btn btn-primary-theme btn-sm text-white" style="margin-right: 15px;">Create receiving against this order</a>
                                        <button class="btn btn-secondary btn-sm reset">Reset</button>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <table class="table">
                                        <thead class="thead-light" style="background-color: #eff2f7;">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Contact Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row" id="entryId">IC2420005</th>
                                            <td id="customerName">Mark</td>
                                            <td id="customerEmail">Otto@gmail.com</td>
                                            <td id="customerContactName">mdo</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Receiving</h4>
{{--                        <a href="{{route('admin.entries.create')}}" class="btn btn-sm btn-primary text-capitalize" style="padding-top: 8px;">Create New Entry</a>--}}
                    </div>
                    {!! $dataTable->table(['class'=>'table-responsive']) !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    @include('includes.styles.datatable')
    <style>
        .show{
            display: block;
        }
        .hide{
            display: none;
        }
    </style>
@endpush

@push('script')
    @include('includes.scripts.datatable')

    <script>
        let boxForSearch = $('#box-for-search');
        let resultBoxIfNothingOrError = $('#result-if-nothing-or-error');
        let resultBoxIfSuccess = $('#result-if-success');
        let createReceivingButton = $('#create-receiving-btn');
        let ifNothingInInput = $('#if-nothing-in-input');
        let errorText = $('#error-text');
        let entrySKU = $('#entryId');
        let customerName = $('#customerName');
        let customerEmail = $('#customerEmail');
        let customerContactName = $('#customerContactName');

        $(document).ready(function(){
            // boxForSearch.removeClass('show').addClass('hide')
            // resultBoxIfSuccess.removeClass('hide').addClass('show')
            // resultBoxIfNothingOrError.removeClass('hide').addClass('show')
            // console.log('fine')
        });

        $("#searchBtn").click(function () {
            const inputString = $("#search-input").val();
            if(!inputString){
                ifNothingInInput.removeClass('hide').addClass('show')
            }else{
                ifNothingInInput.removeClass('show').addClass('hide')
                $.ajax({
                    url: '{{ route("admin.receiving.getOrderInfo",) }}',
                    type: 'POST',
                    data: {
                        id: inputString,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 200){
                            let entrySku = response.data.entrySKU;
                            let entryCustomerName = response.data.customer.name;
                            let entryCustomerEmail = response.data.customer.email;
                            let entryCustomerContactName = response.data.customer.contact_name;
                            let route = 'receiving/get-order/info/'+response.data.id

                            entrySKU.text(entrySku)
                            customerName.text(entryCustomerName)
                            customerEmail.text(entryCustomerEmail)
                            customerContactName.text(entryCustomerContactName)
                            createReceivingButton.attr('href', route);
                            boxForSearch.removeClass('show').addClass('hide')
                            resultBoxIfSuccess.removeClass('hide').addClass('show')
                        }else if(response.status == 202){
                            resultBoxIfNothingOrError.removeClass('hide').addClass('show')
                            errorText.text('Already Received')
                        }else {
                            resultBoxIfNothingOrError.removeClass('hide').addClass('show')
                            errorText.text('No data found')
                        }
                    },
                    error: function(xhr, status, error) {
                        // alert('Error: ' + error);
                        console.log('Error: '+ error)
                    }
                });
            }
        });

        $(".reset").click(function () {
            $("#search-input").val('')
            createReceivingButton.attr('href', '#');
            boxForSearch.removeClass('hide').addClass('show')
            resultBoxIfSuccess.removeClass('show').addClass('hide')
            resultBoxIfNothingOrError.removeClass('show').addClass('hide')
        });

    </script>
@endpush
