@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

                    <form action="{{route('admin.slpromos.saveAditionalCustomer')}}" method="POST">
                        @method('post')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shipping_address_card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Name</label>
                                                <input type="text" readonly name="name" class="form-control md-readonly cursor-pointer" required="" placeholder="Name"
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
                                                <label class="form-label">Base Value</label>
                                                <input type="text" readonly name="value" class="form-control md-readonly cursor-pointer" required="" placeholder="Base Value"
                                                       value="{{$item->value, old('value') }}">
                                                <i>$</i>
                                                @error('value')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Number of items</label>
                                                <input type="text" readonly name="number_of_items" class="form-control md-readonly cursor-pointer" required="" placeholder="Number of items"
                                                       value="{{ $item->number_of_items,old('number_of_items') }}">
                                                @error('number_of_items')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Start Date</label>
                                                <input type="text" name="start_date" readonly class="form-control md-readonly cursor-pointer" required="" placeholder="Start Date"
                                                       value="{{custom_date($item->start_date,'Y-m-d'), old('start_date') }}">
                                                @error('start_date')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">End Date</label>
                                                <input type="text" name="end_date" id="end_date" readonly class="form-control md-readonly cursor-pointer" required="" placeholder="End Date"
                                                       value="{{custom_date($item->end_date,'Y-m-d'), old('end_date') }}">
                                                @error('end_date')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
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
                                                <label class="form-label">Customers</label> <br>
                                                    @foreach($item->customers as $customer)
                                                        <span class="badge badge-soft-blue-grey product_badge p-1 mb-3" style="margin-right: 5px; border-radius: 4px;">{{$customer->customer->name}}</span>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card shipping_address_card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-8">
                                                <label class="form-label">Select Customer <span class="error">*</span></label>
                                                <input type="text" readonly name="promo_id" class="form-control" hidden="hidden" value="{{$item->id}}">
                                                <select class="select2 form-control" multiple name="customers[]"
                                                        data-placeholder="Choose ..." id="customers">
                                                    @foreach($customers as $customer)
                                                        <option value="{{$customer->id}}" class="text-capitalize">{{$customer->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('customer_id')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                                <p class="error" id="error_msg_customers" style="display:none;"></p><br>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <a class="btn btn-info waves-effect" style="margin-top: 28px;" href="{{route('admin.customers.create')}}">Add New Customer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3 offset-md-6 col-md-6">
                                    <div class="text-end">
                                        <button class="btn btn-primary waves-effect waves-lightml-2 me-2">
                                            <i class="fa fa-save"></i> Save
                                        </button>

                                        <a class="btn btn-secondary waves-effect" href="{{route('admin.promos.index')}}">
                                            <i class="fa fa-times"></i> Back
                                        </a>
                                    </div>
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

@endpush

