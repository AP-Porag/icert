@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

                    <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">User ID <span class="error">*</span></label>
                                        <input type="text" name="userId" class="form-control" required=""
                                               value="{{ old('userId') }}">
                                        @error('userId')
                                        <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Name (First and last name)<span class="error">*</span></label>
                                        <input type="text" name="first_name" class="form-control" required=""
                                               value="{{ old('first_name') }}">
                                        @error('first_name')
                                        <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Email <span class="error">*</span></label>
                                        <input type="email" name="email" class="form-control" required=""
                                               value="{{ old('email') }}">
                                        @error('email')
                                        <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    @if(auth()->user()->user_type == \App\Models\User::USER_TYPE_ADMIN)
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">User Type <span class="error">*</span></label>
                                            <select class="form-control text-capitalize" name="user_type" id="user_type">
                                                <option class="text-capitalize" selected value="{{\App\Models\User::USER_TYPE_ADMIN}}">{{\App\Models\User::USER_TYPE_ADMIN}}</option>
                                                <option class="text-capitalize" value="{{\App\Models\User::USER_TYPE_ICERT}}">{{\App\Models\User::USER_TYPE_ICERT}}</option>
                                                <option class="text-capitalize" value="{{\App\Models\User::USER_TYPE_KSA}}">{{\App\Models\User::USER_TYPE_KSA}}</option>
                                            </select>
                                            @error('user_type')
                                            <p class="error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endif

{{--                                    <div class="mb-3 col-md-12">--}}
{{--                                        <label class="form-label">Password <span class="error">*</span></label>--}}
{{--                                        <input type="password" name="password" id="password" class="form-control" required=""--}}
{{--                                               placeholder="Password" value="">--}}
{{--                                        @error('password')--}}
{{--                                        <p class="error">{{ $message }}</p>--}}
{{--                                        @enderror--}}
{{--                                        --}}{{--                                <span id="StrengthDisp" class="input_bellow_text">--}}
{{--                                        --}}{{--                                    Should contains 1 Letters(uppercase & lowercase), Number and Special Characters.--}}
{{--                                        --}}{{--                                </span>--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-3 col-md-12">--}}
{{--                                        <label class="form-label">Confirm Password <span class="error">*</span></label>--}}
{{--                                        <input type="password" name="password_confirmation" class="form-control" required=""--}}
{{--                                               placeholder="Confirm Password" value="">--}}
{{--                                        @error('password_confirmation')--}}
{{--                                        <p class="error">{{ $message }}</p>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label mb-2 w-100">Status <span class="error">*</span></label>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="status_yes" value="{{ \App\Utils\GlobalConstant::STATUS_ACTIVE }}"
                                                   name="status" class="form-check-input" checked="">
                                            <label class="custom-control-label" for="status_yes">Active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="status_no" value="{{ \App\Utils\GlobalConstant::STATUS_INACTIVE }}"
                                                   name="status" class="form-check-input">
                                            <label class="custom-control-label" for="status_no">Suspend</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label mb-2 w-100">User Type <span class="error">*</span></label>
                                        <select class="form-select" name="user_type">
                                            <option selected disabled>Select user type</option>
                                            <option value="{{\App\Models\User::USER_TYPE_ICERT}}">iCert</option>
                                            <option value="{{\App\Models\User::USER_TYPE_KSA}}">KSA</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 relative-container">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <div class="centered-element">
                                            <label for="username" class="form-label">
                                                Name (First name only)
                                            </label>
                                            <input type="text" id="username" name="username" class="form-control"
                                                   autocomplete="off" value="{{ old('username') }}"
                                                   required>
                                            @error('username')
                                            <p class="error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="card shipping_address_card">
                                    <div class="card-body">

                                        <p class="font-size-18 mb-3 text-center">Check only the program sections that are available to this user.</p>
                                        <div class="row">
                                            <div class="col-md-12" style="">
                                                <label class="font_big_text" style="margin-top: 6px;margin-bottom: 15px; text-decoration: underline;"><input id="selectAll" type="checkbox" style="margin-left: 15px; margin-right: 5px;"><span style="margin-bottom: 10px;">Select All</span></label>
                                            </div>

                                            @foreach($roles as $role)
                                            <div class="col-md-3">
                                                <div class="mb-3 d-flex justify-content-start w-100">
                                                        <label class="form-label text-capitalize font_big_text" style="margin-top: 6px;margin-left: 15px; display: flex;">
                                                            <input
                                                                type="checkbox"
                                                                name="role[]"
                                                                class="form-check mr-3 checkbox"
                                                                style="margin-right: 5px;"
                                                                value="{{ $role->name }}" {{ old('role')==$role->id ? 'selected' : '' }}
                                                            />
                                                            {{$role->name}}
                                                        </label>

                                                </div>
                                            </div>
                                            @endforeach

                                            @error('role')
                                            <p class="error">{{ $message }}</p>
                                            @enderror
                                        </div>


{{--                                        <div class="mb-3">--}}
{{--                                            <label class="form-label">Select Grade <span class="error">*</span></label>--}}
{{--                                            <select class="form-control select2" name="role" required>--}}
{{--                                                <option selected disabled>----------------------</option>--}}
{{--                                                @forelse ($roles as $role)--}}
{{--                                                    <option value="{{ $role->name }}" {{ old('role')==$role->id ? 'selected' : '' }}>{{--}}
{{--                                                            $role->name }}</option>--}}
{{--                                                @empty--}}
{{--                                                    <option value="">Nothing in the list</option>--}}
{{--                                                @endforelse--}}
{{--                                            </select>--}}
{{--                                            @error('role')--}}
{{--                                            <p class="error">{{ $message }}</p>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}


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

                                    <a class="btn btn-secondary waves-effect" href="{{ route('admin.users.index') }}">
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
{{--    <script src="{{ asset('/admin/js/passwordCheck.js') }}"></script>--}}
<script>
    $(document).ready(function(){
        // Click event for the "Select All" button
        $("#selectAll").click(function(){
            // Toggle the checked property of all checkboxes with class "checkbox"
            $(".checkbox").prop('checked', $(this).prop('checked'));
        });

        // Click event for individual checkboxes
        $(".checkbox").click(function(){
            // Check if all checkboxes with class "checkbox" are checked
            var allChecked = $(".checkbox:checked").length === $(".checkbox").length;

            // Update the "Select All" checkbox based on the state of individual checkboxes
            $("#selectAll").prop('checked', allChecked);
        });
    });
</script>
@endpush

@push('style')
    <style>
        .relative-container {
            position: relative;
        }
        .centered-element {
            width: 94%;
            position: absolute;
            top: 33%;
            transform: translateY(-33%);
        }
    </style>
@endpush
