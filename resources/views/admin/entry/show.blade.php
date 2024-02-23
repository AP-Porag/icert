@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3 text-capitalize">Order Details</h4>
                        <div class="">
                            <a href="{{route('admin.entries.index')}}" class="btn btn-sm btn-primary text-capitalize" style="padding-top: 8px;">Back to the list</a>
                            <button type="button" class="btn btn-primary text-capitalize" data-bs-toggle="modal" data-bs-target="#addNewItemModal">
                                Add new item
                            </button>
                            <div class="modal fade" id="addNewItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        {{--                                                                    <div class="modal-header">--}}
                                        {{--                                                                        <h5 class="modal-title" id="staticBackdropLabel">Multiple Qty--}}
                                        {{--                                                                        </h5>--}}
                                        {{--                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                        {{--                                                                    </div>--}}
                                        <div class="modal-body mt-3 text-center">
                                            <div class="question-icon-box">
                                                <i class="fa fa-question" style="color: #3d7cb1;font-size: 32px;"></i>
                                            </div>
                                            <span class="question-text" style="font-size: 24px;">
                                                                            How much additional pieces of <br>
                                                                            this item do you want to add?
                                                                        </span>
                                        </div>
                                        <div class="mb-4 text-center">
                                            <form action="">
                                                <div class="form-group mb-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card shipping_address_card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100 text-capitalize">
                                                                                    Select the item type to be entered
                                                                                    <span class="error">*</span>
                                                                                </label>
                                                                                <select class="form-select mb-text-only" aria-label="Default select example">
                                                                                    <option selected disabled>Open this select menu</option>
                                                                                    <option>name</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6" v-if="showItemTypeCrossoverBox">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100 text-capitalize">
                                                                                    Crossover Item Type
                                                                                    <span class="error">*</span>
                                                                                </label>
                                                                                <select class="form-select mb-text-only" aria-label="Default select example">
                                                                                    <option selected disabled>Open this select menu</option>
                                                                                    <option>Crosover Item Type</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--item type card-->
                                                        <div class="col-md-12" v-if="showItemTypeCardBox">
                                                            <div class="card shipping_address_card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-1">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100">
                                                                                    Qty
                                                                                </label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    placeholder=""
                                                                                    value="1"
                                                                                    readonly
                                                                                />
                                                                                <div class="error">
                                                                                    contact name is required
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-9">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #1   (Year,Manufacturer,Set,Other)
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #2
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #3
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Serial Number   (Only if printed directly on item)
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                                                                    Autographed
                                                                                                </label>
                                                                                                <input
                                                                                                    type="checkbox"
                                                                                                    class="form-check"
                                                                                                    placeholder=""
                                                                                                />
                                                                                                <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">-->
                                                                                                <!--                                                Same as Billing is required-->
                                                                                                <!--                                            </div>-->
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label w-100 text-capitalize">
                                                                                                    Authenticator Name
                                                                                                    <span class="error">*</span>
                                                                                                </label>
                                                                                                <select class="form-select mb-text-only" aria-label="Default select example">
                                                                                                    <option selected disabled>Open this select menu</option>
                                                                                                    <option>Authenticator name</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label w-100">
                                                                                                    Authenticator Cert. No.
                                                                                                    <span class="error">*</span>
                                                                                                </label>
                                                                                                <input
                                                                                                    type="text"
                                                                                                    class="form-control"
                                                                                                    placeholder=""
                                                                                                />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100">
                                                                                    Estimated Value
                                                                                    <span class="error">*</span>
                                                                                </label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    placeholder=""
                                                                                />
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--item type auto authentication-->
                                                        <div class="col-md-12" v-if="showItemTypeAutoAthenticationBox">
                                                            <div class="card shipping_address_card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-1">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100">
                                                                                    Qty
                                                                                </label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    placeholder=""
                                                                                    value="1"
                                                                                    readonly
                                                                                />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-9">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #1   (Year,Manufacturer,Set,Other)
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #2
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #3
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Serial Number   (Only if printed directly on item)
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                                                                    Autographed
                                                                                                </label>
                                                                                                <input
                                                                                                    type="checkbox"
                                                                                                    class="form-check"
                                                                                                    placeholder=""
                                                                                                />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label w-100 text-capitalize">
                                                                                                    Authenticator Name
                                                                                                    <span class="error">*</span>
                                                                                                </label>
                                                                                                <select class="form-select mb-text-only" aria-label="Default select example">
                                                                                                    <option selected disabled>Open this select menu</option>
                                                                                                    <option>Authenticator name</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label w-100">
                                                                                                    Authenticator Cert. No.
                                                                                                    <span class="error">*</span>
                                                                                                </label>
                                                                                                <input
                                                                                                    type="text"
                                                                                                    class="form-control"
                                                                                                    placeholder=""
                                                                                                />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100">
                                                                                    Estimated Value
                                                                                    <span class="error">*</span>
                                                                                </label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    placeholder=""
                                                                                />
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--item type combined service-->
                                                        <div class="col-md-12" v-if="showItemTypeCombinedServiceBox">
                                                            <div class="card shipping_address_card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-1">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100">
                                                                                    Qty
                                                                                </label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    placeholder=""
                                                                                    value="1"
                                                                                    readonly
                                                                                />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-9">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #1   (Year,Manufacturer,Set,Other)
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #2
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #3
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Serial Number   (Only if printed directly on item)
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                                                                    Autographed
                                                                                                </label>
                                                                                                <input
                                                                                                    type="checkbox"
                                                                                                    class="form-check"
                                                                                                    placeholder=""
                                                                                                />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label w-100 text-capitalize">
                                                                                                    Authenticator Name
                                                                                                    <span class="error">*</span>
                                                                                                </label>
                                                                                                <select class="form-select mb-text-only" aria-label="Default select example">
                                                                                                    <option selected disabled>Open this select menu</option>
                                                                                                    <option>Authenticator name</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label w-100">
                                                                                                    Authenticator Cert. No.
                                                                                                    <span class="error">*</span>
                                                                                                </label>
                                                                                                <input
                                                                                                    type="text"
                                                                                                    class="form-control"
                                                                                                    placeholder=""
                                                                                                />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100">
                                                                                    Estimated Value
                                                                                    <span class="error">*</span>
                                                                                </label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    placeholder=""
                                                                                />
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--item type reholder-->
                                                        <div class="col-md-12" v-if="showItemTypeReholderBox">
                                                            <div class="card shipping_address_card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-1">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100">
                                                                                    Qty
                                                                                </label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    placeholder=""
                                                                                    readonly
                                                                                />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-9">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Certification Number
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100">
                                                                                    Estimated Value
                                                                                    <span class="error">*</span>
                                                                                </label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    placeholder=""
                                                                                />
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--item type crossover-->
                                                        <div class="col-md-12" v-if="showItemTypeCrossoverBox">
                                                            <div class="card shipping_address_card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-1">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100">
                                                                                    Qty
                                                                                </label>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control"
                                                                                    placeholder=""
                                                                                    readonly
                                                                                />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-9">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #1   (Year,Manufacturer,Set,Other)
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #2
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Description #3
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Serial Number   (Only if printed directly on item)
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                                                                    Autographed
                                                                                                </label>
                                                                                                <input
                                                                                                    type="checkbox"
                                                                                                    class="form-check"
                                                                                                    placeholder=""
                                                                                                />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label w-100 text-capitalize">
                                                                                                    Authenticator Name
                                                                                                    <span class="error">*</span>
                                                                                                </label>
                                                                                                <select class="form-select mb-text-only" aria-label="Default select example">
                                                                                                    <option selected disabled>Open this select menu</option>
                                                                                                    <option>Authenticator name</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label w-100">
                                                                                                    Authenticator Cert. No.
                                                                                                    <span class="error">*</span>
                                                                                                </label>
                                                                                                <input
                                                                                                    type="text"
                                                                                                    class="form-control"
                                                                                                    placeholder=""
                                                                                                />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Estimated Value
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                        />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100 text-capitalize">
                                                                                            Minimum Grade
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <select class="form-select mb-text-only" aria-label="Default select example">
                                                                                            <option selected disabled>Open this select menu</option>
                                                                                            <option>Authenticator name</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
{{--                                                    <p class="quantity-warning-text text-danger" id="quantity-warning-text">Quantity is required</p>--}}
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
                        </div>
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
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="card-title text-capitalize">Joe's Card Shop</h5>
                                    <h5 class="card-title text-capitalize">Order # {{$item->entrySKU}}</h5>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">

                                                <thead class="text-center">
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
                                                        <span>Description One</span>
                                                        <br>
                                                        <span>Description two</span>
                                                        <br>
                                                        <span>Description three</span>
                                                    </td>
                                                    <td class="text-center">Yes</td>
                                                    <td class="text-center">
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
