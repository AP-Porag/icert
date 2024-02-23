@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Order Number : {{$item->entrySKU}}</h4>
                        <a href="{{route('admin.entries.index')}}" class="btn btn-sm btn-primary text-capitalize" style="padding-top: 8px;">Back to the list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">

{{--                <div class="col-md-6">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="">--}}
{{--                                <h5 class="card-title">Customer Info</h5>--}}
{{--                                <table class="table table-bordered mb-0">--}}

{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Key</th>--}}
{{--                                        <th>Value</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>Customer name</td>--}}
{{--                                        <td>Some Name</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Grading Location</td>--}}
{{--                                        <td>Some location</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Billing address line one</td>--}}
{{--                                        <td>Some address</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Billing address line two</td>--}}
{{--                                        <td>Some address</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Billing City</td>--}}
{{--                                        <td>Some city</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Billing Province</td>--}}
{{--                                        <td>Some province</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Billing Postal</td>--}}
{{--                                        <td>Some postal</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Billing Country</td>--}}
{{--                                        <td>Some country</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Billing Telephone</td>--}}
{{--                                        <td>Some Name</td>--}}
{{--                                    </tr>--}}


{{--                                    <tr>--}}
{{--                                        <td>Customer Name (If different)</td>--}}
{{--                                        <td>Some name</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Contact Name (If different)</td>--}}
{{--                                        <td>Some name</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Shipping address line one</td>--}}
{{--                                        <td>Some address</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Shipping address line two</td>--}}
{{--                                        <td>Some address</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Shipping City</td>--}}
{{--                                        <td>Some city</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Shipping Province</td>--}}
{{--                                        <td>Some province</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Shipping Postal</td>--}}
{{--                                        <td>Some postal</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Shipping Country</td>--}}
{{--                                        <td>Some country</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Shipping Telephone</td>--}}
{{--                                        <td>Some Name</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="">--}}
{{--                                <h5 class="card-title">Order Info</h5>--}}
{{--                                <div class="table-responsive">--}}
{{--                                    <table class="table table-bordered mb-0">--}}

{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>Key</th>--}}
{{--                                            <th>Value</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr>--}}
{{--                                            <td>Order number</td>--}}
{{--                                            <td>5666114448</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Submission Date</td>--}}
{{--                                            <td>some date</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Promo Code</td>--}}
{{--                                            <td>Attached Promo Code</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Payment Type</td>--}}
{{--                                            <td>COD/Payment Made/Payment on pickup</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Shopify Number</td>--}}
{{--                                            <td>5666114448</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Shipping Method</td>--}}
{{--                                            <td>UPS</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Customer Account</td>--}}
{{--                                            <td>Some account</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Customer Account number</td>--}}
{{--                                            <td>5666114448</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Order number</td>--}}
{{--                                            <td>5666114448</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Description #1 (Year,Manufacturer,Set,Other) </td>--}}
{{--                                            <td>some description</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Description #2 </td>--}}
{{--                                            <td>some description</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Description #3 </td>--}}
{{--                                            <td>some description</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Serial Number (Only if printed directly on item) </td>--}}
{{--                                            <td>some description</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Estimated Value </td>--}}
{{--                                            <td>some description</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Autographed</td>--}}
{{--                                            <td>Yes/No</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Authenticator Name</td>--}}
{{--                                            <td>Some name</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Authenticator Cert. No.</td>--}}
{{--                                            <td>Some no.</td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
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
                                                    <th>Item Type</th>
                                                    <th>Sub Type</th>
                                                    <th>Description</th>
                                                    <th>Autographed</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Card</td>
                                                    <td>N/A</td>
                                                    <td>
                                                        <p>Description One</p>
                                                        <p>Description two</p>
                                                        <p>Description three</p>
                                                    </td>
                                                    <td>Yes</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                            Multiple Qty
                                                        </button>
                                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
{{--                                                                    <div class="modal-header">--}}
{{--                                                                        <h5 class="modal-title" id="staticBackdropLabel">Multiple Qty--}}
{{--                                                                        </h5>--}}
{{--                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                                                                    </div>--}}
                                                                    <div class="modal-body mt-3">
                                                                        <div class="question-icon-box">
                                                                            <i class="fa fa-question" style="color: #3d7cb1;font-size: 32px;"></i>
                                                                        </div>
                                                                        <span class="question-text" style="font-size: 24px;">
                                                                            How much additional pieces of <br>
                                                                            this item do you want to add?
                                                                        </span>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <form action="">
                                                                            <div class="form-group mb-3">
                                                                                <input type="number" id="quantity-input-box" class="form-control" name="item_qty" style="width: 33%;margin: 0 auto;">
                                                                                <p class="quantity-warning-text text-danger" id="quantity-warning-text">Quantity is required</p>
                                                                                <input type="number" hidden="" class="form-control" name="entry_id" value="{{$item->id}}" style="width: 33%;margin: 0 auto;">
                                                                                <input type="number" hidden="" class="form-control" name="item_name" value="Card" style="width: 33%;margin: 0 auto;">
                                                                            </div>
                                                                            <button type="submit" id="submit_btn" class="btn btn-primary" style="margin-right: 15px;">Confirm</button>
                                                                            <button type="button" id="cancel_btn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
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
<style>
    .question-icon-box {
        border: 1px solid #3d7cb1;
        width: 54px;
        /* height: 50px; */
        margin: 0 auto;
        border-radius: 50%;
        padding: 10px;
        margin-bottom: 18px;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
    #quantity-warning-text{
        display: none;
    }
</style>
@endpush

@push('script')
    <script>
        $('#submit_btn').on('click', function () {
            if(!$('#quantity-input-box').val()){
                $(this).attr("type","button");
                $('#quantity-warning-text').show();
            }else {
                $('#quantity-warning-text').hide();
                $(this).attr("type","submit");
            }
        });

        $('#cancel_btn').on('click', function () {
            $('#quantity-warning-text').hide();
            $('#submit_btn').attr("type","submit");
            // if(!$('#quantity-input-box').val()){
            //     $(this).attr("type","button");
            //     $('#quantity-warning-text').show();
            // }else {
            //     $('#quantity-warning-text').hide();
            //     $(this).attr("type","submit");
            // }
        });
    </script>
@endpush
