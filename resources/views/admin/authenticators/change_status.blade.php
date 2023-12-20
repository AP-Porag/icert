@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <input type="text" class="form-control md-readonly" value="{{$item->name}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <label class="form-label">Certified Products</label><br>
                                        @if($item->products->count() > 0)
                                            @foreach($item->products as $product)
                                                <span class="badge badge-soft-blue-grey product_badge">{{$product->product->name}}</span>
                                            @endforeach
                                        @endif

                                        <form action="{{route('admin.authenticators.save-status',$item->id)}}" method="post">
                                            @method('POST')
                                            @csrf

                                            <div class="row mt-4 mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-select text-capitalize" name="status">
                                                        <option class="text-capitalize" @if($item->status == \App\Models\Authenticator::STATUS_ACTIVE) selected @endif value="{{\App\Models\Authenticator::STATUS_ACTIVE}}">{{\App\Models\Authenticator::STATUS_ACTIVE}}</option>
                                                        <option class="text-capitalize" @if($item->status == \App\Models\Authenticator::STATUS_SUSPEND) selected @endif value="{{\App\Models\Authenticator::STATUS_SUSPEND}}">{{\App\Models\Authenticator::STATUS_SUSPEND}}</option>
                                                        <option class="text-capitalize" @if($item->status == \App\Models\Authenticator::STATUS_DELETE) selected @endif value="{{\App\Models\Authenticator::STATUS_DELETE}}">{{\App\Models\Authenticator::STATUS_DELETE}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" style="color: #eeeeee;">Status</label><br>
                                                    <button class="btn btn-primary waves-effect waves-lightml-2 me-2" type="submit">
                                                        <i class="fa fa-save"></i> Change Status
                                                    </button>
                                                    <a href="{{route('admin.authenticators.index')}}" class="btn btn-warning" style="background: orange;margin-left: 15px;color: white;">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <script>

    </script>
@endpush
@push('style')
    <style>
        .shipping_address_card{
            background: #eeeeee;
        }
        .product_badge{
            font-size: 15px;
            color: black;
            text-transform: capitalize;
            margin-right: 10px;
        }
    </style>
@endpush


