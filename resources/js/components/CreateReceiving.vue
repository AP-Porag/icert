<template>
    <div class="row">
        <form action="" id="myForm">
            <div class="col-md-12" v-for="(item,index) in form_data.items" :key="index">
                <!--            :set="item = v$.form_data.items.$each[index]"-->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-sm btn-danger" @click="deleteGroup(index)" style="margin-bottom: 15px;"><i class="fa fa-trash"></i> Delete</button>
                        </div>
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
                                                    <select class="form-select mb-text-only" required aria-label="Default select example"
                                                            v-model.trim="item.itemType"
                                                            @change="itemTypeChangeEvent(index,item.itemType)"
                                                    >
                                                        <option selected disabled>Open this select menu</option>
                                                        <option v-for="(type,index) in itemTypes" :value="type.name" :key="type.id">{{type.name}}</option>
                                                    </select>
                                                    <div class="error" v-if="!item.itemType.required && show_error_eleven">
                                                        Item type is required
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6" v-if="item.showItemTypeCrossoverBox">
                                                <div class="mb-3">
                                                    <label class="form-label w-100 text-capitalize">
                                                        Crossover Item Type
                                                        <span class="error">*</span>
                                                    </label>
                                                    <select class="form-select mb-text-only" required aria-label="Default select example"
                                                            v-model.trim="item.crossover_item_type"
                                                    >
                                                        <option selected disabled>Open this select menu</option>
                                                        <option v-for="(coType,index) in crossoverItemTypes" :value="coType.name" :key="coType.id">{{coType.name}}</option>
                                                    </select>
                                                    <!--                                            <Select2 v-model="form_data.crossover_item_type" :options="crossoverItemTypes" />-->
<!--                                                    <div class="error" v-if="item.crossover_item_type.required && show_error_sixteen">-->
<!--                                                        Crossover item type is required-->
<!--                                                    </div>-->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--item type card-->
                            <div class="col-md-12" v-if="item.showItemTypeCardBox">
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
                                                        v-model.trim="form_data.item_qty"
                                                        readonly
                                                    />
                                                    <!--                                                <div class="error" v-if="v$.form_data.contact_name.required && show_error_one">-->
                                                    <!--                                                    contact name is required-->
                                                    <!--                                                </div>-->
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
                                                                required
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.card_description_one"
                                                            />
                                                            <div class="error" v-if="item.card_description_one.required && show_error_twelve">
                                                                Description one is required
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Description #2
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.card_description_two"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.card_description_two.required && show_error_twelve">-->
                                                            <!--                                                            Description two is required-->
                                                            <!--                                                        </div>-->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Description #3
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.card_description_three"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.card_description_three.required && show_error_twelve">-->
                                                            <!--                                                            Description three is required-->
                                                            <!--                                                        </div>-->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Serial Number   (Only if printed directly on item)
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.card_serial_number"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.card_serial_number.required && show_error_twelve">-->
                                                            <!--                                                            Serial number is required-->
                                                            <!--                                                        </div>-->
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
                                                                        v-model.trim="item.card_autographed"
                                                                    />
                                                                    <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required && show_error">-->
                                                                    <!--                                                Same as Billing is required-->
                                                                    <!--                                            </div>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label w-100 text-capitalize">
                                                                        Authenticator Name
                                                                        <span class="error" v-if="item.card_autographed">*</span>
                                                                    </label>
                                                                    <select class="form-select mb-text-only" :required="item.card_autographed" aria-label="Default select example"
                                                                            v-model.trim="item.card_authenticator_name"
                                                                    >
                                                                        <option selected disabled>Open this select menu</option>
                                                                        <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>
                                                                    </select>
                                                                    <!--                                                            <Select2 v-model="form_data.authenticator_name" :options="authenticators" />-->
                                                                    <div class="error" v-if="item.card_authenticator_name.required && show_error_twelve">
                                                                        Authenticator name is required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label w-100">
                                                                        Authenticator Cert. No.
                                                                        <span class="error" v-if="item.card_autographed">*</span>
                                                                    </label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        placeholder=""
                                                                        v-model.trim="item.card_authenticator_cert_no"
                                                                        :required="item.card_autographed"
                                                                    />
                                                                    <div class="error" v-if="item.card_authenticator_cert_no.required && show_error_twelve">
                                                                        Authenticator cert no. is required
                                                                    </div>
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
                                                        required
                                                        type="number"
                                                        class="form-control"
                                                        placeholder=""
                                                        v-model.trim="item.card_estimated_value"
                                                    />
                                                    <div class="error" v-if="item.card_estimated_value.required && show_error_twelve">
                                                        Estimated value is required
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--item type auto authentication-->
                            <div class="col-md-12" v-if="item.showItemTypeAutoAthenticationBox">
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
                                                        v-model.trim="form_data.item_qty"
                                                        readonly
                                                    />
                                                    <!--                                                <div class="error" v-if="v$.form_data.contact_name.required && show_error_one">-->
                                                    <!--                                                    contact name is required-->
                                                    <!--                                                </div>-->
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
                                                                required
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.auto_authentication_description_one"
                                                            />
                                                            <div class="error" v-if="item.auto_authentication_description_one.required && show_error_thirteen">
                                                                Description one is required
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Description #2
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.auto_authentication_description_two"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.auto_authentication_description_two.required && show_error_thirteen">-->
                                                            <!--                                                            Description two is required-->
                                                            <!--                                                        </div>-->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Description #3
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.auto_authentication_description_three"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.auto_authentication_description_three.required && show_error_thirteen">-->
                                                            <!--                                                            Description three is required-->
                                                            <!--                                                        </div>-->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Serial Number   (Only if printed directly on item)
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.auto_authentication_serial_number"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.contact_name.required && show_error_one">-->
                                                            <!--                                                            contact name is required-->
                                                            <!--                                                        </div>-->
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
                                                                        v-model.trim="item.auto_authentication_autographed"
                                                                    />
                                                                    <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required && show_error">-->
                                                                    <!--                                                Same as Billing is required-->
                                                                    <!--                                            </div>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label w-100 text-capitalize">
                                                                        Authenticator Name
                                                                        <span class="error" v-if="item.auto_authentication_autographed">*</span>
                                                                    </label>
                                                                    <select class="form-select mb-text-only" :required="item.auto_authentication_autographed" aria-label="Default select example"
                                                                            v-model.trim="item.auto_authentication_authenticator_name"
                                                                    >
                                                                        <option selected disabled>Open this select menu</option>
                                                                        <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>
                                                                    </select>
                                                                    <!--                                                            <Select2 v-model="form_data.authenticator_name_two" :options="authenticators" />-->
                                                                    <div class="error" v-if="item.auto_authentication_authenticator_name.required && show_error_thirteen">
                                                                        Authenticator name is required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label w-100">
                                                                        Authenticator Cert. No.
                                                                        <span class="error" v-if="item.auto_authentication_autographed">*</span>
                                                                    </label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        placeholder=""
                                                                        v-model.trim="item.auto_authentication_authenticator_cert_no"
                                                                        :required="item.auto_authentication_autographed"
                                                                    />
                                                                    <div class="error" v-if="item.auto_authentication_authenticator_cert_no.required && show_error_thirteen">
                                                                        Authenticator cert. no. is required
                                                                    </div>
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
                                                        required
                                                        type="number"
                                                        class="form-control"
                                                        placeholder=""
                                                        v-model.trim="item.auto_authentication_estimated_value"
                                                    />
                                                    <div class="error" v-if="item.auto_authentication_estimated_value.required && show_error_thirteen">
                                                        Estimated value is required
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--item type combined service-->
                            <div class="col-md-12" v-if="item.showItemTypeCombinedServiceBox">
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
                                                        v-model.trim="form_data.item_qty"
                                                        readonly
                                                    />
                                                    <!--                                                <div class="error" v-if="v$.form_data.contact_name.required && show_error_one">-->
                                                    <!--                                                    contact name is required-->
                                                    <!--                                                </div>-->
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
                                                                required
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.combined_service_description_one"
                                                            />
                                                            <div class="error" v-if="item.combined_service_description_one.required && show_error_fourteen">
                                                                Description one is required
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Description #2
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.combined_service_description_two"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.combined_service_description_two.required && show_error_fourteen">-->
                                                            <!--                                                            Description two is required-->
                                                            <!--                                                        </div>-->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Description #3
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.combined_service_description_three"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.combined_service_description_three.required && show_error_fourteen">-->
                                                            <!--                                                            Description three is required-->
                                                            <!--                                                        </div>-->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Serial Number   (Only if printed directly on item)
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.combined_service_serial_number"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.contact_name.required && show_error_one">-->
                                                            <!--                                                            contact name is required-->
                                                            <!--                                                        </div>-->
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
                                                                        v-model.trim="item.combined_service_autographed"
                                                                    />
                                                                    <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required && show_error">-->
                                                                    <!--                                                Same as Billing is required-->
                                                                    <!--                                            </div>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label w-100 text-capitalize">
                                                                        Authenticator Name
                                                                        <span class="error" v-if="item.combined_service_autographed">*</span>
                                                                    </label>
                                                                    <select class="form-select mb-text-only" :required="item.combined_service_autographed" aria-label="Default select example"
                                                                            v-model.trim="item.combined_service_authenticator_name"
                                                                    >
                                                                        <option selected disabled>Open this select menu</option>
                                                                        <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>
                                                                    </select>
                                                                    <!--                                                            <Select2 v-model="form_data.authenticator_name_two" :options="authenticators" />-->
                                                                    <div class="error" v-if="item.combined_service_authenticator_name.required && show_error_fourteen">
                                                                        Authenticator Name is required
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label w-100">
                                                                        Authenticator Cert. No.
                                                                        <span class="error" v-if="item.combined_service_autographed">*</span>
                                                                    </label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        placeholder=""
                                                                        v-model.trim="item.combined_service_authenticator_cert_no"
                                                                        :required="item.combined_service_autographed"
                                                                    />
                                                                    <div class="error" v-if="item.combined_service_authenticator_cert_no.required && show_error_fourteen">
                                                                        Authenticator cert. no. is required
                                                                    </div>
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
                                                        required
                                                        type="number"
                                                        class="form-control"
                                                        placeholder=""
                                                        v-model.trim="item.combined_service_estimated_value"
                                                    />
                                                    <div class="error" v-if="item.combined_service_estimated_value.required && show_error_fourteen">
                                                        Estimated value is required
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--item type reholder-->
                            <div class="col-md-12" v-if="item.showItemTypeReholderBox">
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
                                                        v-model.trim="form_data.item_qty"
                                                        readonly
                                                    />
                                                    <!--                                                <div class="error" v-if="v$.form_data.contact_name.required && show_error_one">-->
                                                    <!--                                                    contact name is required-->
                                                    <!--                                                </div>-->
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
                                                                required
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.reholder_certification_number"
                                                            />
                                                            <div class="error" v-if="item.reholder_certification_number.required && show_error_fifteen">
                                                                Certification number is required
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
                                                        required
                                                        type="number"
                                                        class="form-control"
                                                        placeholder=""
                                                        v-model.trim="item.reholder_estimated_value"
                                                    />
                                                    <div class="error" v-if="item.reholder_estimated_value.required && show_error_fifteen">
                                                        Estimated value is required
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--item type crossover-->
                            <div class="col-md-12" v-if="item.showItemTypeCrossoverBox">
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
                                                        v-model.trim="form_data.item_qty"
                                                        readonly
                                                    />
                                                    <!--                                                <div class="error" v-if="v$.form_data.contact_name.required && show_error_one">-->
                                                    <!--                                                    contact name is required-->
                                                    <!--                                                </div>-->
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
                                                                required
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.crossover_description_one"
                                                            />
<!--                                                            <div class="error" v-if="item.crossover_description_one.required && show_error_sixteen">-->
<!--                                                                Description one is required-->
<!--                                                            </div>-->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Description #2
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.crossover_description_two"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.crossover_description_two.required && show_error_sixteen">-->
                                                            <!--                                                            Description two is required-->
                                                            <!--                                                        </div>-->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Description #3
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.crossover_description_three"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.crossover_description_three.required && show_error_sixteen">-->
                                                            <!--                                                            Description three is required-->
                                                            <!--                                                        </div>-->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100">
                                                                Serial Number   (Only if printed directly on item)
                                                                <!--                                                            <span class="error">*</span>-->
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.crossover_serial_number"
                                                            />
                                                            <!--                                                        <div class="error" v-if="v$.form_data.contact_name.required && show_error_one">-->
                                                            <!--                                                            contact name is required-->
                                                            <!--                                                        </div>-->
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
                                                                        v-model.trim="item.crossover_autographed"
                                                                    />
                                                                    <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required && show_error">-->
                                                                    <!--                                                Same as Billing is required-->
                                                                    <!--                                            </div>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label w-100 text-capitalize">
                                                                        Authenticator Name
                                                                        <span class="error" v-if="item.crossover_autographed">*</span>
                                                                    </label>
                                                                    <select class="form-select mb-text-only" :required="item.crossover_autographed" aria-label="Default select example"
                                                                            v-model.trim="item.crossover_authenticator_name"
                                                                    >
                                                                        <option selected disabled>Open this select menu</option>
                                                                        <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>
                                                                    </select>
                                                                    <!--                                                            <Select2 v-model="form_data.authenticator_name_two" :options="authenticators" />-->
<!--                                                                    <div class="error" v-if="item.crossover_authenticator_name.required && show_error_sixteen">-->
<!--                                                                        Authenticator Name is required-->
<!--                                                                    </div>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label w-100">
                                                                        Authenticator Cert. No.
                                                                        <span class="error" v-if="item.crossover_autographed">*</span>
                                                                    </label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        placeholder=""
                                                                        v-model.trim="item.crossover_authenticator_cert_no"
                                                                        :required="item.crossover_autographed"
                                                                    />
<!--                                                                    <div class="error" v-if="item.crossover_authenticator_cert_no.required && show_error_sixteen">-->
<!--                                                                        Authenticator cert. no. is required-->
<!--                                                                    </div>-->
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
                                                                required
                                                                type="number"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="item.crossover_estimated_value"
                                                            />
<!--                                                            <div class="error" v-if="item.crossover_estimated_value.required && show_error_sixteen">-->
<!--                                                                Estimated value is required-->
<!--                                                            </div>-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label w-100 text-capitalize">
                                                                Minimum Grade
                                                                <span class="error">*</span>
                                                            </label>
                                                            <select class="form-select mb-text-only" aria-label="Default select example"
                                                                    v-model.trim="item.crossover_minimum_grade"
                                                            >
                                                                <option selected disabled>Open this select menu</option>
                                                                <option v-for="(grade,index) in minimumGrades" :value="grade.id" :key="grade.id">{{grade.name}}</option>
                                                            </select>
                                                            <!--                                                    <Select2 v-model="form_data.minimum_grade" :options="minimumGrades" />-->
<!--                                                            <div class="error" v-if="item.crossover_minimum_grade.required && show_error_sixteen">-->
<!--                                                                Minimum grade is required-->
<!--                                                            </div>-->
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
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 15px;">
                <div class="d-flex justify-content-end">
                    <button v-on:click="addGroup" type="button" class="btn btn-info" style="margin-right: 15px;">Add New Item</button>
                    <button v-on:click="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import VuePhoneNumberInput from 'vue-phone-number-input';
import { useVuelidate } from '@vuelidate/core'
import {required, email, requiredIf, numeric} from '@vuelidate/validators'
// import {isReadonly} from "vue";


export default {
    name: "CreateReceiving",
    props: ["authenticators","entr"],
    components: {
        VuePhoneNumberInput,
    },
    setup: () => ({ v$: useVuelidate() }),
    data(){
        return{
            show_error_one: false,
            show_error_two: false,
            show_error_three: false,
            show_error_four: false,
            show_error_five: false,
            show_error_six: false,
            show_error_seven: false,
            show_error_eight: false,
            show_error_nine: false,
            show_error_ten: false,
            show_error_eleven: false,
            show_error_twelve: false,
            show_error_thirteen: false,
            show_error_fourteen: false,
            show_error_fifteen: false,
            show_error_sixteen: false,
            isReadonly:false,
            step_count:4,
            completed_step_count:'',
            form_wizard_subtitle:'Start here',
            countries:[
                {
                    "id": 1,
                    "name": "Canada"
                },
                {
                    "id": 2,
                    "name": "United States"
                },
                {
                    "id": 3,
                    "name": "Australia"
                },
                {
                    "id": 4,
                    "name": "New Zealand"
                },
                {
                    "id": 5,
                    "name": "United Kingdom"
                }
            ],
            countries_phone:['CA','US','AU','NZ','GB'],
            provinces:[
                {
                    "id": 1,
                    "name": "AB"
                },
                {
                    "id": 2,
                    "name": "BC"
                },
                {
                    "id": 3,
                    "name": "MB"
                },
                {
                    "id": 4,
                    "name": "NB"
                },
                {
                    "id": 5,
                    "name": "NL"
                },
                {
                    "id": 6,
                    "name": "NS"
                },
                {
                    "id": 7,
                    "name": "NT"
                },
                {
                    "id": 8,
                    "name": "NU"
                },
                {
                    "id": 9,
                    "name": "ON"
                },
                {
                    "id": 10,
                    "name": "PE"
                },
                {
                    "id": 11,
                    "name": "QC"
                },
                {
                    "id": 12,
                    "name": "SK"
                },
                {
                    "id": 13,
                    "name": "YT"
                },
                {
                    "id": 14,
                    "name": "AK"
                },
                {
                    "id": 15,
                    "name": "AL"
                },
                {
                    "id": 16,
                    "name": "AR"
                },
                {
                    "id": 17,
                    "name": "AZ"
                },
                {
                    "id": 18,
                    "name": "CA"
                },
                {
                    "id": 19,
                    "name": "CO"
                },
                {
                    "id": 20,
                    "name": "CT"
                },
                {
                    "id": 21,
                    "name": "DC"
                },
                {
                    "id": 22,
                    "name": "DE"
                },
                {
                    "id": 23,
                    "name": "FL"
                },
                {
                    "id": 24,
                    "name": "GA"
                },
                {
                    "id": 25,
                    "name": "HI"
                },
                {
                    "id": 26,
                    "name": "IA"
                },
                {
                    "id": 27,
                    "name": "ID"
                },
                {
                    "id": 28,
                    "name": "IL"
                },
                {
                    "id": 29,
                    "name": "IN"
                },
                {
                    "id": 30,
                    "name": "KS"
                },
                {
                    "id": 31,
                    "name": "KY"
                },
                {
                    "id": 32,
                    "name": "LA"
                },
                {
                    "id": 33,
                    "name": "MA"
                },
                {
                    "id": 34,
                    "name": "MD"
                },
                {
                    "id": 35,
                    "name": "ME"
                },
                {
                    "id": 36,
                    "name": "MI"
                },
                {
                    "id": 37,
                    "name": "MN"
                },
                {
                    "id": 38,
                    "name": "MO"
                },
                {
                    "id": 39,
                    "name": "MS"
                },
                {
                    "id": 40,
                    "name": "MT"
                },
                {
                    "id": 41,
                    "name": "NC"
                },
                {
                    "id": 42,
                    "name": "ND"
                },
                {
                    "id": 43,
                    "name": "NE"
                },
                {
                    "id": 44,
                    "name": "NH"
                },
                {
                    "id": 45,
                    "name": "NJ"
                },
                {
                    "id": 46,
                    "name": "NM"
                },
                {
                    "id": 47,
                    "name": "NV"
                },
                {
                    "id": 48,
                    "name": "NY"
                },
                {
                    "id": 49,
                    "name": "OH"
                },
                {
                    "id": 50,
                    "name": "OK"
                },
                {
                    "id": 51,
                    "name": "OR"
                },
                {
                    "id": 52,
                    "name": "PA"
                },
                {
                    "id": 53,
                    "name": "RI"
                },
                {
                    "id": 54,
                    "name": "SC"
                },
                {
                    "id": 55,
                    "name": "SD"
                },
                {
                    "id": 56,
                    "name": "TN"
                },
                {
                    "id": 57,
                    "name": "TX"
                },
                {
                    "id": 58,
                    "name": "UT"
                },
                {
                    "id": 59,
                    "name": "VA"
                },
                {
                    "id": 60,
                    "name": "VT"
                },
                {
                    "id": 61,
                    "name": "WA"
                },
                {
                    "id": 62,
                    "name": "WI"
                },
                {
                    "id": 63,
                    "name": "WV"
                },
                {
                    "id": 64,
                    "name": "WY"
                },
                {
                    "id": 65,
                    "name": "ACT"
                },
                {
                    "id": 66,
                    "name": "NSW"
                },
                {
                    "id": 67,
                    "name": "NT"
                },
                {
                    "id": 68,
                    "name": "SA"
                },
                {
                    "id": 69,
                    "name": "TAS"
                },
                {
                    "id": 70,
                    "name": "VIC"
                },
                {
                    "id": 71,
                    "name": "WA"
                }
            ],
            isAllSelected: false,
            shippingMethods: [
                {
                    'id':1,
                    'name':'Delivery',
                },
                {
                    'id':2,
                    'name':'Pickup',
                },
                {
                    'id':3,
                    'name':'Show Pickup',
                },
                {
                    'id':4,
                    'name':'Return to Third Party',
                },
                {
                    'id':5,
                    'name':'Canada Post',
                },
                {
                    'id':6,
                    'name':'DHL',
                },
                {
                    'id':7,
                    'name':'FedEx',
                },
                {
                    'id':8,
                    'name':'Purolator',
                },
                {
                    'id':9,
                    'name':'UPS',
                },
            ],
            pickUpLocations: [
                {
                    'id':1,
                    'name':'KSA',
                },
                {
                    'id':2,
                    'name':'KSA Booth',
                },
                {
                    'id':3,
                    'name':'KSA West',
                },
                {
                    'id':4,
                    'name':'iCert',
                },
                {
                    'id':5,
                    'name':'iCert Booth',
                },
            ],
            gradingLocations: [
                {
                    'id':1,
                    'name':'KSA',
                },
                {
                    'id':2,
                    'name':'KSA Show',
                },
                {
                    'id':3,
                    'name':'KSA West',
                },
                {
                    'id':4,
                    'name':'iCert',
                },
                {
                    'id':5,
                    'name':'iCert Show',
                },
            ],
            showPickupLocationBox:false,
            showShowPickupLocationBox:false,
            showThirdPartyBox:false,
            showUPSBox:false,

            showItemTypeCardBox:false,
            showItemTypeAutoAthenticationBox:false,
            showItemTypeCombinedServiceBox:false,
            showItemTypeReholderBox:false,
            showItemTypeCrossoverBox:false,

            itemTypes:[
                {
                    'id':1,
                    'name':'Card',
                },
                {
                    'id':2,
                    'name':'Auto Authentication',
                },
                {
                    'id':3,
                    'name':'Combined Service',
                },
                {
                    'id':4,
                    'name':'Reholder',
                },
                {
                    'id':5,
                    'name':'Crossover',
                },
            ],
            crossoverItemTypes:[
                {
                    'id':1,
                    'name':'Card'
                }
            ],
            minimumGrades:[
                {
                    'id':1,
                    'name':'0'
                },
                {
                    'id':2,
                    'name':'1'
                },
                {
                    'id':3,
                    'name':'1.5'
                },
                {
                    'id':4,
                    'name':'2'
                },
                {
                    'id':5,
                    'name':'2.5'
                },
                {
                    'id':6,
                    'name':'3'
                },
                {
                    'id':7,
                    'name':'3.5'
                },
                {
                    'id':8,
                    'name':'4'
                },
                {
                    'id':9,
                    'name':'4.5'
                },
                {
                    'id':10,
                    'name':'5'
                },
                {
                    'id':11,
                    'name':'5.5'
                },
                {
                    'id':12,
                    'name':'6'
                },
                {
                    'id':13,
                    'name':'6.5'
                },
                {
                    'id':14,
                    'name':'7'
                },
                {
                    'id':15,
                    'name':'7.5'
                },
                {
                    'id':16,
                    'name':'8'
                },
                {
                    'id':17,
                    'name':'8.5'
                },
                {
                    'id':18,
                    'name':'9'
                },
                {
                    'id':19,
                    'name':'9.5'
                },
                {
                    'id':20,
                    'name':'10'
                },
                {
                    'id':21,
                    'name':'10 (P)'
                },
            ],
            form_data:{
                customerId: '',
                entryID:'',
                item_qty:1,
                items:[
                    {
                        itemType:'',
                        //item type card
                        card_description_one:'',
                        card_description_two:'',
                        card_description_three:'',
                        card_serial_number:'',
                        card_autographed:'',
                        card_authenticator_name:'',
                        card_authenticator_cert_no:'',
                        card_estimated_value:'',

                        //item type auto authentication
                        auto_authentication_description_one:'',
                        auto_authentication_description_two:'',
                        auto_authentication_description_three:'',
                        auto_authentication_serial_number:'',
                        auto_authentication_autographed:'',
                        auto_authentication_authenticator_name:'',
                        auto_authentication_authenticator_cert_no:'',
                        auto_authentication_estimated_value:'',

                        //item type combined service
                        combined_service_description_one:'',
                        combined_service_description_two:'',
                        combined_service_description_three:'',
                        combined_service_serial_number:'',
                        combined_service_autographed:'',
                        combined_service_authenticator_name:'',
                        combined_service_authenticator_cert_no:'',
                        combined_service_estimated_value:'',

                        //item type combined service
                        reholder_certification_number:'',
                        reholder_estimated_value:'',

                        //item type crossover
                        crossover_description_one:'',
                        crossover_description_two:'',
                        crossover_description_three:'',
                        crossover_serial_number:'',
                        crossover_autographed:'',
                        crossover_authenticator_name:'',
                        crossover_authenticator_cert_no:'',
                        crossover_estimated_value:'',
                        crossover_item_type:'',
                        crossover_minimum_grade:'',

                        //card box type
                        showItemTypeCardBox:false,
                        showItemTypeAutoAthenticationBox:false,
                        showItemTypeCombinedServiceBox:false,
                        showItemTypeReholderBox:false,
                        showItemTypeCrossoverBox:false,
                    }
                ]
            },

        }
    },
    methods:{
        async submit(e){

            const form = document.getElementById('myForm');

            const requiredFields = form.querySelectorAll('[required]');

            requiredFields.forEach((field) => {
                if (field.value.trim() === '') {

                }else {
                    e.preventDefault()

                    console.log('submit')
                    Swal.fire({
                        // title: "Are the selected product offerings applicable for drop off center: <br> West's Card Edmonton",
                        // title: `Do you want to save this receiving: <br> ${this.form_data.name}`,
                        title: `Do you want to save this receiving`,
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        denyButtonText: `No`,
                        icon: "question",
                    }).then((result) => {
                        console.log(result)
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            // Swal.fire("Saved!", "", "success");
                            // window.location.href = `/admin/entries/10`;
                            // Submit form

                            axios
                                .post("/admin/receiving", this.form_data)
                                .then(function (response) {
                                    console.log(response)
                                    Swal.fire("Saved!", "", "success").then((result)=>{
                                        if (result.isConfirmed){
                                            if (response.status == 200){
                                                window.location.href = `/admin/receiving/${response.data.data.id}`;
                                            }
                                        }
                                    });
                                })
                                .catch(function (err) {
                                    try {
                                        self.showValidationError(err);
                                    } catch (e) {
                                        self.showSomethingWrong();
                                    }
                                });
                            // Swal.fire("Saved!", "", "success");
                        }else if (result.isDismissed){
                            window.location.href = "/admin/receiving";
                        }else if (result.isDenied) {
                            console.log(result.isDenied)
                            // Swal.fire("Changes are not saved", "", "info");
                        }
                    });
                }
            });


            // if (this.checkSeventhStep()){
            //
            //     Swal.fire({
            //         // title: "Are the selected product offerings applicable for drop off center: <br> West's Card Edmonton",
            //         // title: `Do you want to save this receiving: <br> ${this.form_data.name}`,
            //         title: `Do you want to save this receiving`,
            //         showDenyButton: true,
            //         showCancelButton: true,
            //         confirmButtonText: "Yes",
            //         denyButtonText: `No`,
            //         icon: "question",
            //     }).then((result) => {
            //         console.log(result)
            //         /* Read more about isConfirmed, isDenied below */
            //         if (result.isConfirmed) {
            //             // Swal.fire("Saved!", "", "success");
            //             // window.location.href = `/admin/entries/10`;
            //             // Submit form
            //
            //             axios
            //                 .post("/admin/receiving", this.form_data)
            //                 .then(function (response) {
            //                     console.log(response)
            //                     Swal.fire("Saved!", "", "success").then((result)=>{
            //                         if (result.isConfirmed){
            //                             if (response.status == 200){
            //                                 window.location.href = `/admin/receiving/${response.data.data.id}`;
            //                             }
            //                         }
            //                     });
            //                 })
            //                 .catch(function (err) {
            //                     try {
            //                         self.showValidationError(err);
            //                     } catch (e) {
            //                         self.showSomethingWrong();
            //                     }
            //                 });
            //             // Swal.fire("Saved!", "", "success");
            //         }else if (result.isDismissed){
            //             window.location.href = "/admin/receiving";
            //         }else if (result.isDenied) {
            //             console.log(result.isDenied)
            //             // Swal.fire("Changes are not saved", "", "info");
            //         }
            //     });
            //
            // }else {
            //     return;
            // }
        },
        checkSeventhStep(){
            this.v$.$touch()
            if (this.v$.form_data.items.$invalid) {
                this.show_error_eleven = true;
                return false;
            }else if (this.v$.form_data.card_description_one.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.card_authenticator_name.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.card_authenticator_cert_no.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.card_estimated_value.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_description_one.$invalid) {
                this.show_error_thirteen = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_authenticator_name.$invalid) {
                this.show_error_thirteen = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_authenticator_cert_no.$invalid) {
                this.show_error_thirteen = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_estimated_value.$invalid) {
                this.show_error_thirteen = true;
                return false;
            }else if (this.v$.form_data.combined_service_description_one.$invalid) {
                this.show_error_fourteen = true;
                return false;
            }else if (this.v$.form_data.combined_service_authenticator_name.$invalid) {
                this.show_error_fourteen = true;
                return false;
            }else if (this.v$.form_data.combined_service_authenticator_cert_no.$invalid) {
                this.show_error_fourteen = true;
                return false;
            }else if (this.v$.form_data.combined_service_estimated_value.$invalid) {
                this.show_error_fourteen = true;
                return false;
            }else if (this.v$.form_data.reholder_certification_number.$invalid) {
                this.show_error_fifteen = true;
                return false;
            }else if (this.v$.form_data.reholder_estimated_value.$invalid) {
                this.show_error_fifteen = true;
                return false;
            }else if (this.v$.form_data.crossover_description_one.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_authenticator_name.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_authenticator_cert_no.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_estimated_value.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_minimum_grade.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_item_type.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else {
                return true;
            }
        },
        sameAsBillingChanged(event){
            if (this.form_data.same_as_billing){
                this.form_data.shipping_address_line_one = this.form_data.billing_address_line_one;
                this.form_data.shipping_address_line_two = this.form_data.billing_address_line_two;
                this.form_data.shipping_country = this.form_data.billing_country;
                this.form_data.shipping_province = this.form_data.billing_province;
                this.form_data.shipping_city = this.form_data.billing_city;
                this.form_data.shipping_postal = this.form_data.billing_postal;
                this.form_data.shipping_phone = this.form_data.billing_phone;
            }else {
                this.form_data.shipping_address_line_one = '';
                this.form_data.shipping_address_line_two = '';
                this.form_data.shipping_country = '';
                this.form_data.shipping_province = '';
                this.form_data.shipping_city = ''
                this.form_data.shipping_postal = '';
                this.form_data.shipping_phone = '';
            }
        },
        handleTabChange(prevIndex, nextIndex){
            console.log('tab change called')
            console.log(prevIndex)
            console.log(nextIndex)
            let focusField = this.$refs.name;
            focusField.focus();
            switch (nextIndex) {
                case 0:
                    focusField.focus()
                    console.log('index 0')
                    console.log(focusField.value)
                    break;
                case 1:
                    focusField = this.$refs.billing_address_line_one;
                    focusField.focus();
                    console.log(focusField.value)
                    console.log('index 1')
                    break;
                case 2:
                    focusField = this.$refs.shipping_name;
                    focusField.focus();
                    console.log(focusField.value)
                    console.log('index 2')
                    break;
            }
        },
        cancel(){
            window.location.assign("/admin/receiving");
        },
        selectAllCats () {
            if (this.isAllSelected) {
                this.form_data.products = []
                this.isAllSelected = false
            } else {
                this.form_data.products = []
                for (let product in this.products) {
                    this.form_data.products.push(this.products[product].id)
                }
                this.isAllSelected = true
            }
        },
        select () {
            if (this.form_data.products.length !== this.products.length) {
                this.isAllSelected = false
            } else {
                this.isAllSelected = true
            }
        },
        async customerNameChangeEvent(){
            let self = this;
            console.log(this.form_data.customer)
            this.form_data.name = this.form_data.customer.name
            this.form_data.customerId = this.form_data.customer.id

            console.log(this.form_data.customerId)
            await axios
                .get(`/admin/entries/get-customer/info/${self.form_data.customerId}`)
                .then(function (res) {
                    // console.log(res)
                    self.form_data.billing_address_line_one = res.data.data.billing_address_line_one
                    self.form_data.billing_address_line_two = res.data.data.billing_address_line_two
                    self.form_data.billing_country = res.data.data.billing_country
                    self.form_data.billing_province = res.data.data.billing_province
                    self.form_data.billing_city = res.data.data.billing_city
                    self.form_data.billing_postal = res.data.data.billing_postal
                    self.form_data.billing_phone = res.data.data.billing_phone
                    // self.form_data.same_as_billing = res.data.data.same_as_billing == 0 ? false: true
                    self.form_data.shipping_name = res.data.data.shipping_name
                    self.form_data.shipping_company_name = res.data.data.shipping_company_name
                    self.form_data.shipping_address_line_one = res.data.data.shipping_address_line_one
                    self.form_data.shipping_address_line_two = res.data.data.shipping_address_line_two
                    self.form_data.shipping_country = res.data.data.shipping_country
                    self.form_data.shipping_province = res.data.data.shipping_province
                    self.form_data.shipping_city = res.data.data.shipping_city
                    self.form_data.shipping_postal = res.data.data.shipping_postal
                    self.form_data.shipping_phone = res.data.data.shipping_phone
                })
                .catch(function (err) {
                    try {
                        self.showValidationError(err);
                    } catch (e) {
                        self.showSomethingWrong();
                    }
                });

        },
        customerNameSelectEvent({id, text}){
            console.log({id, text})
        },
        itemTypeChangeEvent(index,itemType){
            if (this.form_data.items[index].itemType == 'Card'){
                this.form_data.items[index].showItemTypeCardBox=true;
                this.form_data.items[index].showItemTypeAutoAthenticationBox=false;
                this.form_data.items[index].showItemTypeCombinedServiceBox=false;
                this.form_data.items[index].showItemTypeReholderBox=false;
                this.form_data.items[index].showItemTypeCrossoverBox=false;
            }
            console.log(this.form_data.items[index].showItemTypeCardBox)
            if (this.form_data.items[index].itemType == 'Auto Authentication'){
                this.form_data.items[index].showItemTypeCardBox=false;
                this.form_data.items[index].showItemTypeAutoAthenticationBox=true;
                this.form_data.items[index].showItemTypeCombinedServiceBox=false;
                this.form_data.items[index].showItemTypeReholderBox=false;
                this.form_data.items[index].showItemTypeCrossoverBox=false;
            }
            if (this.form_data.items[index].itemType == 'Combined Service'){
                this.form_data.items[index].showItemTypeCardBox=false;
                this.form_data.items[index].showItemTypeAutoAthenticationBox=false;
                this.form_data.items[index].showItemTypeCombinedServiceBox=true;
                this.form_data.items[index].showItemTypeReholderBox=false;
                this.form_data.items[index].showItemTypeCrossoverBox=false;
            }
            if (this.form_data.items[index].itemType == 'Reholder'){
                this.form_data.items[index].showItemTypeCardBox=false;
                this.form_data.items[index].showItemTypeAutoAthenticationBox=false;
                this.form_data.items[index].showItemTypeCombinedServiceBox=false;
                this.form_data.items[index].showItemTypeReholderBox=true;
                this.form_data.items[index].showItemTypeCrossoverBox=false;
            }
            if (this.form_data.items[index].itemType == 'Crossover'){
                this.form_data.items[index].showItemTypeCardBox=false;
                this.form_data.items[index].showItemTypeAutoAthenticationBox=false;
                this.form_data.items[index].showItemTypeCombinedServiceBox=false;
                this.form_data.items[index].showItemTypeReholderBox=false;
                this.form_data.items[index].showItemTypeCrossoverBox=true;
            }
        },
        shippingMethodsChangeEvent(){
            console.log(this.form_data.shipping_method)
            if (this.form_data.shipping_method == 'Pickup'){
                this.showPickupLocationBox=true;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.showUPSBox=false;
            }
            if (this.form_data.shipping_method == 'Show Pickup'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=true;
                this.showThirdPartyBox=false;
                this.showUPSBox=false;
            }
            if (this.form_data.shipping_method == 'Return to Third Party'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=true;
                this.showUPSBox=false;
            }
            if (this.form_data.shipping_method == 'UPS'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.showUPSBox=true;
            }
            if (this.form_data.shipping_method == 'Delivery'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.showUPSBox=false;
            }
            if (this.form_data.shipping_method == 'Canada Post'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.form_data.customer_account_number = '';
                this.showUPSBox=true;
            }
            if (this.form_data.shipping_method == 'DHL'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.form_data.customer_account_number = '';
                this.showUPSBox=true;
            }
            if (this.form_data.shipping_method == 'FedEx'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.form_data.customer_account_number = '';
                this.showUPSBox=true;
            }
            if (this.form_data.shipping_method == 'Purolator'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.form_data.customer_account_number = '';
                this.showUPSBox=true;
            }
        },
        dummyStep(){
            return true;
        },

        addGroup() {
            this.form_data.items.push(
                {
                    itemType:'',
                    //item type card
                    card_description_one:'',
                    card_description_two:'',
                    card_description_three:'',
                    card_serial_number:'',
                    card_autographed:'',
                    card_authenticator_name:'',
                    card_authenticator_cert_no:'',
                    card_estimated_value:'',

                    //item type auto authentication
                    auto_authentication_description_one:'',
                    auto_authentication_description_two:'',
                    auto_authentication_description_three:'',
                    auto_authentication_serial_number:'',
                    auto_authentication_autographed:'',
                    auto_authentication_authenticator_name:'',
                    auto_authentication_authenticator_cert_no:'',
                    auto_authentication_estimated_value:'',

                    //item type combined service
                    combined_service_description_one:'',
                    combined_service_description_two:'',
                    combined_service_description_three:'',
                    combined_service_serial_number:'',
                    combined_service_autographed:'',
                    combined_service_authenticator_name:'',
                    combined_service_authenticator_cert_no:'',
                    combined_service_estimated_value:'',

                    //item type combined service
                    reholder_certification_number:'',
                    reholder_estimated_value:'',

                    //item type crossover
                    crossover_description_one:'',
                    crossover_description_two:'',
                    crossover_description_three:'',
                    crossover_serial_number:'',
                    crossover_autographed:'',
                    crossover_authenticator_name:'',
                    crossover_authenticator_cert_no:'',
                    crossover_estimated_value:'',
                    crossover_item_type:'',
                    crossover_minimum_grade:'',

                    //card box type
                    showItemTypeCardBox:false,
                    showItemTypeAutoAthenticationBox:false,
                    showItemTypeCombinedServiceBox:false,
                    showItemTypeReholderBox:false,
                    showItemTypeCrossoverBox:false,
                }
            )
        },
        deleteGroup(index) {
            this.form_data.items.splice(index,1)
        },
    },

    mounted(){
         this.form_data.entryID =this.entr.id;
        this.form_data.customerId =this.entr.customer_id;
        console.log(this.form_data.entryID)
        console.log(this.form_data.customerId)
    },
    validations: {
        form_data: {

            items:{
                $each:{
                    itemType:{
                        required,
                    },
                    //item type card
                    // card_description_one:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeCardBox // return true if this field is required
                    //     }),
                    // },
                    // // card_description_two:{
                    // //     required: requiredIf(function () {
                    // //         return this.showItemTypeCardBox // return true if this field is required
                    // //     }),
                    // // },
                    // // card_description_three:{
                    // //     required: requiredIf(function () {
                    // //         return this.showItemTypeCardBox // return true if this field is required
                    // //     }),
                    // // },
                    // card_authenticator_name:{
                    //     required: requiredIf(function () {
                    //         return this.form_data.card_autographed;// return true if this field is required
                    //     }),
                    // },
                    // card_authenticator_cert_no:{
                    //     required: requiredIf(function () {
                    //         return this.form_data.card_autographed; // return true if this field is required
                    //     }),
                    // },
                    // card_estimated_value:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeCardBox // return true if this field is required
                    //     }),
                    // },
                    // //item type auto athentication
                    // auto_authentication_description_one:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeAutoAthenticationBox // return true if this field is required
                    //     }),
                    // },
                    // // auto_authentication_description_two:{
                    // //     required: requiredIf(function () {
                    // //         return this.showItemTypeAutoAthenticationBox // return true if this field is required
                    // //     }),
                    // // },
                    // // auto_authentication_description_three:{
                    // //     required: requiredIf(function () {
                    // //         return this.showItemTypeAutoAthenticationBox // return true if this field is required
                    // //     }),
                    // // },
                    // auto_authentication_authenticator_name:{
                    //     required: requiredIf(function () {
                    //         return this.form_data.auto_authentication_autographed; // return true if this field is required
                    //     }),
                    // },
                    // auto_authentication_authenticator_cert_no:{
                    //     required: requiredIf(function () {
                    //         return this.form_data.auto_authentication_autographed; // return true if this field is required
                    //     }),
                    // },
                    // auto_authentication_estimated_value:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeAutoAthenticationBox // return true if this field is required
                    //     }),
                    // },
                    // //item type combined service
                    // combined_service_description_one:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeCombinedServiceBox // return true if this field is required
                    //     }),
                    // },
                    // // combined_service_description_two:{
                    // //     required: requiredIf(function () {
                    // //         return this.showItemTypeCombinedServiceBox // return true if this field is required
                    // //     }),
                    // // },
                    // // combined_service_description_three:{
                    // //     required: requiredIf(function () {
                    // //         return this.showItemTypeCombinedServiceBox // return true if this field is required
                    // //     }),
                    // // },
                    // combined_service_authenticator_name:{
                    //     required: requiredIf(function () {
                    //         return this.form_data.combined_service_autographed; // return true if this field is required
                    //     }),
                    // },
                    // combined_service_authenticator_cert_no:{
                    //     required: requiredIf(function () {
                    //         return this.form_data.combined_service_autographed; // return true if this field is required
                    //     }),
                    // },
                    // combined_service_estimated_value:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeCombinedServiceBox // return true if this field is required
                    //     }),
                    // },
                    // //item type reholder
                    // reholder_certification_number:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeReholderBox // return true if this field is required
                    //     }),
                    // },
                    // reholder_estimated_value:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeReholderBox // return true if this field is required
                    //     }),
                    // },
                    //
                    // //item type crossover
                    // crossover_description_one:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeCrossoverBox // return true if this field is required
                    //     }),
                    // },
                    // // crossover_description_two:{
                    // //     required: requiredIf(function () {
                    // //         return this.showItemTypeCrossoverBox // return true if this field is required
                    // //     }),
                    // // },
                    // // crossover_description_three:{
                    // //     required: requiredIf(function () {
                    // //         return this.showItemTypeCrossoverBox // return true if this field is required
                    // //     }),
                    // // },
                    // crossover_authenticator_name:{
                    //     required: requiredIf(function () {
                    //         return this.form_data.crossover_autographed; // return true if this field is required
                    //     }),
                    // },
                    // crossover_authenticator_cert_no:{
                    //     required: requiredIf(function () {
                    //         return this.form_data.crossover_autographed; // return true if this field is required
                    //     }),
                    // },
                    // crossover_estimated_value:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeCrossoverBox // return true if this field is required
                    //     }),
                    // },
                    // crossover_minimum_grade:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeCrossoverBox // return true if this field is required
                    //     }),
                    // },
                    // crossover_item_type:{
                    //     required: requiredIf(function () {
                    //         return this.showItemTypeCrossoverBox // return true if this field is required
                    //     }),
                    // },
                },
            },
        }
    }

}
</script>

<style scoped>

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

</style>
