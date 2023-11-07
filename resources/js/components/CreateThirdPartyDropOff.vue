<template>
<div class="">
    <form>
        <form-wizard
            @on-complete="submit"
            color="#3476ae"
            :title="`Create Third party with ${step_count} steps`"
            :subtitle="form_wizard_subtitle"
            next-button-text="Continue"
            finish-button-text="Save"
        >
            <tab-content
                title="General Info"
                icon="ti-user"
                :before-change="checkFirstStep"
            >
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shipping_address_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Name
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="name"
                                                v-model.trim="v$.form_data.name.$model"
                                            />
                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">
                                                Name is required
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Email Address
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="email"
                                                class="form-control"
                                                placeholder="email"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100">
                                                Contact Name
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="contact name"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tab-content>
            <tab-content
                title="Billing Address"
                icon="ti-infinite"
                :before-change="checkSecondStep"
            >
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shipping_address_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Address Line one
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="address line one"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Address Line two
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="address line two"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Country
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="country"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Province/State
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="province"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                City
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="city"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                postal/Zip code
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="postal/zip code"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Telephone#
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="telephone"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tab-content>
            <tab-content
                title="Shipping Address"
                icon="ti-map-alt"
                :before-change="checkThirdStep"
            >
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shipping_address_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Customer Name
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="customer name"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Email Address
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="email"
                                                class="form-control"
                                                placeholder="customer email"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100">
                                                Contact Name
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="customer contact name"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card shipping_address_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                Same as billing address
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                placeholder="same as billing address"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Name (if different)
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="name"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Company name
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="company name"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Address Line one
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="address line one"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Address Line two
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="address line two"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Country
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="country"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Province/State
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="province"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                City
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="city"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                postal/Zip code
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="postal/zip code"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Telephone#
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="telephone"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </tab-content>
            <tab-content
                title="Services"
                icon="ti-shortcode"
                :before-change="checkFourthStep"
            >
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shipping_address_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Status (select one)
                                                <span class="error">*</span>
                                            </label>
                                            <div class="d-flex justify-content-around w-100">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" />
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineRadio2">Suspend</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" />
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineRadio3">Delete</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card shipping_address_card">
                            <div class="card-body">
                                <p class="font-size-18 mb-3">Check only the item services accepted at this drop of center</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                card
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                placeholder="same as billing address"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                ungraded authenticator
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                placeholder="same as billing address"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                Reholder
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                placeholder="same as billing address"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                crossover
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                placeholder="same as billing address"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tab-content>
            <tab-content
                title="Products"
                icon="ti-dropbox"
            >
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shipping_address_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-uppercase">
                                                Status (select one)
                                                <span class="error">*</span>
                                            </label>
                                            <div class="d-flex justify-content-around w-100">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" />
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineRadio2">Suspend</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" />
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineRadio3">Delete</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card shipping_address_card">
                            <div class="card-body">
                                <p class="font-size-18 mb-3">Check only the product offering at this drop of center</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                check
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                placeholder="same as billing address"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                index card
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                placeholder="same as billing address"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                Postcard
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                placeholder="same as billing address"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                food
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                placeholder="same as billing address"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                photo
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                placeholder="same as billing address"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                ticket
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                placeholder="same as billing address"/>
                                            <!--                                v-model.trim="v$.form_data.name.$model"-->
                                            <!--                            />-->
                                            <!--                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
                                            <!--                                Zip code is required-->
                                            <!--                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tab-content>
        </form-wizard>
    </form>
</div>
</template>

<script>
import { useVuelidate } from '@vuelidate/core'
import { required } from '@vuelidate/validators'
export default {
    name: "CreateThirdPartyDropOff",
    setup: () => ({ v$: useVuelidate() }),
    data(){
        return{
            show_error: false,
            step_count:5,
            completed_step_count:'',
            form_wizard_subtitle:'Start here',
            form_data:{
                name: '',
            },

        }
    },
    methods:{
        submit(){
            // alert('Yay. Done!');
            Swal.fire({
                // title: "Are the selected product offerings applicable for drop off center: <br> West's Card Edmonton",
                title: `Are the selected product offerings applicable for drop off center: <br> ${this.form_data.name}`,
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes",
                denyButtonText: `No`,
                icon: "question",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire("Saved!", "", "success");
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        },
        checkFirstStep(){
            // this.v$.$touch()
            // if (this.v$.form_data.name.$invalid) {
            //     this.show_error = true;
            //     return false;
            // }
            this.completed_step_count = 1;
            this.form_wizard_subtitle = 'Awesome start lets Continue 😀'
            return true;
        },
        checkSecondStep(){
            // this.v$.$touch()
            // if (this.v$.form_data.name.$invalid) {
            //     this.show_error = true;
            //     return false;
            // }
            this.completed_step_count = 2;
            this.form_wizard_subtitle = 'Please Continue to next'
            return true;
        },
        checkThirdStep(){
            // this.v$.$touch()
            // if (this.v$.form_data.name.$invalid) {
            //     this.show_error = true;
            //     return false;
            // }
            this.completed_step_count = 3;
            this.form_wizard_subtitle = 'Some more info needed'
            return true;
        },
        checkFourthStep(){
            // this.v$.$touch()
            // if (this.v$.form_data.name.$invalid) {
            //     this.show_error = true;
            //     return false;
            // }
            this.completed_step_count = 4;
            this.form_wizard_subtitle = 'Almost Done'
            return true;
        }
    },
    validations: {
        form_data: {
            name: {
                required,
            },
        }
    }
}
</script>

<style scoped>
.shipping_address_card{
    background: #eeeeee;
}
</style>
