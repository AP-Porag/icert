@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

                    <form action="{{ route('admin.promos.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shipping_address_card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Name <span class="error">*</span></label>
                                                <input type="text" readonly name="name" id="promo_name" class="form-control md-readonly" required="" placeholder="Name"
                                                       value="{{ $item->name,old('name') }}">
                                                @error('name')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card shipping_address_card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6 input-icon">
                                                <label class="form-label">Base Value <span class="error">*</span></label>
                                                <input type="number" name="value" class="form-control" required="" placeholder="Base Value"
                                                       value="{{$item->value, old('value') }}">
                                                <i>$</i>
                                                @error('value')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Number of items <span class="error">*</span></label>
                                                <input type="number" name="number_of_items" class="form-control" required="" placeholder="Number of items"
                                                       value="{{ $item->number_of_items,old('number_of_items') }}">
                                                @error('number_of_items')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Start Date <span class="error">*</span></label>
                                                <input type="date" name="start_date" class="form-control datepicker-start-date" required="" placeholder="Start Date"
                                                       value="{{custom_date($item->start_date,'Y-m-d'), old('start_date') }}">
                                                @error('start_date')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">End Date <span class="error">*</span></label>
                                                <input type="date" name="end_date" id="end_date" class="form-control datepicker-end-date" required="" placeholder="End Date"
                                                       value="{{custom_date($item->end_date,'Y-m-d'), old('end_date') }}">
                                                @error('end_date')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex justify-content-start w-100">
                                                    <input
                                                        type="checkbox"
                                                        name="no_end_date"
                                                        class="form-check mr-3"
                                                        id="no_end_date"
                                                    />
                                                    <label class="form-label text-capitalize" style="margin-top: 6px;margin-left: 15px;">
                                                        Make this code have no end date
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" id="customer_id_box">
                                <div class="card shipping_address_card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-8">
                                                <label class="form-label">Select Customer <span class="error">*</span></label>
                                                <select class="select2 form-control" multiple name="customers[]"
                                                        data-placeholder="Choose ..." id="customers">
                                                    @foreach($customers as $customer)
                                                        <option value="{{$customer->id}}" @if($item->customers->count() > 0 ) @foreach($item->customers as $cm) @if($cm->customer_id == $customer->id) selected @endif @endforeach   @endif class="text-capitalize">{{$customer->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('customer_id')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <a class="btn btn-info waves-effect" id="add_new_customer_button" style="margin-top: 28px;" href="{{route('admin.customers.create')}}">Add New Customer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 offset-md-6 col-md-6">
                                <div class="text-end">
                                    <button class="btn btn-primary waves-effect waves-lightml-2 me-2" type="submit">
                                        <i class="fa fa-save"></i> Save
                                    </button>

                                    <a class="btn btn-secondary waves-effect" href="{{ route('admin.promos.index') }}">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        let startDate = $('.datepicker-start-date');
        let endDate = $('.datepicker-end-date');

        startDate.flatpickr({
            enableTime: false,
            minDate: "today",
            dateFormat:'Y-m-d',
            onChange: function (selectedDates, dateStr, instance) {
                startDate = selectedDates;
                console.log(startDate)
                endDate.flatpickr({
                    enableTime: false,
                    minDate: new Date(selectedDates),
                    dateFormat:'Y-m-d',
                });
            },
        });

        endDate.flatpickr({
            enableTime: false,
            minDate: "today",
            dateFormat:'Y-m-d',
            onChange: function(selectedDates, dateStr, instance) {
                $("#no_end_date").addClass("disable_checkbox");
            },
        });

        $("#no_end_date").change(function() {
            if(this.checked) {
                $("#end_date").addClass("disable_checkbox");
                $("#end_date").val("2099-12-31");
                console.log('checked')
            }else {
                console.log('unchecked')
                $("#end_date").removeClass("disable_checkbox");
                $("#end_date").val("");
            }
        });

        $(document).ready(function(){
            if($('#promo_name').val().length >= 5) {
                $("#add_new_customer_button").removeClass("disable-click");
            } else{
                $("#add_new_customer_button").addClass("disable-click");
            }
            // $("#add_new_customer_button").addClass("disable-click");
            $('#promo_name').on('keyup',function(e) {
                if (e.which === 32) {
                    $('#error_msg_name').append('No spaces are allowed!').show();
                }else {
                    $('#error_msg_name').append('').hide();
                    if($(this).val().length >= 5) {
                        $("#add_new_customer_button").removeClass("disable-click");
                    } else{
                        $("#add_new_customer_button").addClass("disable-click");
                    }
                }

            });
        });
    </script>
@endpush

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <style>
        .shipping_address_card{
            background: #eeeeee;
        }
        .disable-click{
            pointer-events:none;
            background: #cfcfcf;
            border: 1px solid #cfcfcf;
        }
    </style>
@endpush

