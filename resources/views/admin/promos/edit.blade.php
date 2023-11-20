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
                                                <input type="date" name="start_date" class="form-control" required="" placeholder="Start Date"
                                                       value="{{$item->start_date, old('start_date') }}">
                                                @error('start_date')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">End Date <span class="error">*</span></label>
                                                <input type="date" name="end_date" class="form-control" required="" placeholder="End Date"
                                                       value="{{$item->end_date, old('end_date') }}">
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
                                                    />
                                                    <label class="form-label text-capitalize" style="margin-top: 6px;margin-left: 15px;">
                                                        Make this code have no end date
                                                    </label>
                                                </div>
                                            </div>

                                            {{--                                            <div class="col-md-6">--}}
                                            {{--                                                <div class="mb-3 d-flex justify-content-start w-100">--}}
                                            {{--                                                    <input--}}
                                            {{--                                                        type="checkbox"--}}
                                            {{--                                                        name="is_select_customer"--}}
                                            {{--                                                        class="form-check mr-3"--}}
                                            {{--                                                        id="is_select_customer"--}}
                                            {{--                                                    />--}}
                                            {{--                                                    <label class="form-label text-capitalize" style="margin-top: 6px;margin-left: 15px;">--}}
                                            {{--                                                        Is this code for select customer--}}
                                            {{--                                                    </label>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--                            <div class="col-md-12 hide-div" id="customer_id_box">--}}
                            {{--                                <div class="card shipping_address_card">--}}
                            {{--                                    <div class="card-body">--}}
                            {{--                                        <div class="row">--}}
                            {{--                                            <div class="mb-3 col-md-12">--}}
                            {{--                                                <label class="form-label">Select Customer <span class="error">*</span></label>--}}
                            {{--                                                <select class="select2 form-control" name="customer_id"--}}
                            {{--                                                        data-placeholder="Choose ..." id="customer_id">--}}
                            {{--                                                    @foreach($customers as $customer)--}}
                            {{--                                                        <option value="{{$customer->id}}" class="text-capitalize">{{$customer->name}}</option>--}}
                            {{--                                                    @endforeach--}}
                            {{--                                                </select>--}}
                            {{--                                                @error('customer_id')--}}
                            {{--                                                <p class="error">{{ $message }}</p>--}}
                            {{--                                                @enderror--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
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
@endpush

@push('style')
    <style>
        .shipping_address_card{
            background: #eeeeee;
        }
    </style>
@endpush

