@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

{{--                    <form action="{{ route('admin.authenticators.store') }}" method="post" enctype="multipart/form-data">--}}
{{--                        @csrf--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="card shipping_address_card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="mb-3 col-md-6">--}}
{{--                                                <label class="form-label">Name <span class="error">*</span></label>--}}
{{--                                                <input type="text" name="name" class="form-control" required="" placeholder="Name"--}}
{{--                                                       value="{{ old('name') }}">--}}
{{--                                                @error('name')--}}
{{--                                                <p class="error">{{ $message }}</p>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-12">--}}
{{--                                <div class="card shipping_address_card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="mb-3 col-md-6">--}}
{{--                                                <label class="form-label mb-2 w-100">Status <span class="error">*</span></label>--}}
{{--                                                <div class="form-check form-check-inline">--}}
{{--                                                    <input type="radio" id="status_yes" value="{{ \App\Models\Authenticator::STATUS_ACTIVE }}"--}}
{{--                                                           name="status" class="form-check-input" checked="">--}}
{{--                                                    <label class="custom-control-label" for="status_yes">{{ \App\Models\Authenticator::STATUS_ACTIVE }}</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-check form-check-inline">--}}
{{--                                                    <input type="radio" id="status_no" value="{{ \App\Models\Authenticator::STATUS_SUSPEND }}"--}}
{{--                                                           name="status" class="form-check-input">--}}
{{--                                                    <label class="custom-control-label" for="status_no">{{ \App\Models\Authenticator::STATUS_SUSPEND }}</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-check form-check-inline">--}}
{{--                                                    <input type="radio" id="status_no" value="{{ \App\Models\Authenticator::STATUS_DELETE }}"--}}
{{--                                                           name="status" class="form-check-input">--}}
{{--                                                    <label class="custom-control-label" for="status_no">{{ \App\Models\Authenticator::STATUS_DELETE }}</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-12">--}}
{{--                                <div class="card shipping_address_card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <p class="font-size-18 mb-3">Check only the products that can be certified by this 3rd party authenticator</p>--}}
{{--                                        <div class="row">--}}
{{--                                            <span class="input-group-addon"><input type="checkbox" class="checkbox_selector"  data-role="products[]" /> <label class="form-label text-capitalize" style="margin-top: 6px;margin-left: 15px;">Select All </label></span>--}}
{{--                                            @foreach($products as $product)--}}
{{--                                                <div class="col-md-3">--}}
{{--                                                    <div class="mb-3 d-flex justify-content-start w-100">--}}
{{--                                                        <input--}}
{{--                                                            type="checkbox"--}}
{{--                                                            name="products[]"--}}
{{--                                                            class="form-check mr-3 product_checkItem"--}}
{{--                                                            value="{{$product->id}}"--}}
{{--                                                        />--}}
{{--                                                        <label class="form-label text-capitalize" style="margin-top: 6px;margin-left: 15px;">--}}
{{--                                                            {{$product->name}}--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
{{--                                                @error('products')--}}
{{--                                                <p class="error">{{ $message }}</p>--}}
{{--                                                @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row">--}}
{{--                            <div class="mb-3 offset-md-6 col-md-6">--}}
{{--                                <div class="text-end">--}}
{{--                                    <button class="btn btn-primary waves-effect waves-lightml-2 me-2" type="submit">--}}
{{--                                        <i class="fa fa-save"></i> Save--}}
{{--                                    </button>--}}

{{--                                    <a class="btn btn-secondary waves-effect" href="{{ route('admin.authenticators.index') }}">--}}
{{--                                        <i class="fa fa-times"></i> Cancel--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </form>--}}

                    <create-authenticator :products="{{json_encode($products)}}"/>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('script')
{{--    <script>--}}
{{--        $('.checkbox_selector').change(function () {--}}
{{--            var goroupp = $(this).data( "role" );--}}
{{--            //alert(goroupp);--}}
{{--            //$("input[name='"+goroupp+"']:checkbox").prop('checked', false);--}}
{{--            var checkBoxes = $("input[name='"+goroupp+"']");--}}
{{--            checkBoxes.prop("checked", !checkBoxes.prop("checked"));--}}
{{--        });--}}

{{--        $('.product_checkItem').change(function () {--}}
{{--            let allBox = $('.checkbox_selector');--}}
{{--            let count = $('.product_checkItem:checkbox:checked').length--}}
{{--            if (count === {{$products->count()}}){--}}
{{--                allBox.prop('checked',true)--}}
{{--            }else {--}}
{{--                allBox.prop('checked',false)--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
@endpush
@push('style')
{{--    <style>--}}
{{--        .shipping_address_card{--}}
{{--            background: #eeeeee;--}}
{{--        }--}}
{{--    </style>--}}
@endpush


