@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3 text-capitalize">Order Details</h4>
                        <div class="">
                            <button type="button" class="btn btn-sm btn-primary text-capitalize" style="padding-top: 8px;" data-bs-toggle="modal" data-bs-target="#addNewItemModal">
                                Add new item
                            </button>
                            <div class="modal fade" id="addNewItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add New Item
                                            </h5>
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-4">
                                            <form action="{{route('admin.entries.add.new.item')}}" method="POST">
                                                @method('post')
                                                @csrf
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
                                                                                <select class="form-select mb-text-only" id="itemSelect" aria-label="Default select example" name="itemType">
                                                                                    <option selected disabled>Open this select menu</option>
                                                                                    <option value="Card">Card</option>
                                                                                    <option value="Auto Authentication">Auto Authentication</option>
                                                                                    <option value="Combined Service">Combined Service</option>
                                                                                    <option value="Reholder">Reholder</option>
                                                                                    <option value="Crossover">Crossover</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 hidden-box" id="showItemTypeCrossoverBoxOne">
                                                                            <div class="mb-3">
                                                                                <label class="form-label w-100 text-capitalize">
                                                                                    Crossover Item Type
                                                                                    <span class="error">*</span>
                                                                                </label>
                                                                                <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_item_type" id="crossover_item_type">
                                                                                    <option selected disabled>Open this select menu</option>
                                                                                    <option>Crossover Item Type</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12" id="warning_text_box">
                                                            <div class="alert alert-danger">
                                                                <strong>(*)</strong> Sign indicates required.
                                                            </div>
                                                        </div>
                                                        <!--item type card-->
                                                        <div class="col-md-12 hidden-box" id="showItemTypeCardBox">
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
                                                                                            name="card_description_one"
                                                                                            id="card_description_one"
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
                                                                                            name="card_description_two"
                                                                                            id="card_description_two"
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
                                                                                            name="card_description_three"
                                                                                            id="card_description_three"
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Serial Number   (Only if printed directly on item)
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                            name="card_serial_number"
                                                                                            id="card_serial_number"
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
                                                                                                    name="card_autographed"
                                                                                                    id="card_autographed"
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
                                                                                                <select class="form-select mb-text-only" aria-label="Default select example" name="card_authenticator_name" id="card_authenticator_name">
                                                                                                    <option selected disabled>Open this select menu</option>
                                                                                                    @foreach($authenticators as $authenticator)
                                                                                                        <option value="{{$authenticator->id}}" >{{$authenticator->name}}</option>
                                                                                                    @endforeach
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
                                                                                                    name="card_authenticator_cert_no"
                                                                                                    id="card_authenticator_cert_no"
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
                                                                                    id="card_estimated_value"
                                                                                    name="card_estimated_value"
                                                                                />
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--item type auto authentication-->
                                                        <div class="col-md-12 hidden-box" id="showItemTypeAutoAthenticationBox">
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
                                                                                            name="auto_authentication_description_one"
                                                                                            id="auto_authentication_description_one"
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
                                                                                            name="auto_authentication_description_two"
                                                                                            id="auto_authentication_description_two"
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
                                                                                            name="auto_authentication_description_three"
                                                                                            id="auto_authentication_description_three"
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Serial Number   (Only if printed directly on item)
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                            name="auto_authentication_serial_number"
                                                                                            id="auto_authentication_serial_number"
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
                                                                                                    name="auto_authentication_autographed"
                                                                                                    id="auto_authentication_autographed"
                                                                                                />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label w-100 text-capitalize">
                                                                                                    Authenticator Name
                                                                                                    <span class="error">*</span>
                                                                                                </label>
                                                                                                <select class="form-select mb-text-only" aria-label="Default select example" name="auto_authentication_authenticator_name" id="auto_authentication_authenticator_name">
                                                                                                    <option selected disabled>Open this select menu</option>
                                                                                                    @foreach($authenticators as $authenticator)
                                                                                                        <option value="{{$authenticator->id}}" >{{$authenticator->name}}</option>
                                                                                                    @endforeach
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
                                                                                                    type="number"
                                                                                                    class="form-control"
                                                                                                    placeholder=""
                                                                                                    name="auto_authentication_authenticator_cert_no"
                                                                                                    id="auto_authentication_authenticator_cert_no"
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
                                                                                    type="number"
                                                                                    class="form-control"
                                                                                    placeholder=""
                                                                                    name="auto_authentication_estimated_value"
                                                                                    id="auto_authentication_estimated_value"
                                                                                />
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--item type combined service-->
                                                        <div class="col-md-12 hidden-box" id="showItemTypeCombinedServiceBox">
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
                                                                                            name="combined_service_description_one"
                                                                                            id="combined_service_description_one"
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
                                                                                            name="combined_service_description_two"
                                                                                            id="combined_service_description_two"
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
                                                                                            name="combined_service_description_three"
                                                                                            id="combined_service_description_three"
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Serial Number   (Only if printed directly on item)
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
                                                                                                    name="combined_service_autographed"
                                                                                                    id="combined_service_autographed"
                                                                                                />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label w-100 text-capitalize">
                                                                                                    Authenticator Name
                                                                                                    <span class="error">*</span>
                                                                                                </label>
                                                                                                <select class="form-select mb-text-only" aria-label="Default select example" name="combined_service_authenticator_name" id="combined_service_authenticator_name">
                                                                                                    <option selected disabled>Open this select menu</option>
                                                                                                    @foreach($authenticators as $authenticator)
                                                                                                        <option value="{{$authenticator->id}}" >{{$authenticator->name}}</option>
                                                                                                    @endforeach
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
                                                                                                    name="combined_service_authenticator_cert_no"
                                                                                                    id="combined_service_authenticator_cert_no"
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
                                                                                    name="combined_service_estimated_value"
                                                                                    id="combined_service_estimated_value"
                                                                                />
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--item type reholder-->
                                                        <div class="col-md-12 hidden-box" id="showItemTypeReholderBox">
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
                                                                                    value="1"
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
                                                                                            name="reholder_certification_number"
                                                                                            id="reholder_certification_number"
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
                                                                                    name="reholder_estimated_value"
                                                                                    id="reholder_estimated_value"
                                                                                />
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--item type crossover-->
                                                        <div class="col-md-12 hidden-box" id="showItemTypeCrossoverBoxTwo">
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
                                                                                            name="crossover_description_one"
                                                                                            id="crossover_description_one"
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
                                                                                            name="crossover_description_two"
                                                                                            id="crossover_description_two"
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
                                                                                            name="crossover_description_three"
                                                                                            id="crossover_description_three"
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100">
                                                                                            Serial Number   (Only if printed directly on item)
                                                                                        </label>
                                                                                        <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder=""
                                                                                            name="crossover_serial_number"
                                                                                            id="crossover_serial_number"
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
                                                                                                    name="crossover_autographed"
                                                                                                    id="crossover_autographed"
                                                                                                />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="mb-3">
                                                                                                <label class="form-label w-100 text-capitalize">
                                                                                                    Authenticator Name
                                                                                                    <span class="error">*</span>
                                                                                                </label>
                                                                                                <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_authenticator_name"id="crossover_authenticator_name">
                                                                                                    <option selected disabled>Open this select menu</option>
                                                                                                    @foreach($authenticators as $authenticator)
                                                                                                        <option value="{{$authenticator->id}}" >{{$authenticator->name}}</option>
                                                                                                    @endforeach
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
                                                                                                    name="crossover_authenticator_cert_no"
                                                                                                    id="crossover_authenticator_cert_no"
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
                                                                                            name="crossover_estimated_value"
                                                                                            id="crossover_estimated_value"
                                                                                        />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label w-100 text-capitalize">
                                                                                            Minimum Grade
                                                                                            <span class="error">*</span>
                                                                                        </label>
                                                                                        <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_minimum_grade" id="crossover_minimum_grade">
                                                                                            <option selected disabled>Open this select menu</option>
                                                                                            @foreach($grades as $grade)
                                                                                                <option value="{{$grade['name']}}">{{$grade['name']}}</option>
                                                                                            @endforeach
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
                                                    <input type="number" hidden="" class="form-control" name="entry_id" value="{{$entry->id}}" style="width: 33%;margin: 0 auto;">
{{--                                                    <input type="number" hidden="" class="form-control" name="item_name" value="Card" style="width: 33%;margin: 0 auto;">--}}
                                                </div>
                                                <div class="w-100 d-flex justify-content-end">
                                                    <button type="submit" id="add_item_submit_btn" class="btn btn-primary" style="margin-right: 15px;">Confirm</button>
                                                    <button type="button" id="cancel_btn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <a href="{{route('admin.entries.index')}}" class="btn btn-sm btn-secondary text-capitalize" style="padding-top: 8px;">Back to the list</a>

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
                                    <h5 class="card-title text-capitalize">{{$entry->customer_name}}</h5>
                                    <h5 class="card-title text-capitalize">Order # {{$entry->entrySKU}}</h5>
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

                                                @if($items->count() > 0)
                                                    @foreach($items as $item)
                                                        <tr>
                                                            <td class="text-capitalize">{{$item->itemType}}</td>
                                                            <td>{{$item->itemType == 'Crossover' ? $item->crossover_item_type: 'N/A'}}</td>

                                                            @if($item->itemType == 'Card')
                                                                <td>
                                                                    <span>{{$item->card_description_one}}</span>
                                                                    <br>
                                                                    <span>{{$item->card_description_two}}</span>
                                                                    <br>
                                                                    <span>{{$item->card_description_three}}</span>
                                                                </td>
                                                                <td class="text-center">{{$item->card_autographed == 1 ? 'Yes' : 'No'}}</td>
                                                            @endif


                                                            @if($item->itemType == 'Auto Authentication')
                                                                <td>
                                                                    <span>{{$item->auto_authentication_description_one}}</span>
                                                                    <br>
                                                                    <span>{{$item->auto_authentication_description_two}}</span>
                                                                    <br>
                                                                    <span>{{$item->auto_authentication_description_three}}</span>
                                                                </td>
                                                                <td class="text-center">{{$item->auto_authentication_autographed == 1 ? 'Yes' : 'No'}}</td>
                                                            @endif


                                                            @if($item->itemType == 'Combined Service')
                                                                <td>
                                                                    <span>{{$item->combined_service_description_one}}</span>
                                                                    <br>
                                                                    <span>{{$item->combined_service_description_two}}</span>
                                                                    <br>
                                                                    <span>{{$item->combined_service_description_three}}</span>
                                                                </td>
                                                                <td class="text-center">{{$item->combined_service_autographed == 1 ? 'Yes' : 'No'}}</td>
                                                            @endif

                                                            @if($item->itemType == 'Reholder')
                                                                <td>
                                                                    <span>N/A</span>
                                                                    <br>
                                                                    <span>N/A</span>
                                                                    <br>
                                                                    <span>N/A</span>
                                                                </td>
                                                                <td class="text-center">N/A</td>
                                                            @endif

                                                            @if($item->itemType == 'Crossover')
                                                                <td>
                                                                    <span>{{$item->crossover_description_one}}</span>
                                                                    <br>
                                                                    <span>{{$item->crossover_description_two}}</span>
                                                                    <br>
                                                                    <span>{{$item->crossover_description_three}}</span>
                                                                </td>
                                                                <td class="text-center">{{$item->crossover_autographed == 1 ? 'Yes' : 'No'}}</td>
                                                            @endif
                                                            <td class="">
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="" style="margin-right: 15px;">
                                                                        <button type="button" class="btn text-primary btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$item->id}}">
                                                                            <i class="fa fa-angle-double-up"></i>
                                                                        </button>
                                                                        <div class="modal fade" id="staticBackdrop-{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
                                                                            <div class="modal-dialog">
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
                                                                                        <form action="{{route('admin.entries.addAdditional.pieces')}}" method="POST">
                                                                                            @method('POST')
                                                                                            @csrf
                                                                                            <div class="form-group mb-3">
                                                                                                <input type="number" id="quantity-input-box" class="form-control" name="pieces" style="width: 33%;margin: 0 auto;">
                                                                                                <p class="quantity-warning-text text-danger" id="quantity-warning-text">Quantity is required</p>
                                                                                                <input type="number" hidden=""  class="form-control" name="item_id" value="{{$item->id}}" style="width: 33%;margin: 0 auto;">
{{--                                                                                                <input type="number" hidden="" class="form-control" name="item_name" value="Card" style="width: 33%;margin: 0 auto;">--}}
                                                                                            </div>
                                                                                            <button type="submit" id="extra_submit_btn" class="btn btn-primary" style="margin-right: 15px;">Confirm</button>
                                                                                            <button type="button" id="cancel_btn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.modal-content -->
                                                                            </div>
                                                                            <!-- /.modal-dialog -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="" style="margin-right: 15px;">
                                                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit-{{$item->id}}">
                                                                            <i class="fa fa-edit" style="padding-top: 6px;padding-bottom: 6px;"></i>
                                                                        </button>
                                                                        <div class="modal fade" id="staticBackdropEdit-{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Item</h5>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="mb-4">
                                                                                            <form action="{{route('admin.entries.edit.new.item')}}" method="POST">
                                                                                                @method('post')
                                                                                                @csrf
                                                                                                <div class="form-group mb-3" style="text-align: left;">
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
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    class="form-control"
                                                                                                                                    placeholder=""
                                                                                                                                    name="itemType"
                                                                                                                                    id="itemType"
                                                                                                                                    value="{{$item->itemType}}"
                                                                                                                                    readonly
                                                                                                                                />
{{--                                                                                                                                <select class="form-select mb-text-only" id="itemSelect" aria-label="Default select example" name="itemType">--}}
{{--                                                                                                                                    <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                                                    <option value="Card" @if($item->itemType == "Card") selected @endif>Card</option>--}}
{{--                                                                                                                                    <option value="Auto Authentication" @if($item->itemType == "Auto Authentication") selected @endif>Auto Authentication</option>--}}
{{--                                                                                                                                    <option value="Combined Service" @if($item->itemType == "Combined Service") selected @endif>Combined Service</option>--}}
{{--                                                                                                                                    <option value="Reholder" @if($item->itemType == "Reholder") selected @endif>Reholder</option>--}}
{{--                                                                                                                                    <option value="Crossover" @if($item->itemType == "Crossover") selected @endif>Crossover</option>--}}
{{--                                                                                                                                </select>--}}
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                            <div class="col-md-6 {{$item->itemType == "Crossover" ? '' : 'hidden-box'}}" id="showEditItemTypeCrossoverBoxOne">
                                                                                                                                <div class="mb-3">
                                                                                                                                    <label class="form-label w-100 text-capitalize">
                                                                                                                                        Crossover Item Type
                                                                                                                                        <span class="error">*</span>
                                                                                                                                    </label>
                                                                                                                                    <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_item_type" id="crossover_item_type">
                                                                                                                                        <option selected disabled>Open this select menu</option>
                                                                                                                                        <option>Crossover Item Type</option>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

{{--                                                                                                        <div class="col-md-12" id="edit_warning_text_box hidden-box">--}}
{{--                                                                                                            <div class="alert alert-danger">--}}
{{--                                                                                                                <strong>(*)</strong> Sign indicates required.--}}
{{--                                                                                                            </div>--}}
{{--                                                                                                        </div>--}}

                                                                                                            <!--item type card-->
                                                                                                            <div class="col-md-12 {{$item->itemType == "Card" ? 'show-box' : 'hidden-box'}}" id="showEditItemTypeCardBox">
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
                                                                                                                                                name="card_description_one"
                                                                                                                                                id="card_description_one"
                                                                                                                                                value="{{$item->card_description_one}}"
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
                                                                                                                                                name="card_description_two"
                                                                                                                                                id="card_description_two"
                                                                                                                                                value="{{$item->card_description_two}}"
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
                                                                                                                                                name="card_description_three"
                                                                                                                                                id="card_description_three"
                                                                                                                                                value="{{$item->card_description_three}}"
                                                                                                                                            />
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                    <div class="col-md-6">
                                                                                                                                        <div class="mb-3">
                                                                                                                                            <label class="form-label w-100">
                                                                                                                                                Serial Number   (Only if printed directly on item)
                                                                                                                                            </label>
                                                                                                                                            <input
                                                                                                                                                type="text"
                                                                                                                                                class="form-control"
                                                                                                                                                placeholder=""
                                                                                                                                                name="card_serial_number"
                                                                                                                                                id="card_serial_number"
                                                                                                                                                value="{{$item->card_serial_number}}"
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
                                                                                                                                                        name="card_autographed"
                                                                                                                                                        id="card_autographed"
                                                                                                                                                        value="{{$item->card_autographed}}"
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
                                                                                                                                                    <select class="form-select mb-text-only" aria-label="Default select example" name="card_authenticator_name" id="card_authenticator_name">
                                                                                                                                                        <option selected disabled>Open this select menu</option>
                                                                                                                                                        @foreach($authenticators as $authenticator)
                                                                                                                                                            <option value="{{$authenticator->id}}" @if($item->card_authenticator_name == $authenticator->id) selected @endif >{{$authenticator->name}}</option>
                                                                                                                                                        @endforeach

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
                                                                                                                                                        name="card_authenticator_cert_no"
                                                                                                                                                        id="card_authenticator_cert_no"
                                                                                                                                                        value="{{$item->card_authenticator_cert_no}}"
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
                                                                                                                                        id="card_estimated_value"
                                                                                                                                        name="card_estimated_value"
                                                                                                                                        value="{{$item->card_estimated_value}}"
                                                                                                                                    />
                                                                                                                                </div>
                                                                                                                            </div>


                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <!--item type auto authentication-->
                                                                                                            <div class="col-md-12 {{$item->itemType == "Auto Authentication" ? 'show-box' : 'hidden-box'}}" id="showEditItemTypeAutoAthenticationBox">
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
                                                                                                                                                name="auto_authentication_description_one"
                                                                                                                                                id="auto_authentication_description_one"
                                                                                                                                                value="{{$item->auto_authentication_description_one}}"
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
                                                                                                                                                name="auto_authentication_description_two"
                                                                                                                                                id="auto_authentication_description_two"
                                                                                                                                                value="{{$item->auto_authentication_description_two}}"
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
                                                                                                                                                name="auto_authentication_description_three"
                                                                                                                                                id="auto_authentication_description_three"
                                                                                                                                                value="{{$item->auto_authentication_description_three}}"
                                                                                                                                            />
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                    <div class="col-md-6">
                                                                                                                                        <div class="mb-3">
                                                                                                                                            <label class="form-label w-100">
                                                                                                                                                Serial Number   (Only if printed directly on item)
                                                                                                                                            </label>
                                                                                                                                            <input
                                                                                                                                                type="text"
                                                                                                                                                class="form-control"
                                                                                                                                                placeholder=""
                                                                                                                                                name="auto_authentication_serial_number"
                                                                                                                                                id="auto_authentication_serial_number"
                                                                                                                                                value="{{$item->auto_authentication_serial_number}}"
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
                                                                                                                                                        name="auto_authentication_autographed"
                                                                                                                                                        id="auto_authentication_autographed"
                                                                                                                                                        value="{{$item->auto_authentication_autographed}}"
                                                                                                                                                    />
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-md-4">
                                                                                                                                                <div class="mb-3">
                                                                                                                                                    <label class="form-label w-100 text-capitalize">
                                                                                                                                                        Authenticator Name
                                                                                                                                                        <span class="error">*</span>
                                                                                                                                                    </label>
                                                                                                                                                    <select class="form-select mb-text-only" aria-label="Default select example" name="auto_authentication_authenticator_name" id="auto_authentication_authenticator_name">
                                                                                                                                                        <option selected disabled>Open this select menu</option>
                                                                                                                                                        @foreach($authenticators as $authenticator)
                                                                                                                                                            <option value="{{$authenticator->id}}" @if($item->auto_authentication_authenticator_name == $authenticator->id) selected @endif >{{$authenticator->name}}</option>
                                                                                                                                                        @endforeach
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
                                                                                                                                                        type="number"
                                                                                                                                                        class="form-control"
                                                                                                                                                        placeholder=""
                                                                                                                                                        name="auto_authentication_authenticator_cert_no"
                                                                                                                                                        id="auto_authentication_authenticator_cert_no"
                                                                                                                                                        value="{{$item->auto_authentication_authenticator_cert_no}}"
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
                                                                                                                                        type="number"
                                                                                                                                        class="form-control"
                                                                                                                                        placeholder=""
                                                                                                                                        name="auto_authentication_estimated_value"
                                                                                                                                        id="auto_authentication_estimated_value"
                                                                                                                                        value="{{$item->auto_authentication_estimated_value}}"
                                                                                                                                    />
                                                                                                                                </div>
                                                                                                                            </div>


                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <!--item type combined service-->
                                                                                                            <div class="col-md-12 {{$item->itemType == "Combined Service" ? 'show-box' : 'hidden-box'}}" id="showEditItemTypeCombinedServiceBox">
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
                                                                                                                                                name="combined_service_description_one"
                                                                                                                                                id="combined_service_description_one"
                                                                                                                                                value="{{$item->combined_service_description_one}}"
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
                                                                                                                                                name="combined_service_description_two"
                                                                                                                                                id="combined_service_description_two"
                                                                                                                                                value="{{$item->combined_service_description_two}}"
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
                                                                                                                                                name="combined_service_description_three"
                                                                                                                                                id="combined_service_description_three"
                                                                                                                                                value="{{$item->combined_service_description_three}}"
                                                                                                                                            />
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                    <div class="col-md-6">
                                                                                                                                        <div class="mb-3">
                                                                                                                                            <label class="form-label w-100">
                                                                                                                                                Serial Number   (Only if printed directly on item)
                                                                                                                                            </label>
                                                                                                                                            <input
                                                                                                                                                type="text"
                                                                                                                                                class="form-control"
                                                                                                                                                placeholder=""
                                                                                                                                                name="combined_service_serial_number"
                                                                                                                                                id="combined_service_serial_number"
                                                                                                                                                value="{{$item->combined_service_serial_number}}"
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
                                                                                                                                                        name="combined_service_autographed"
                                                                                                                                                        id="combined_service_autographed"
                                                                                                                                                        value="{{$item->combined_service_autographed}}"
                                                                                                                                                    />
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-md-4">
                                                                                                                                                <div class="mb-3">
                                                                                                                                                    <label class="form-label w-100 text-capitalize">
                                                                                                                                                        Authenticator Name
                                                                                                                                                        <span class="error">*</span>
                                                                                                                                                    </label>
                                                                                                                                                    <select class="form-select mb-text-only" aria-label="Default select example" name="combined_service_authenticator_name" id="combined_service_authenticator_name">
                                                                                                                                                        <option selected disabled>Open this select menu</option>
                                                                                                                                                        @foreach($authenticators as $authenticator)
                                                                                                                                                            <option value="{{$authenticator->id}}" @if($item->combined_service_authenticator_name == $authenticator->id) selected @endif >{{$authenticator->name}}</option>
                                                                                                                                                        @endforeach
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
                                                                                                                                                        name="combined_service_authenticator_cert_no"
                                                                                                                                                        id="combined_service_authenticator_cert_no"
                                                                                                                                                        value="{{$item->combined_service_authenticator_cert_no}}"
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
                                                                                                                                        name="combined_service_estimated_value"
                                                                                                                                        id="combined_service_estimated_value"
                                                                                                                                        value="{{$item->combined_service_estimated_value}}"
                                                                                                                                    />
                                                                                                                                </div>
                                                                                                                            </div>


                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <!--item type reholder-->
                                                                                                            <div class="col-md-12 {{$item->itemType == "Reholder" ? 'show-box' : 'hidden-box'}}" id="showEditItemTypeReholderBox">
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
                                                                                                                                        value="1"
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
                                                                                                                                                name="reholder_certification_number"
                                                                                                                                                id="reholder_certification_number"
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
                                                                                                                                        name="reholder_estimated_value"
                                                                                                                                        id="reholder_estimated_value"
                                                                                                                                    />
                                                                                                                                </div>
                                                                                                                            </div>


                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                         <!--item type crossover-->
                                                                                                        <div class="col-md-12 {{$item->itemType == "Crossover" ? 'show-box' : 'hidden-box'}}" id="showEditItemTypeCrossoverBoxTwo">
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
                                                                                                                                                name="crossover_description_one"
                                                                                                                                                id="crossover_description_one"
                                                                                                                                                value="{{$item->crossover_description_one}}"
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
                                                                                                                                                name="crossover_description_two"
                                                                                                                                                id="crossover_description_two"
                                                                                                                                                value="{{$item->crossover_description_two}}"
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
                                                                                                                                                name="crossover_description_three"
                                                                                                                                                id="crossover_description_three"
                                                                                                                                                value="{{$item->crossover_description_three}}"
                                                                                                                                            />
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                    <div class="col-md-6">
                                                                                                                                        <div class="mb-3">
                                                                                                                                            <label class="form-label w-100">
                                                                                                                                                Serial Number   (Only if printed directly on item)
                                                                                                                                            </label>
                                                                                                                                            <input
                                                                                                                                                type="text"
                                                                                                                                                class="form-control"
                                                                                                                                                placeholder=""
                                                                                                                                                name="crossover_serial_number"
                                                                                                                                                id="crossover_serial_number"
                                                                                                                                                value="{{$item->crossover_serial_number}}"
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
                                                                                                                                                        name="crossover_autographed"
                                                                                                                                                        id="crossover_autographed"
                                                                                                                                                        value="{{$item->crossover_autographed}}"
                                                                                                                                                    />
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-md-4">
                                                                                                                                                <div class="mb-3">
                                                                                                                                                    <label class="form-label w-100 text-capitalize">
                                                                                                                                                        Authenticator Name
                                                                                                                                                        <span class="error">*</span>
                                                                                                                                                    </label>
                                                                                                                                                    <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_authenticator_name"id="crossover_authenticator_name">
                                                                                                                                                        <option selected disabled>Open this select menu</option>
                                                                                                                                                        @foreach($authenticators as $authenticator)
                                                                                                                                                            <option value="{{$authenticator->id}}" @if($item->crossover_authenticator_name == $authenticator->id) selected @endif >{{$authenticator->name}}</option>
                                                                                                                                                        @endforeach
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
                                                                                                                                                        name="crossover_authenticator_cert_no"
                                                                                                                                                        id="crossover_authenticator_cert_no"
                                                                                                                                                        value="{{$item->crossover_authenticator_cert_no}}"
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
                                                                                                                                                name="crossover_estimated_value"
                                                                                                                                                id="crossover_estimated_value"
                                                                                                                                                value="{{$item->crossover_estimated_value}}"
                                                                                                                                            />
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-md-12">
                                                                                                                                        <div class="mb-3">
                                                                                                                                            <label class="form-label w-100 text-capitalize">
                                                                                                                                                Minimum Grade
                                                                                                                                                <span class="error">*</span>
                                                                                                                                            </label>
                                                                                                                                            <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_minimum_grade" id="crossover_minimum_grade">
                                                                                                                                                <option selected disabled>Open this select menu</option>
                                                                                                                                                @foreach($grades as $grade)
                                                                                                                                                    <option value="{{$grade['name']}}" @if($item->crossover_minimum_grade == $grade['name']) selected @endif >{{$grade['name']}}</option>
                                                                                                                                                @endforeach
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
                                                                                                    <input type="number" hidden="" class="form-control" name="item_id" value="{{$item->id}}" style="width: 33%;margin: 0 auto;">
                                                                                                </div>
                                                                                                <div class="w-100 d-flex justify-content-end">
                                                                                                    <button type="submit" id="edit_item_submit_btn" class="btn btn-primary" style="margin-right: 15px;">Confirm</button>
                                                                                                    <button type="button" id="cancel_btn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.modal-content -->
                                                                            </div>
                                                                            <!-- /.modal-dialog -->
                                                                        </div>
                                                                    </div>

{{--                                                                    delete modal--}}
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete">
                                                                            <i class="fa fa-archive" style="padding-top: 6px;padding-bottom: 6px;"></i>
                                                                        </button>
                                                                        <div class="modal fade" id="staticBackdropDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-body mt-3 text-center">
                                                                                        <div class="question-icon-box">
                                                                                            <i class="fa fa-exclamation" style="color: darkorange;font-size: 32px;"></i>
                                                                                        </div>
                                                                                        <span class="question-text" style="font-size: 24px;">
                                                                            Are you sure ? <br>
                                                                            <span style="font-size: 14px;">You won't be able to revert this!</span>
                                                                        </span>
                                                                                    </div>
                                                                                    <div class="mb-4 text-center">
                                                                                        <form action="{{route('admin.entries.entry.item.destroy')}}" method="POST">
                                                                                            @method('post')
                                                                                            @csrf
                                                                                            <div class="form-group mb-3">
                                                                                                <input type="number" hidden="" class="form-control" name="item_id" value="{{$item->id}}" style="width: 33%;margin: 0 auto;">
                                                                                            </div>
                                                                                            <button type="submit" id="" class="btn btn-primary" style="margin-right: 15px;">Confirm</button>
                                                                                            <button type="button" id="" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.modal-content -->
                                                                            </div>
                                                                            <!-- /.modal-dialog -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
{{--                                                @else--}}
{{--                                                    <tr width="100">--}}
{{--                                                        <td class="text-capitalize text-center text-warning">No item found with this entry</td>--}}
{{--                                                    </tr>--}}
                                                @endif
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
    .hidden-box{
        display: none;
    }
    .question-icon-box {
        border: 1px solid darkorange;
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
    #warning_text_box{
        display: none;
    }
    .waring-text{
        display: none;
    }



     table {
         width: 100%;

         /* border-collapse: collapse; */
         border-spacing: 0;
         border: 2px solid black;
     }

    /* To display the block as level element */
    table tbody,
    table thead {
        display: block;
    }

    thead{
        background: cornflowerblue;
        color:white;
    }
    thead tr th {
        height: 40px;
    }

    table tbody {

        /* Set the height of table body */
        height: 300px;

        /* Set vertical scroll */
        overflow-y: auto;

        /* Hide the horizontal scroll */
        overflow-x: hidden;
    }



    tbody td,
    thead th {
        width: 240px;
        border-right: 2px solid black;
    }

    td {
        text-align: center;
    }
</style>
@endpush

@push('script')
    <script>

        let notSelected = true;
        let showItemTypeCardBox = false;
        let showItemTypeAutoAthenticationBox= false;
        let showItemTypeCombinedServiceBox= false;
        let showItemTypeReholderBox= false;
        let showItemTypeCrossoverBoxTwo= false;
        let showItemTypeCrossoverBoxOne= false;
        $('#extra_submit_btn').on('click', function () {
            console.log('clicked')
            if(!$('#quantity-input-box').val()){
                $(this).attr("type","button");
                $('#quantity-warning-text').show();
            }else {
                $('#quantity-warning-text').hide();
                $(this).attr("type","submit");
            }
        });

        $('#add_item_submit_btn').on('click', function (e) {
            // e.preventDefault();
            console.log('clicked add item')

            if(notSelected){
                if (showItemTypeCardBox){
                    console.log('showItemTypeCardBox  '+showItemTypeCardBox)

                    if(!$('#card_description_one').val() || !$('#card_description_two').val() || !$('#card_description_three').val() || !$('#card_authenticator_name').val() || !$('#card_authenticator_cert_no').val() || !$('#card_estimated_value').val()){
                        $(this).attr("type","button");
                        $('#warning_text_box').show();
                    }else {
                        $('#warning_text_box').hide();
                        $(this).attr("type","submit");
                    }

                }
                if(showItemTypeAutoAthenticationBox){
                    console.log('showItemTypeAutoAthenticationBox  '+showItemTypeAutoAthenticationBox)

                    if(!$('#auto_authentication_description_one').val() || !$('#auto_authentication_description_two').val() || !$('#auto_authentication_description_three').val() || !$('#auto_authentication_authenticator_name').val() || !$('#auto_authentication_authenticator_cert_no').val() || !$('#auto_authentication_estimated_value').val()){
                        $(this).attr("type","button");
                        $('#warning_text_box').show();
                    }else {
                        $('#warning_text_box').hide();
                        $(this).attr("type","submit");
                    }
                }
                if(showItemTypeCombinedServiceBox){
                    console.log('showItemTypeCombinedServiceBox  '+showItemTypeCombinedServiceBox)

                    if(!$('#combined_service_description_one').val() || !$('#combined_service_description_two').val() || !$('#combined_service_description_three').val() || !$('#combined_service_authenticator_name').val() || !$('#combined_service_authenticator_cert_no').val() || !$('#combined_service_estimated_value').val()){
                        $(this).attr("type","button");
                        $('#warning_text_box').show();
                    }else {
                        $('#warning_text_box').hide();
                        $(this).attr("type","submit");
                    }
                }
                if(showItemTypeReholderBox){
                    console.log('showItemTypeReholderBox  '+showItemTypeReholderBox)

                    if(!$('#reholder_certification_number').val() || !$('#reholder_estimated_value').val() ){
                        $(this).attr("type","button");
                        $('#warning_text_box').show();
                    }else {
                        $('#warning_text_box').hide();
                        $(this).attr("type","submit");
                    }
                }
                if(showItemTypeCrossoverBoxOne || showItemTypeCrossoverBoxTwo){
                    console.log('showItemTypeCrossoverBoxOne  '+showItemTypeCrossoverBoxOne)

                    if(!$('#crossover_description_one').val() || !$('#crossover_description_two').val() || !$('#crossover_description_three').val() || !$('#crossover_item_type').val() || !$('#crossover_minimum_grade').val() || !$('#crossover_autographed').val() || !$('#crossover_authenticator_name').val() || !$('#crossover_estimated_value').val() || !$('#crossover_authenticator_cert_no').val() ){
                        $(this).attr("type","button");
                        $('#warning_text_box').show();
                    }else {
                        $('#warning_text_box').hide();
                        $(this).attr("type","submit");
                    }
                }
            } else {
                $(this).attr("type","button");
            }
            // if(!$('#quantity-input-box').val()){
            //     $(this).attr("type","button");
            //     $('#quantity-warning-text').show();
            // }else {
            //     $('#quantity-warning-text').hide();
            //     $(this).attr("type","submit");
            // }
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

        $('#itemSelect').on('change', function() {
            let value = this.value;
            if(value == 'Card'){
                $('#showItemTypeCardBox').show();
                showItemTypeCardBox = true;
                $('#showItemTypeAutoAthenticationBox').hide();
                $('#showItemTypeCombinedServiceBox').hide();
                $('#showItemTypeReholderBox').hide();
                $('#showItemTypeCrossoverBoxTwo').hide();
                $('#showItemTypeCrossoverBoxOne').hide();
                showItemTypeAutoAthenticationBox= false;
                showItemTypeCombinedServiceBox= false;
                showItemTypeReholderBox= false;
                showItemTypeCrossoverBoxTwo= false;
                showItemTypeCrossoverBoxOne= false;
            }

            if(value == 'Auto Authentication'){
                $('#showItemTypeCardBox').hide();
                $('#showItemTypeAutoAthenticationBox').show();
                showItemTypeAutoAthenticationBox = true;
                $('#showItemTypeCombinedServiceBox').hide();
                $('#showItemTypeReholderBox').hide();
                $('#showItemTypeCrossoverBoxTwo').hide();
                $('#showItemTypeCrossoverBoxOne').hide();
                showItemTypeCardBox = false;
                showItemTypeCombinedServiceBox= false;
                showItemTypeReholderBox= false;
                showItemTypeCrossoverBoxTwo= false;
                showItemTypeCrossoverBoxOne= false;
            }

            if(value == 'Combined Service'){
                $('#showItemTypeCardBox').hide();
                $('#showItemTypeAutoAthenticationBox').hide();
                $('#showItemTypeCombinedServiceBox').show();
                showItemTypeCombinedServiceBox = true;
                $('#showItemTypeReholderBox').hide();
                $('#showItemTypeCrossoverBoxTwo').hide();
                $('#showItemTypeCrossoverBoxOne').hide();
                showItemTypeCardBox = false;
                showItemTypeAutoAthenticationBox= false;
                showItemTypeReholderBox= false;
                showItemTypeCrossoverBoxTwo= false;
                showItemTypeCrossoverBoxOne= false;
            }

            if(value == 'Reholder'){
                $('#showItemTypeCardBox').hide();
                $('#showItemTypeAutoAthenticationBox').hide();
                $('#showItemTypeCombinedServiceBox').hide();
                $('#showItemTypeReholderBox').show();
                showItemTypeReholderBox = true;
                $('#showItemTypeCrossoverBoxTwo').hide();
                $('#showItemTypeCrossoverBoxOne').hide();
                showItemTypeCardBox = false;
                showItemTypeAutoAthenticationBox= false;
                showItemTypeCombinedServiceBox= false;
                showItemTypeCrossoverBoxTwo= false;
                showItemTypeCrossoverBoxOne= false;
            }
            if(value == 'Crossover'){
                $('#showItemTypeCardBox').hide();
                $('#showItemTypeAutoAthenticationBox').hide();
                $('#showItemTypeCombinedServiceBox').hide();
                $('#showItemTypeReholderBox').hide();
                $('#showItemTypeCrossoverBoxTwo').show();
                $('#showItemTypeCrossoverBoxOne').show();
                showItemTypeCrossoverBoxOne =true;
                showItemTypeCrossoverBoxTwo =true;
                showItemTypeCardBox = false;
                showItemTypeAutoAthenticationBox= false;
                showItemTypeCombinedServiceBox= false;
                showItemTypeReholderBox= false;
            }
        });

        $('.form-check').on('change', function(){
            this.value = this.checked ? 1 : 0;
            // alert(this.value);
        }).change();


        //edit
        $('#add_item_submit_btn').on('click', function (e) {
            // e.preventDefault();
            console.log('clicked add item')

            if(notSelected){
                if (showItemTypeCardBox){
                    console.log('showItemTypeCardBox  '+showItemTypeCardBox)

                    if(!$('#card_description_one').val() || !$('#card_description_two').val() || !$('#card_description_three').val() || !$('#card_authenticator_name').val() || !$('#card_authenticator_cert_no').val() || !$('#card_estimated_value').val()){
                        $(this).attr("type","button");
                        $('#warning_text_box').show();
                    }else {
                        $('#warning_text_box').hide();
                        $(this).attr("type","submit");
                    }

                }
                if(showItemTypeAutoAthenticationBox){
                    console.log('showItemTypeAutoAthenticationBox  '+showItemTypeAutoAthenticationBox)

                    if(!$('#auto_authentication_description_one').val() || !$('#auto_authentication_description_two').val() || !$('#auto_authentication_description_three').val() || !$('#auto_authentication_authenticator_name').val() || !$('#auto_authentication_authenticator_cert_no').val() || !$('#auto_authentication_estimated_value').val()){
                        $(this).attr("type","button");
                        $('#warning_text_box').show();
                    }else {
                        $('#warning_text_box').hide();
                        $(this).attr("type","submit");
                    }
                }
                if(showItemTypeCombinedServiceBox){
                    console.log('showItemTypeCombinedServiceBox  '+showItemTypeCombinedServiceBox)

                    if(!$('#combined_service_description_one').val() || !$('#combined_service_description_two').val() || !$('#combined_service_description_three').val() || !$('#combined_service_authenticator_name').val() || !$('#combined_service_authenticator_cert_no').val() || !$('#combined_service_estimated_value').val()){
                        $(this).attr("type","button");
                        $('#warning_text_box').show();
                    }else {
                        $('#warning_text_box').hide();
                        $(this).attr("type","submit");
                    }
                }
                if(showItemTypeReholderBox){
                    console.log('showItemTypeReholderBox  '+showItemTypeReholderBox)

                    if(!$('#reholder_certification_number').val() || !$('#reholder_estimated_value').val() ){
                        $(this).attr("type","button");
                        $('#warning_text_box').show();
                    }else {
                        $('#warning_text_box').hide();
                        $(this).attr("type","submit");
                    }
                }
                if(showItemTypeCrossoverBoxOne || showItemTypeCrossoverBoxTwo){
                    console.log('showItemTypeCrossoverBoxOne  '+showItemTypeCrossoverBoxOne)

                    if(!$('#crossover_description_one').val() || !$('#crossover_description_two').val() || !$('#crossover_description_three').val() || !$('#crossover_item_type').val() || !$('#crossover_minimum_grade').val() || !$('#crossover_autographed').val() || !$('#crossover_authenticator_name').val() || !$('#crossover_estimated_value').val() || !$('#crossover_authenticator_cert_no').val() ){
                        $(this).attr("type","button");
                        $('#warning_text_box').show();
                    }else {
                        $('#warning_text_box').hide();
                        $(this).attr("type","submit");
                    }
                }
            } else {
                $(this).attr("type","button");
            }
            // if(!$('#quantity-input-box').val()){
            //     $(this).attr("type","button");
            //     $('#quantity-warning-text').show();
            // }else {
            //     $('#quantity-warning-text').hide();
            //     $(this).attr("type","submit");
            // }
        });
        $('#editItemSelect').on('change', function() {
            let value = this.value;
            if(value == 'Card'){
                $('#showItemTypeCardBox').show();
                showItemTypeCardBox = true;
                $('#showItemTypeAutoAthenticationBox').hide();
                $('#showItemTypeCombinedServiceBox').hide();
                $('#showItemTypeReholderBox').hide();
                $('#showItemTypeCrossoverBoxTwo').hide();
                $('#showItemTypeCrossoverBoxOne').hide();
                showItemTypeAutoAthenticationBox= false;
                showItemTypeCombinedServiceBox= false;
                showItemTypeReholderBox= false;
                showItemTypeCrossoverBoxTwo= false;
                showItemTypeCrossoverBoxOne= false;
            }

            if(value == 'Auto Authentication'){
                $('#showItemTypeCardBox').hide();
                $('#showItemTypeAutoAthenticationBox').show();
                showItemTypeAutoAthenticationBox = true;
                $('#showItemTypeCombinedServiceBox').hide();
                $('#showItemTypeReholderBox').hide();
                $('#showItemTypeCrossoverBoxTwo').hide();
                $('#showItemTypeCrossoverBoxOne').hide();
                showItemTypeCardBox = false;
                showItemTypeCombinedServiceBox= false;
                showItemTypeReholderBox= false;
                showItemTypeCrossoverBoxTwo= false;
                showItemTypeCrossoverBoxOne= false;
            }

            if(value == 'Combined Service'){
                $('#showItemTypeCardBox').hide();
                $('#showItemTypeAutoAthenticationBox').hide();
                $('#showItemTypeCombinedServiceBox').show();
                showItemTypeCombinedServiceBox = true;
                $('#showItemTypeReholderBox').hide();
                $('#showItemTypeCrossoverBoxTwo').hide();
                $('#showItemTypeCrossoverBoxOne').hide();
                showItemTypeCardBox = false;
                showItemTypeAutoAthenticationBox= false;
                showItemTypeReholderBox= false;
                showItemTypeCrossoverBoxTwo= false;
                showItemTypeCrossoverBoxOne= false;
            }

            if(value == 'Reholder'){
                $('#showItemTypeCardBox').hide();
                $('#showItemTypeAutoAthenticationBox').hide();
                $('#showItemTypeCombinedServiceBox').hide();
                $('#showItemTypeReholderBox').show();
                showItemTypeReholderBox = true;
                $('#showItemTypeCrossoverBoxTwo').hide();
                $('#showItemTypeCrossoverBoxOne').hide();
                showItemTypeCardBox = false;
                showItemTypeAutoAthenticationBox= false;
                showItemTypeCombinedServiceBox= false;
                showItemTypeCrossoverBoxTwo= false;
                showItemTypeCrossoverBoxOne= false;
            }
            if(value == 'Crossover'){
                $('#showItemTypeCardBox').hide();
                $('#showItemTypeAutoAthenticationBox').hide();
                $('#showItemTypeCombinedServiceBox').hide();
                $('#showItemTypeReholderBox').hide();
                $('#showItemTypeCrossoverBoxTwo').show();
                $('#showItemTypeCrossoverBoxOne').show();
                showItemTypeCrossoverBoxOne =true;
                showItemTypeCrossoverBoxTwo =true;
                showItemTypeCardBox = false;
                showItemTypeAutoAthenticationBox= false;
                showItemTypeCombinedServiceBox= false;
                showItemTypeReholderBox= false;
            }
        });
    </script>
@endpush
