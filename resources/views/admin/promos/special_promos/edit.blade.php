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
                                                <input type="text" name="name" class="form-control" required="" placeholder="Name"
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
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Base Value <span class="error">*</span></label>
                                                <input type="number" name="value" class="form-control" required="" placeholder="Base Value"
                                                       value="{{$item->value, old('value') }}">
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
            dateFormat:'d-m-Y',
            onChange: function (selectedDates, dateStr, instance) {
                startDate = selectedDates;
                console.log(startDate)
                endDate.flatpickr({
                    enableTime: false,
                    minDate: new Date(selectedDates),
                    dateFormat:'d-m-Y',
                });
            },
        });

        endDate.flatpickr({
            enableTime: false,
            minDate: "today",
            dateFormat:'d-m-Y',
            onChange: function(selectedDates, dateStr, instance) {
                $("#no_end_date").addClass("disable_checkbox");
            },
        });

        $("#no_end_date").change(function() {
            if(this.checked) {
                $("#end_date").addClass("disable_checkbox");
                $("#end_date").val("31-12-2099");
                console.log('checked')
            }else {
                console.log('unchecked')
                $("#end_date").removeClass("disable_checkbox");
                $("#end_date").val("");
            }
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
    </style>
@endpush

