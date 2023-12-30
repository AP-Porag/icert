@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

{{--                    <p>{{url()->previous()}}</p>--}}

{{--                    @php--}}
{{--                    $url = url()->previous();--}}
{{--                    $url_array = explode('/',$url);--}}
{{--                    $route_name = $url_array[4];--}}

{{--                    $next_route = substr($url,33);--}}
{{--                    @endphp--}}

{{--                    <p>{{$route_name}}</p>--}}
{{--                    <p>{{$next_route}}</p>--}}
                    <form>
                        <customer-create-form/>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('style')
    <style>
        .shipping_address_card{
            background: #eeeeee;
        }
    </style>
@endpush
@push('script')
@endpush

