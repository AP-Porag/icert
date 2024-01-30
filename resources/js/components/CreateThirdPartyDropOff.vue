<template>
<div class="">
    <form>
        <!--            :title="`Create Third party with ${step_count} steps`"-->
<!--        :subtitle="form_wizard_subtitle"-->
<!--        @on-change="handleTabChange"-->
        <form-wizard
            @on-complete="submit"
            color="#3476ae"
            title=""
            subtitle=""
            next-button-text="Continue"
            finish-button-text="Save"
        >

            <template v-slot:footer="props">
                <div class="wizard-footer-left">
                    <wizard-button  v-if="props.activeTabIndex > 0" @click.native="props.prevTab()" :style="props.fillButtonStyle">Back</wizard-button>
                </div>
                <div class="wizard-footer-right">
                    <wizard-button @click.native="cancel" class="wizard-footer-right finish-button" style="background: orange;margin-left: 15px;color: white;">Cancel</wizard-button>
                    <wizard-button v-if="!props.isLastStep"@click.native="props.nextTab()" class="wizard-footer-right" :style="props.fillButtonStyle">Continue</wizard-button>
                    <wizard-button v-else @click.native="submit" class="wizard-footer-right" :style="props.fillButtonStyle">Save</wizard-button>
                </div>
            </template>
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
                                            <label class="form-label w-100 text-capitalize">
                                                Drop Off Center
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder=""
                                                v-model.trim="v$.form_data.name.$model"
                                                ref="name"
                                            />
                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">
                                                Name is required
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100">
                                                Contact Name
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder=""
                                                v-model.trim="v$.form_data.contact_name.$model"
                                            />
                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">
                                                contact name is required
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                Email Address
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                type="email"
                                                class="form-control"
                                                placeholder=""
                                                v-model.trim="v$.form_data.email.$model"
                                            />
                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error_one">
                                                email is required
                                            </div>
                                            <div class="error" v-if="v$.form_data.email.email.$invalid && show_error_one">
                                                Give A valid email
                                            </div>
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
<!--                        <div class="card shipping_address_card">-->
<!--                            <div class="card-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-capitalize">-->
<!--                                                Drop Off Center-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control md-readonly"-->
<!--                                                placeholder=""-->
<!--                                                v-model.trim="v$.form_data.name.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">-->
<!--                                                Name is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100">-->
<!--                                                Contact Name-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control md-readonly"-->
<!--                                                placeholder=""-->
<!--                                                v-model.trim="v$.form_data.contact_name.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
<!--                                                contact name is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-capitalize">-->
<!--                                                Email Address-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="email"-->
<!--                                                class="form-control md-readonly"-->
<!--                                                placeholder=""-->
<!--                                                v-model.trim="v$.form_data.email.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error_one">-->
<!--                                                email is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <h3 class="mb-only-name">{{v$.form_data.name.$model}}</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="card shipping_address_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                Address Line one
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control mb-text-only"
                                                placeholder=""
                                                v-model.trim="v$.form_data.billing_address_line_one.$model"
                                                ref="billing_address_line_one"
                                                :readonly="isReadonly"
                                            />
                                            <div class="error" v-if="v$.form_data.billing_address_line_one.required.$invalid && show_error_two">
                                                One Address Line is required
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                Address Line two
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control mb-text-only"
                                                placeholder=""
                                                v-model.trim="form_data.billing_address_line_two"
                                                :readonly="isReadonly"
                                            />
                                            <!--                                            <div class="error" v-if="v$.form_data.billing_address_line_two.required.$invalid && show_error">-->
                                            <!--                                                Second address Line two is required-->
                                            <!--                                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                City
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control mb-text-only"
                                                placeholder=""
                                                v-model.trim="v$.form_data.billing_city.$model"
                                                :readonly="isReadonly"
                                            />
                                            <div class="error" v-if="v$.form_data.billing_city.required.$invalid && show_error_two">
                                                City is required
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                Province/State
                                                <span class="error">*</span>
                                            </label>
                                            <select class="form-select mb-text-only" aria-label="Default select example"
                                                    v-model.trim="v$.form_data.billing_province.$model"
                                                    :readonly="isReadonly"
                                            >
                                                <option selected disabled>Open this select menu</option>
                                                <option v-for="(province,index) in provinces" :value="province.name.toLowerCase()" :key="province.id">{{province.name}}</option>
                                            </select>
                                            <div class="error" v-if="v$.form_data.billing_province.required.$invalid && show_error_two">
                                                Province is required
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                postal/Zip code
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control mb-text-only"
                                                placeholder=""
                                                v-model.trim="v$.form_data.billing_postal.$model"
                                                :readonly="isReadonly"
                                                @input="event => v$.form_data.billing_postal.$model = event.target.value.toUpperCase()"
                                            />
                                            <div class="error" v-if="v$.form_data.billing_postal.required.$invalid && show_error_two">
                                                Postal is required
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Country
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="v$.form_data.billing_country.$model"
                                                        :readonly="isReadonly"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(country,index) in countries" :value="country.name.toLowerCase()" :key="country.id">{{country.name}}</option>
                                                </select>
                                                <div class="error" v-if="v$.form_data.billing_country.required.$invalid && show_error_two">
                                                    Country is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Telephone#
                                                    <span class="error">*</span>
                                                </label>
                                                <VuePhoneNumberInput
                                                    id="phoneNumber1"
                                                    class="mb-text-only"
                                                    v-model.trim="v$.form_data.billing_phone.$model"
                                                    :readonly="isReadonly"
                                                    default-country-code="CA"
                                                    :only-countries="countries_phone"
                                                    style="background-color: #e8f0fe !important;"
                                                />
                                                <div class="error" v-if="v$.form_data.billing_phone.required.$invalid && show_error_two">
                                                    Phone is required
                                                </div>
                                            </div>
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
<!--                        <div class="card shipping_address_card">-->
<!--                            <div class="card-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-capitalize">-->
<!--                                                Drop Off Center-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control md-readonly"-->
<!--                                                placeholder=""-->
<!--                                                v-model.trim="v$.form_data.name.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">-->
<!--                                                Name is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100">-->
<!--                                                Contact Name-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control md-readonly"-->
<!--                                                placeholder=""-->
<!--                                                v-model.trim="v$.form_data.contact_name.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
<!--                                                contact name is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-capitalize">-->
<!--                                                Email Address-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="email"-->
<!--                                                class="form-control md-readonly"-->
<!--                                                placeholder=""-->
<!--                                                v-model.trim="v$.form_data.email.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error_one">-->
<!--                                                email is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <h3 class="mb-only-name">{{v$.form_data.name.$model}}</h3>
                    </div>

                    <div class="col-md-12">
                        <div class="card shipping_address_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex justify-content-start">
                                            <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                Same as billing address
                                            </label>
                                            <input
                                                type="checkbox"
                                                class="form-check"
                                                placeholder=""
                                                v-model.trim="form_data.same_as_billing"
                                                :readonly="isReadonly"
                                                @change="sameAsBillingChanged($event)"
                                            />
                                            <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">-->
                                            <!--                                                Same as Billing is required-->
                                            <!--                                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                Drop Off Center Name (if different)
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control mb-text-only"
                                                placeholder=""
                                                v-model.trim="form_data.shipping_name"
                                                :readonly="isReadonly"
                                                ref="shipping_name"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                Contact Name (if different)
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control mb-text-only"
                                                placeholder=""
                                                v-model.trim="v$.form_data.shipping_company_name.$model"
                                                :readonly="isReadonly"
                                            />
                                            <!--                                            <div class="error" v-if="v$.form_data.shipping_company_name.required.$invalid && show_error">-->
                                            <!--                                                Company name is required-->
                                            <!--                                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                Address Line one
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control mb-text-only"
                                                placeholder=""
                                                v-model.trim="v$.form_data.shipping_address_line_one.$model"
                                                :readonly="isReadonly"
                                            />
                                            <div class="error" v-if="v$.form_data.shipping_address_line_one.required.$invalid && show_error_three">
                                                One Address is required for shipping
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                Address Line two
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control mb-text-only"
                                                placeholder=""
                                                v-model.trim="form_data.shipping_address_line_two"
                                                :readonly="isReadonly"
                                            />
                                            <!--                                            <div class="error" v-if="v$.form_data.shipping_address_line_two.required.$invalid && show_error">-->
                                            <!--                                                Second shipping address required-->
                                            <!--                                            </div>-->
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                City
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control mb-text-only"
                                                placeholder=""
                                                v-model.trim="v$.form_data.shipping_city.$model"
                                                :readonly="isReadonly"
                                            />
                                            <div class="error" v-if="v$.form_data.shipping_city.required.$invalid && show_error_three">
                                                city is required
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                Province/State
                                                <span class="error">*</span>
                                            </label>
                                            <select class="form-select mb-text-only" aria-label="Default select example"
                                                    v-model.trim="v$.form_data.shipping_province.$model"
                                                    :readonly="isReadonly"
                                            >
                                                <option selected disabled>Open this select menu</option>
                                                <option v-for="(province,index) in provinces" :value="province.name.toLowerCase()" :key="province.id">{{province.name}}</option>
                                            </select>
                                            <div class="error" v-if="v$.form_data.shipping_province.required.$invalid && show_error_three">
                                                Province is required
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize">
                                                postal/Zip code
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control mb-text-only"
                                                placeholder=""
                                                v-model.trim="v$.form_data.shipping_postal.$model"
                                                :readonly="isReadonly"
                                                @input="event => v$.form_data.shipping_postal.$model = event.target.value.toUpperCase()"
                                            />
                                            <div class="error" v-if="v$.form_data.shipping_postal.required.$invalid && show_error_three">
                                                Postal is required
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Country
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="v$.form_data.shipping_country.$model"
                                                        :readonly="isReadonly"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(country,index) in countries" :value="country.name.toLowerCase()" :key="country.id">{{country.name}}</option>
                                                </select>
                                                <div class="error" v-if="v$.form_data.shipping_country.required.$invalid && show_error_three">
                                                    Country is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Telephone#
                                                    <span class="error">*</span>
                                                </label>
                                                <VuePhoneNumberInput
                                                    id="phoneNumber1"
                                                    class="mb-text-only"
                                                    v-model.trim="v$.form_data.shipping_phone.$model"
                                                    :readonly="isReadonly"
                                                    default-country-code="CA"
                                                    :only-countries="countries_phone"
                                                />
                                                <div class="error" v-if="v$.form_data.shipping_phone.required.$invalid && show_error_three">
                                                    Phone is required
                                                </div>
                                            </div>
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
<!--                        <div class="card shipping_address_card">-->
<!--                            <div class="card-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-capitalize">-->
<!--                                                Drop Off Center-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control md-readonly"-->
<!--                                                placeholder=""-->
<!--                                                v-model.trim="v$.form_data.name.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">-->
<!--                                                Name is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100">-->
<!--                                                Contact Name-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control md-readonly"-->
<!--                                                placeholder=""-->
<!--                                                v-model.trim="v$.form_data.contact_name.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
<!--                                                contact name is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-capitalize">-->
<!--                                                Email Address-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="email"-->
<!--                                                class="form-control md-readonly"-->
<!--                                                placeholder=""-->
<!--                                                v-model.trim="v$.form_data.email.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error_one">-->
<!--                                                email is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <h3 class="mb-only-name">{{v$.form_data.name.$model}}</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="card shipping_address_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label w-100 text-capitalize text-center font_big_text">
                                                Status (select one)
                                                <span class="error">*</span>
                                            </label>
                                            <div class="d-flex justify-content-center w-100">
                                                <div class="form-check form-check-inline check_right_margin">
                                                    <label class="form-check-label font_big_text" for="inlineRadio1">Active</label>
                                                    <input class="form-check-input" type="radio" checked="checked" name="inlineRadioOptions" id="inlineRadio1" value="active"
                                                           v-model.trim="v$.form_data.status.$model"
                                                           :readonly="isReadonly"
                                                    />
                                                </div>

                                                <div class="form-check form-check-inline check_right_margin">
                                                    <label class="form-check-label font_big_text" for="inlineRadio2">Suspend</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="suspend"
                                                           v-model.trim="v$.form_data.status.$model"
                                                           :readonly="isReadonly"
                                                    />
                                                </div>

                                                <div class="form-check form-check-inline check_right_margin">
                                                    <label class="form-check-label font_big_text" for="inlineRadio3">Delete</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="delete"
                                                           v-model.trim="v$.form_data.status.$model"
                                                           :readonly="isReadonly"
                                                    />
                                                </div>
                                            </div>
                                            <div class="error" v-if="v$.form_data.status.required.$invalid && show_error_four">
                                                Status is required
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
                                <p class="font-size-18 mb-3 text-center">Check only the product offerings available at this drop off center</p>
                                <div class="row">
                                    <div class="col-md-12" style="">
                                        <label class="font_big_text" style="margin-top: 6px;margin-bottom: 15px;text-decoration: underline;"><input type="checkbox" :checked="isAllSelected" @click="selectAllCats" style="margin-left: 15px; margin-right: 5px;"><span style="margin-bottom: 10px;">Select All</span></label>
                                    </div>
                                    <div class="col-md-3" v-for="(product,index) in products" :key="product.id">
                                        <div class="mb-3 d-flex justify-content-start w-100">
                                            <label class="form-label text-capitalize font_big_text" style="margin-top: 6px;margin-left: 15px; display: flex;">
                                            <input
                                                type="checkbox"
                                                class="form-check mr-3"
                                                v-model.trim="v$.form_data.products.$model"
                                                :readonly="isReadonly"
                                                :value="product.id"
                                                style="margin-right: 5px;"
                                                @change="select"
                                            />
                                                {{product.name}}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="error" v-if="v$.form_data.products.required.$invalid && show_error_four">
                                        At least one product is required
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
import VuePhoneNumberInput from 'vue-phone-number-input';
import { useVuelidate } from '@vuelidate/core'
import { required,email } from '@vuelidate/validators'
import {isReadonly} from "vue";


export default {
    name: "CreateThirdPartyDropOff",
    props: ["products"],
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
            form_data:{
                name: '',
                email:'',
                contact_name:'',
                billing_address_line_one:'',
                billing_address_line_two:'',
                billing_country:'',
                billing_province:'',
                billing_city:'',
                billing_postal:'',
                billing_phone:'',
                same_as_billing:false,
                shipping_name:'',
                shipping_company_name:'',
                shipping_address_line_one:'',
                shipping_address_line_two:'',
                shipping_country:'',
                shipping_province:'',
                shipping_city:'',
                shipping_postal:'',
                shipping_phone:'',
                status:'active',
                products:[],
            },

        }
    },
    methods:{
        isReadonly,
        async submit(){
            if (this.checkFourthStep()){
                Swal.fire({
                    // title: "Are the selected product offerings applicable for drop off center: <br> West's Card Edmonton",
                    title: `Are the selected product offerings applicable for drop off center: <br> ${this.form_data.name}`,
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: `No`,
                    icon: "question",
                }).then((result) => {
                    console.log(result)
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        // Submit form
                        axios
                            .post("/admin/thirds", this.form_data)
                            .then(function (res) {
                                Swal.fire("Saved!", "", "success");
                                // window.location.reload()
                                window.location.href = "/admin/thirds";
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
                        window.location.href = "/admin/thirds";
                    }else if (result.isDenied) {
                        console.log(result.isDenied)
                        // Swal.fire("Changes are not saved", "", "info");
                    }
                });

            }else {
                return;
            }
        },
        async checkFirstStep(){
            this.v$.$touch()
            if (this.v$.form_data.name.$invalid || this.v$.form_data.contact_name.$invalid || this.v$.form_data.email.$invalid) {
                this.show_error_one = true;
                return false;
            }else {
                let self = this;
                let data = {
                    name:self.form_data.name,
                    contact_name:self.form_data.contact_name,
                    email:self.form_data.email,
                }

                await axios
                    .post("/admin/thirds/find/if/exists", data)
                    .then(function (res) {
                        console.log(res.data.data)
                        //check if exists
                        if (res.data.status == 200){
                            //if already exists
                            console.log('mil ache')

                            self.isReadonly = true;
                            self.form_data.name = res.data.data.name
                            self.form_data.email = res.data.data.email
                            self.form_data.contact_name = res.data.data.contact_name
                            self.form_data.billing_address_line_one = res.data.data.billing_address_line_one
                            self.form_data.billing_address_line_two = res.data.data.billing_address_line_two
                            self.form_data.billing_country = res.data.data.billing_country
                            self.form_data.billing_province = res.data.data.billing_province
                            self.form_data.billing_city = res.data.data.billing_city
                            self.form_data.billing_postal = res.data.data.billing_postal
                            self.form_data.billing_phone = res.data.data.billing_phone
                            self.form_data.same_as_billing = res.data.data.same_as_billing == 0 ? false: true
                            self.form_data.shipping_name = res.data.data.shipping_name
                            self.form_data.shipping_company_name = res.data.data.shipping_company_name
                            self.form_data.shipping_address_line_one = res.data.data.shipping_address_line_one
                            self.form_data.shipping_address_line_two = res.data.data.shipping_address_line_two
                            self.form_data.shipping_country = res.data.data.shipping_country
                            self.form_data.shipping_province = res.data.data.shipping_province
                            self.form_data.shipping_city = res.data.data.shipping_city
                            self.form_data.shipping_postal = res.data.data.shipping_postal
                            self.form_data.shipping_phone = res.data.data.shipping_phone
                            self.form_data.status = res.data.data.status
                            res.data.data.products.forEach((value, index) => {
                                self.form_data.products.push(value.product_id)
                            });
                            // return false;
    //                         Swal.fire({
    //                             title: "Drop Off Center already exists.Do you want to edit this center?",
    //                             icon: "question",
    //                             html: `<div class="exists_modal">
    //     <div class="form-groups" style="margin-bottom: 15px;margin-top: 30px;">
    //         <label class="w-100 text-capitalize text-muted" style="text-align: left !important;font-size: 14px;margin-bottom: 8px;">Drop Off Center</label>
    //         <input type="text" class="form-control" readonly disabled value="${self.form_data.name}">
    //     </div>
    //     <div class="form-groups" style="margin-bottom: 15px;">
    //         <label class="w-100 text-capitalize text-muted" style="text-align: left !important;font-size: 14px;margin-bottom: 8px;">Contact Name</label>
    //         <input type="text" class="form-control" readonly disabled value="${self.form_data.contact_name}">
    //     </div>
    //     <div class="form-groups" style="margin-bottom: 15px;">
    //         <label class="w-100 text-capitalize text-muted" style="text-align: left !important;font-size: 14px;margin-bottom: 8px;">Email Address</label>
    //         <input type="text" class="form-control" readonly disabled value="${self.form_data.email}">
    //     </div>
    // </div>`,
    //                             showCloseButton: false,
    //                             showCancelButton: true,
    //                             focusConfirm: false,
    //                             confirmButtonText: `Yes`,
    //                             cancelButtonText: `No`,
    //                         }).then((result)=>{
    //                             if (result.isConfirmed){
    //                                 window.location.assign(`/admin/thirds/${res.data.data.id}/edit`);
    //                             }else {
    //                                 window.location.assign(`/admin/thirds`);
    //                                 return false;
    //                             }
    //                         });

                            Swal.fire({
                                title: "",
                                icon: "question",
                                html: `<div class="exists_modal">
                                           <h5 class="text-capitalize mb-exist-h-text">Drop Off Center:</h5>
                                           <h5 class="mb-exist-h-name">${self.form_data.name}</h5>
                                           <h5 class="mb-exist-h-text">already exists.</h5>
                                           <hr/>
                                           <h5 class="mb-exist-h-text">Do you want to edit this center?</h5>
                                        </div>`,
                                showCloseButton: false,
                                showCancelButton: true,
                                focusConfirm: false,
                                confirmButtonText: `Yes`,
                                cancelButtonText: `No`,
                            }).then((result)=>{
                                if (result.isConfirmed){
                                    window.location.assign(`/admin/thirds/${res.data.data.id}/edit`);
                                }else {
                                    window.location.assign(`/admin/thirds`);
                                    return false;
                                }
                            });

                            return false;
                        }else {
                            //if not exist
                            console.log('mil nai')
                            self.completed_step_count = 1;
                            self.form_wizard_subtitle = 'Awesome start lets Continue 😀'
                            return true;
                        }
                    })
                    .catch(function (err) {
                        try {
                            self.showValidationError(err);
                        } catch (e) {
                            self.showSomethingWrong();
                        }
                    });

                return true;
            }

        },
        checkSecondStep(){
            this.v$.$touch()
            if (this.v$.form_data.billing_address_line_one.$invalid ||
                this.v$.form_data.billing_country.$invalid ||
                this.v$.form_data.billing_province.$invalid ||
                this.v$.form_data.billing_city.$invalid ||
                this.v$.form_data.billing_postal.$invalid ||
                this.v$.form_data.billing_phone.$invalid
            ) {
                this.show_error_two = true;
                return false;
            }
            this.completed_step_count = 2;
            this.form_wizard_subtitle = 'Please Continue to next'
            return true;
        },
        checkThirdStep(){
            this.v$.$touch()
            if (this.v$.form_data.shipping_address_line_one.$invalid ||
                this.v$.form_data.shipping_country.$invalid ||
                this.v$.form_data.shipping_province.$invalid ||
                this.v$.form_data.shipping_city.$invalid ||
                this.v$.form_data.shipping_postal.$invalid ||
                this.v$.form_data.shipping_phone.$invalid
            ) {
                this.show_error_three = true;
                return false;
            }
            this.completed_step_count = 4;
            this.form_wizard_subtitle = 'Almost Done'
            return true;
        },
        checkFourthStep(){
            this.v$.$touch()
            if (this.v$.form_data.status.$invalid ||
                this.v$.form_data.products.$invalid
            ) {
                this.show_error_four = true;
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
            window.location.assign("/admin/thirds");
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
        }
    },

    validations: {
        form_data: {
            name: {
                required,
            },
            contact_name: {
                required,
            },
            email: {
                required,
                email
            },
            billing_address_line_one:{
                required,
            },
            // billing_address_line_two:{},
            billing_country:{
                required,
            },
            billing_province:{
                required,
            },
            billing_city:{
                required,
            },
            billing_postal:{
                required,
            },
            billing_phone:{
                required,
            },
            // same_as_billing:{},
            // shipping_name:{},
            shipping_company_name:{
                required,
            },
            shipping_address_line_one:{
                required,
            },
            // shipping_address_line_two:{},
            shipping_country:{
                required,
            },
            shipping_province:{
                required,
            },
            shipping_city:{
                required,
            },
            shipping_postal:{
                required,
            },
            shipping_phone:{
                required,
            },
            status:{
                required,
            },
            products:{
                required,
            },
        }
    }

}
</script>

<style scoped>



</style>
