@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

                    <form action="{{ route('admin.slpromos.store') }}" id="form-data" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shipping_address_card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Name <span class="error">*</span></label>
                                                <input type="text" name="name" class="form-control" required="" placeholder="Name"
                                                       value="{{ old('name') }}">
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
                                                       value="{{ old('value') }}">
                                                @error('value')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Number of items <span class="error">*</span></label>
                                                <input type="number" name="number_of_items" class="form-control" required="" placeholder="Number of items"
                                                       value="{{ old('number_of_items') }}">
                                                @error('number_of_items')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Start Date <span class="error">*</span></label>
                                                <input type="date" name="start_date" class="form-control datepicker-start-date" required="" placeholder="Start Date"
                                                       value="{{ old('start_date') }}">
                                                @error('start_date')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">End Date <span class="error">*</span></label>
                                                <input type="date" name="end_date" id="end_date" class="form-control datepicker-end-date" required="" placeholder="End Date"
                                                       value="{{ old('end_date') }}">
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
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Select Customer <span class="error">*</span></label>
                                                <select class="select2 form-control" multiple name="customers[]"
                                                        data-placeholder="Choose ..." id="customers">
                                                    @foreach($customers as $customer)
                                                        <option value="{{$customer->id}}" class="text-capitalize">{{$customer->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('customer_id')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 offset-md-6 col-md-6">
                                <div class="text-end">
{{--                                    <button class="btn btn-primary waves-effect waves-lightml-2 me-2" type="submit">--}}
{{--                                        <i class="fa fa-save"></i> Save--}}
{{--                                    </button>--}}

                                    <button id="saveButton" class="btn btn-primary waves-effect waves-lightml-2 me-2" type="submit">
                                        <i class="fa fa-save"></i> Save
                                    </button>

                                    <a class="btn btn-secondary waves-effect" href="{{ route('admin.slpromos.index') }}">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="icon_div">
                                <div class="icon_div_inner text-center align-center">
                                    <i class="fa fa-question-circle text-warning text-center question_icon"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="question_text">Are you sure this code is for select customers?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="confirmBtn" class="btn btn-primary waves-effect" data-dismiss="modal">Yes</button>
                            <button type="button" id="closeBtn" class="btn btn-warning waves-effect" data-dismiss="modal">No</button>
                            <a class="btn btn-secondary waves-effect" href="{{ route('admin.slpromos.index') }}">
                                <i class="fa fa-times"></i> Cancel
                            </a>
                        </div>
                    </div>

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

        $("#saveButton").click(function(e){
            e.preventDefault();
            $("#myModal").modal("toggle");
        });

        $("#closeBtn").click(function(e){
            e.preventDefault();
            $("#myModal").modal("toggle");
        });

        $("#confirmBtn").click(function(e){
            e.preventDefault();
            var data = $('#form-data').serialize();
            $.ajax({
                type: 'post',
                url: "{{ route('admin.slpromos.store') }}",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // beforeSend: function(){
                //     $('#create_new').html('....Please wait');
                // },
                success: function(response){
                    if (response.status == 200){
                        $("#myModal").modal("toggle");
                        window.location.assign('{{ route('admin.slpromos.index') }}')
                    }
                    // alert(response.success);
                },
                // complete: function(response){
                //     $('#create_new').html('Create New');
                // }
            });
        });
    </script>
@endpush

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <style>
        .icon_div{
            margin-top: 30px;
        }
        .icon_div_inner{
            height: 70px;
            width: 70px;
            border: 1px solid #d0d0d0;
            border-radius: 50px;
            margin: 0 auto;
        }
        .question_icon{
            font-size: 60px;
            margin-top: 4px;
        }
        .question_text{
            font-size: 24px;
            margin-top: 30px;
        }
        .disable_checkbox{
            pointer-events: none;
            background: #d0d0d0 !important;
        }
        .shipping_address_card{
            background: #eeeeee;
        }

        .hide-div{
            display: none;
        }
        .show-div{
            display: block;
        }

        .input-icon {
            position: relative;
        }

        .input-icon > i {
            position: absolute;
            display: block;
            transform: translate(0, -50%);
            top: 72%;
            pointer-events: none;
            width: 25px;
            text-align: center;
            font-style: normal;
        }

        .input-icon > input {
            padding-left: 25px;
            padding-right: 0;
        }
    </style>
@endpush

