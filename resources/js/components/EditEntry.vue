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
                    title="Customer Info"
                    icon="ti-user"
                    :before-change="checkFirstStep"
                >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Customer Name
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.customer"
                                                        @change="customerNameChangeEvent"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(customer,index) in customers" :value="customer" :key="customer.id">{{customer.name}}</option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.name" :options="customers" placeholder="Select customer..." @change="customerNameChangeEvent($event)" />-->
                                                <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">
                                                    Customer name is required
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
                    title="Grading Location"
                    icon="ti-map-alt"
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
                                                    Select the grading location for this order
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="v$.form_data.grading_location.$model"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(location,index) in gradingLocations" :value="location.id" :key="location.id">{{location.name}}</option>
                                                </select>

                                                <!--                                            <Select2 v-model="form_data.grading_location" :options="gradingLocations" />-->
                                                <div class="error" v-if="v$.form_data.grading_location.required.$invalid && show_error_two">
                                                    Grading location is required
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
                                                />
                                                <div class="error" v-if="v$.form_data.billing_address_line_one.required.$invalid && show_error_three">
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
                                                />
                                                <div class="error" v-if="v$.form_data.billing_city.required.$invalid && show_error_three">
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
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(province,index) in provinces" :value="province.name.toLowerCase()" :key="province.id">{{province.name}}</option>
                                                </select>
                                                <div class="error" v-if="v$.form_data.billing_province.required.$invalid && show_error_three">
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
                                                    @input="event => v$.form_data.billing_postal.$model = event.target.value.toUpperCase()"
                                                />
                                                <div class="error" v-if="v$.form_data.billing_postal.required.$invalid && show_error_three">
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
                                                    >
                                                        <option selected disabled>Open this select menu</option>
                                                        <option v-for="(country,index) in countries" :value="country.name.toLowerCase()" :key="country.id">{{country.name}}</option>
                                                    </select>
                                                    <div class="error" v-if="v$.form_data.billing_country.required.$invalid && show_error_three">
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
                                                        default-country-code="CA"
                                                        :only-countries="countries_phone"
                                                        style="background-color: #e8f0fe !important;"
                                                    />
                                                    <div class="error" v-if="v$.form_data.billing_phone.required.$invalid && show_error_three">
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
                    icon="ti-infinite"
                    :before-change="checkFourthStep"
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
                                                    Customer Name (if different)
                                                </label>
                                                <input
                                                    autofocus
                                                    type="text"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="form_data.shipping_name"
                                                    ref="shipping_name"
                                                />
                                                <!--                                            <div class="error" v-if="v$.form_data.shipping_name.required.$invalid && show_error">-->
                                                <!--                                                Name for shipping is required-->
                                                <!--                                            </div>-->
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
                                                />
                                                <div class="error" v-if="v$.form_data.shipping_address_line_one.required.$invalid && show_error_four">
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
                                                />
                                                <div class="error" v-if="v$.form_data.shipping_city.required.$invalid && show_error_four">
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
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(province,index) in provinces" :value="province.name.toLowerCase()" :key="province.id">{{province.name}}</option>
                                                </select>
                                                <div class="error" v-if="v$.form_data.shipping_province.required.$invalid && show_error_four">
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
                                                    @input="event => v$.form_data.shipping_postal.$model = event.target.value.toUpperCase()"
                                                />
                                                <div class="error" v-if="v$.form_data.shipping_postal.required.$invalid && show_error_four">
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
                                                    >
                                                        <option selected disabled>Open this select menu</option>
                                                        <option v-for="(country,index) in countries" :value="country.name.toLowerCase()" :key="country.id">{{country.name}}</option>
                                                    </select>
                                                    <div class="error" v-if="v$.form_data.shipping_country.required.$invalid && show_error_four">
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
                                                        default-country-code="CA"
                                                        :only-countries="countries_phone"
                                                    />
                                                    <div class="error" v-if="v$.form_data.shipping_phone.required.$invalid && show_error_four">
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
                    title="Extra Fields"
                    icon="ti-server"
                    :before-change="checkFifthStep"
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
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Submission date
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    autofocus
                                                    type="date"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.submission_date.$model"
                                                    ref="billing_address_line_one"
                                                />
                                                <div class="error" v-if="v$.form_data.submission_date.required.$invalid && show_error_five">
                                                    Submission date is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Promo code
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.promo_code"
                                                >
                                                    <option selected disabled v-if="promos.length > 0">Open this select menu</option>
                                                    <option selected disabled v-else>There is no promo code</option>
                                                    <option v-for="(promo,index) in promos" :value="promo.id" :key="promo.id">{{promo.name}}</option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.promo_code" :options="promoCodes" />-->
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                    Payment Made
                                                </label>
                                                <input
                                                    type="checkbox"
                                                    class="form-check"
                                                    placeholder=""
                                                    v-model.trim="form_data.payment_made"
                                                />
                                                <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">-->
                                                <!--                                                Same as Billing is required-->
                                                <!--                                            </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="mb-3 d-flex justify-content-end" style="margin-top: 25px;">
                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                    Pay on pickup
                                                </label>
                                                <input
                                                    type="checkbox"
                                                    class="form-check"
                                                    placeholder=""
                                                    v-model.trim="form_data.pay_on_pickup"
                                                />
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="mb-3 d-flex justify-content-end" style="margin-top: 25px;">
                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                    COD
                                                </label>
                                                <input
                                                    type="checkbox"
                                                    class="form-check"
                                                    placeholder=""
                                                    v-model.trim="form_data.cod"
                                                />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Shopify order number
                                                </label>
                                                <input
                                                    type="number"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="form_data.shopify_order_number"
                                                />
<!--                                                <div class="error" v-if="v$.form_data.billing_city.required.$invalid && show_error_two">-->
<!--                                                    City is required-->
<!--                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tab-content>
<!--                :before-change="checkSixthStep"-->
                <tab-content
                    title="Shipping Method"
                    icon="ti-credit-card"
                >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Shipping Method
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.shipping_method"
                                                        @change="shippingMethodsChangeEvent"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(shipping,index) in shippingMethods" :value="shipping.name" :key="shipping.id">{{shipping.name}}</option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.shipping_method" :options="shippingMethods" @change="shippingMethodsChangeEvent($event)" />-->
                                                <div class="error" v-if="v$.form_data.shipping_method.required.$invalid && show_error_six">
                                                    Shipping method is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" v-if="showPickupLocationBox">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Pickup location
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.pickup_location"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(pickup,index) in pickUpLocations" :value="pickup.name" :key="pickup.id">{{pickup.name}}</option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.pickup_location" :options="pickUpLocations" />-->
                                                <div class="error" v-if="v$.form_data.pickup_location.required.$invalid && show_error_seven">
                                                    Pickup location is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" v-if="showShowPickupLocationBox">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Pickup Location
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.show_pickup_location"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(showPickup,index) in pickUpLocations" :value="showPickup.name" :key="showPickup.id">{{showPickup.name}}</option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.show_pickup_location" :options="pickUpLocations" />-->
                                                <div class="error" v-if="v$.form_data.show_pickup_location.required.$invalid && show_error_eight">
                                                    Pickup location is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" v-if="showThirdPartyBox">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Third party drop off center
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.third_party_drop_center"
                                                >
                                                    <option selected disabled v-if="parties.length > 0">Open this select menu</option>
                                                    <option selected disabled v-else>There is no third party</option>
                                                    <option v-for="(third,index) in parties" :value="third.id" :key="third.id">{{third.name}}</option>
                                                </select>
                                                <div class="error" v-if="v$.form_data.third_party_drop_center.required.$invalid && show_error_nine">
                                                    Third party drop off center is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" v-if="showUPSBox">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                        <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                            Use Customer Account
                                                        </label>
                                                        <input
                                                            type="checkbox"
                                                            class="form-check"
                                                            placeholder=""
                                                            v-model.trim="form_data.use_customer_account"
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100 text-capitalize">
                                                            Customer Account number
                                                            <span class="error">*</span>
                                                        </label>
                                                        <input
                                                            type="number"
                                                            class="form-control mb-text-only"
                                                            placeholder=""
                                                            v-model.trim="v$.form_data.customer_account_number.$model"
                                                        />
                                                        <div class="error" v-if="v$.form_data.customer_account_number.required.$invalid && show_error_ten">
                                                            Customer account number is required
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
                </tab-content>
<!--                <tab-content-->
<!--                    title="Item Type"-->
<!--                    icon="ti-gift"-->
<!--                >-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-12">-->
<!--                            <div class="card shipping_address_card">-->
<!--                                <div class="card-body">-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100 text-capitalize">-->
<!--                                                    Select the item type to be entered-->
<!--                                                    <span class="error">*</span>-->
<!--                                                </label>-->
<!--                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
<!--                                                        v-model.trim="form_data.itemType"-->
<!--                                                        @change="itemTypeChangeEvent"-->
<!--                                                >-->
<!--                                                    <option selected disabled>Open this select menu</option>-->
<!--                                                    <option v-for="(type,index) in itemTypes" :value="type.name" :key="type.id">{{type.name}}</option>-->
<!--                                                </select>-->
<!--                                                &lt;!&ndash;                                            <Select2 v-model="form_data.itemType" :options="itemTypes" @change="itemTypeChangeEvent($event)" />&ndash;&gt;-->
<!--                                                <div class="error" v-if="v$.form_data.itemType.required.$invalid && show_error_eleven">-->
<!--                                                    Item type is required-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <div class="col-md-6" v-if="showItemTypeCrossoverBox">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100 text-capitalize">-->
<!--                                                    Crossover Item Type-->
<!--                                                    <span class="error">*</span>-->
<!--                                                </label>-->
<!--                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
<!--                                                        v-model.trim="v$.form_data.crossover_item_type.$model"-->
<!--                                                >-->
<!--                                                    <option selected disabled>Open this select menu</option>-->
<!--                                                    <option v-for="(coType,index) in crossoverItemTypes" :value="coType.name" :key="coType.id">{{coType.name}}</option>-->
<!--                                                </select>-->
<!--                                                &lt;!&ndash;                                            <Select2 v-model="form_data.crossover_item_type" :options="crossoverItemTypes" />&ndash;&gt;-->
<!--                                                <div class="error" v-if="v$.form_data.crossover_item_type.required.$invalid && show_error_sixteen">-->
<!--                                                    Crossover item type is required-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        &lt;!&ndash;item type card&ndash;&gt;-->
<!--                        <div class="col-md-12" v-if="showItemTypeCardBox">-->
<!--                            <div class="card shipping_address_card">-->
<!--                                <div class="card-body">-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-1">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100">-->
<!--                                                    Qty-->
<!--                                                </label>-->
<!--                                                <input-->
<!--                                                    type="text"-->
<!--                                                    class="form-control"-->
<!--                                                    placeholder=""-->
<!--                                                    v-model.trim="form_data.item_qty"-->
<!--                                                    readonly-->
<!--                                                />-->
<!--&lt;!&ndash;                                                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
<!--&lt;!&ndash;                                                    contact name is required&ndash;&gt;-->
<!--&lt;!&ndash;                                                </div>&ndash;&gt;-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <div class="col-md-9">-->
<!--                                            <div class="row">-->
<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #1   (Year,Manufacturer,Set,Other)-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.card_description_one.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.card_description_one.required.$invalid && show_error_twelve">-->
<!--                                                            Description one is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #2-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.card_description_two.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.card_description_two.required.$invalid && show_error_twelve">-->
<!--                                                            Description two is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #3-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.card_description_three.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.card_description_three.required.$invalid && show_error_twelve">-->
<!--                                                            Description three is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-6">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Serial Number   (Only if printed directly on item)-->
<!--&lt;!&ndash;                                                            <span class="error">*</span>&ndash;&gt;-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="form_data.card_serial_number"-->
<!--                                                        />-->
<!--&lt;!&ndash;                                                        <div class="error" v-if="v$.form_data.card_serial_number.required.$invalid && show_error_twelve">&ndash;&gt;-->
<!--&lt;!&ndash;                                                            Serial number is required&ndash;&gt;-->
<!--&lt;!&ndash;                                                        </div>&ndash;&gt;-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="row">-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">-->
<!--                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">-->
<!--                                                                    Autographed-->
<!--                                                                </label>-->
<!--                                                                <input-->
<!--                                                                    type="checkbox"-->
<!--                                                                    class="form-check"-->
<!--                                                                    placeholder=""-->
<!--                                                                    v-model.trim="form_data.card_autographed"-->
<!--                                                                />-->
<!--                                                                &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">&ndash;&gt;-->
<!--                                                                &lt;!&ndash;                                                Same as Billing is required&ndash;&gt;-->
<!--                                                                &lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3">-->
<!--                                                                <label class="form-label w-100 text-capitalize">-->
<!--                                                                    Authenticator Name-->
<!--                                                                    <span class="error" v-if="form_data.card_autographed">*</span>-->
<!--                                                                </label>-->
<!--                                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
<!--                                                                        v-model.trim="v$.form_data.card_authenticator_name.$model"-->
<!--                                                                >-->
<!--                                                                    <option selected disabled>Open this select menu</option>-->
<!--                                                                    <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>-->
<!--                                                                </select>-->
<!--                                                                &lt;!&ndash;                                                            <Select2 v-model="form_data.authenticator_name" :options="authenticators" />&ndash;&gt;-->
<!--                                                                <div class="error" v-if="v$.form_data.card_authenticator_name.required.$invalid && show_error_twelve">-->
<!--                                                                    Authenticator name is required-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3">-->
<!--                                                                <label class="form-label w-100">-->
<!--                                                                    Authenticator Cert. No.-->
<!--                                                                    <span class="error" v-if="form_data.card_autographed">*</span>-->
<!--                                                                </label>-->
<!--                                                                <input-->
<!--                                                                    type="text"-->
<!--                                                                    class="form-control"-->
<!--                                                                    placeholder=""-->
<!--                                                                    v-model.trim="v$.form_data.card_authenticator_cert_no.$model"-->
<!--                                                                />-->
<!--                                                                <div class="error" v-if="v$.form_data.card_authenticator_cert_no.required.$invalid && show_error_twelve">-->
<!--                                                                    Authenticator cert no. is required-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <div class="col-md-2">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100">-->
<!--                                                    Estimated Value-->
<!--                                                    <span class="error">*</span>-->
<!--                                                </label>-->
<!--                                                <input-->
<!--                                                    type="text"-->
<!--                                                    class="form-control"-->
<!--                                                    placeholder=""-->
<!--                                                    v-model.trim="v$.form_data.card_estimated_value.$model"-->
<!--                                                />-->
<!--                                                <div class="error" v-if="v$.form_data.card_estimated_value.required.$invalid && show_error_twelve">-->
<!--                                                    Estimated value is required-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->


<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        &lt;!&ndash;item type auto authentication&ndash;&gt;-->
<!--                        <div class="col-md-12" v-if="showItemTypeAutoAthenticationBox">-->
<!--                            <div class="card shipping_address_card">-->
<!--                                <div class="card-body">-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-1">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100">-->
<!--                                                    Qty-->
<!--                                                </label>-->
<!--                                                <input-->
<!--                                                    type="text"-->
<!--                                                    class="form-control"-->
<!--                                                    placeholder=""-->
<!--                                                    v-model.trim="form_data.item_qty"-->
<!--                                                    readonly-->
<!--                                                />-->
<!--&lt;!&ndash;                                                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
<!--&lt;!&ndash;                                                    contact name is required&ndash;&gt;-->
<!--&lt;!&ndash;                                                </div>&ndash;&gt;-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <div class="col-md-9">-->
<!--                                            <div class="row">-->
<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #1   (Year,Manufacturer,Set,Other)-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.auto_authentication_description_one.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.auto_authentication_description_one.required.$invalid && show_error_thirteen">-->
<!--                                                            Description one is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #2-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.auto_authentication_description_two.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.auto_authentication_description_two.required.$invalid && show_error_thirteen">-->
<!--                                                            Description two is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #3-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.auto_authentication_description_three.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.auto_authentication_description_three.required.$invalid && show_error_thirteen">-->
<!--                                                            Description three is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-6">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Serial Number   (Only if printed directly on item)-->
<!--&lt;!&ndash;                                                            <span class="error">*</span>&ndash;&gt;-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="form_data.auto_authentication_serial_number"-->
<!--                                                        />-->
<!--&lt;!&ndash;                                                        <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
<!--&lt;!&ndash;                                                            contact name is required&ndash;&gt;-->
<!--&lt;!&ndash;                                                        </div>&ndash;&gt;-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="row">-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">-->
<!--                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">-->
<!--                                                                    Autographed-->
<!--                                                                </label>-->
<!--                                                                <input-->
<!--                                                                    type="checkbox"-->
<!--                                                                    class="form-check"-->
<!--                                                                    placeholder=""-->
<!--                                                                    v-model.trim="form_data.auto_authentication_autographed"-->
<!--                                                                />-->
<!--                                                                &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">&ndash;&gt;-->
<!--                                                                &lt;!&ndash;                                                Same as Billing is required&ndash;&gt;-->
<!--                                                                &lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3">-->
<!--                                                                <label class="form-label w-100 text-capitalize">-->
<!--                                                                    Authenticator Name-->
<!--                                                                    <span class="error" v-if="form_data.auto_authentication_autographed">*</span>-->
<!--                                                                </label>-->
<!--                                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
<!--                                                                        v-model.trim="v$.form_data.auto_authentication_authenticator_name.$model"-->
<!--                                                                >-->
<!--                                                                    <option selected disabled>Open this select menu</option>-->
<!--                                                                    <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>-->
<!--                                                                </select>-->
<!--                                                                &lt;!&ndash;                                                            <Select2 v-model="form_data.authenticator_name_two" :options="authenticators" />&ndash;&gt;-->
<!--                                                                <div class="error" v-if="v$.form_data.auto_authentication_authenticator_name.required.$invalid && show_error_thirteen">-->
<!--                                                                    Authenticator name is required-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3">-->
<!--                                                                <label class="form-label w-100">-->
<!--                                                                    Authenticator Cert. No.-->
<!--                                                                    <span class="error" v-if="form_data.auto_authentication_autographed">*</span>-->
<!--                                                                </label>-->
<!--                                                                <input-->
<!--                                                                    type="text"-->
<!--                                                                    class="form-control"-->
<!--                                                                    placeholder=""-->
<!--                                                                    v-model.trim="v$.form_data.auto_authentication_authenticator_cert_no.$model"-->
<!--                                                                />-->
<!--                                                                <div class="error" v-if="v$.form_data.auto_authentication_authenticator_cert_no.required.$invalid && show_error_thirteen">-->
<!--                                                                    Authenticator cert. no. is required-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <div class="col-md-2">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100">-->
<!--                                                    Estimated Value-->
<!--                                                    <span class="error">*</span>-->
<!--                                                </label>-->
<!--                                                <input-->
<!--                                                    type="text"-->
<!--                                                    class="form-control"-->
<!--                                                    placeholder=""-->
<!--                                                    v-model.trim="v$.form_data.auto_authentication_estimated_value.$model"-->
<!--                                                />-->
<!--                                                <div class="error" v-if="v$.form_data.auto_authentication_estimated_value.required.$invalid && show_error_thirteen">-->
<!--                                                    Estimated value is required-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->


<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        &lt;!&ndash;item type combined service&ndash;&gt;-->
<!--                        <div class="col-md-12" v-if="showItemTypeCombinedServiceBox">-->
<!--                            <div class="card shipping_address_card">-->
<!--                                <div class="card-body">-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-1">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100">-->
<!--                                                    Qty-->
<!--                                                </label>-->
<!--                                                <input-->
<!--                                                    type="text"-->
<!--                                                    class="form-control"-->
<!--                                                    placeholder=""-->
<!--                                                    v-model.trim="form_data.item_qty"-->
<!--                                                    readonly-->
<!--                                                />-->
<!--&lt;!&ndash;                                                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
<!--&lt;!&ndash;                                                    contact name is required&ndash;&gt;-->
<!--&lt;!&ndash;                                                </div>&ndash;&gt;-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <div class="col-md-9">-->
<!--                                            <div class="row">-->
<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #1   (Year,Manufacturer,Set,Other)-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.combined_service_description_one.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.combined_service_description_one.required.$invalid && show_error_fourteen">-->
<!--                                                            Description one is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #2-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.combined_service_description_two.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.combined_service_description_two.required.$invalid && show_error_fourteen">-->
<!--                                                            Description two is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #3-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.combined_service_description_three.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.combined_service_description_three.required.$invalid && show_error_fourteen">-->
<!--                                                            Description three is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-6">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Serial Number   (Only if printed directly on item)-->
<!--&lt;!&ndash;                                                            <span class="error">*</span>&ndash;&gt;-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="form_data.combined_service_serial_number"-->
<!--                                                        />-->
<!--                                                        &lt;!&ndash;                                                        <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
<!--                                                        &lt;!&ndash;                                                            contact name is required&ndash;&gt;-->
<!--                                                        &lt;!&ndash;                                                        </div>&ndash;&gt;-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="row">-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">-->
<!--                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">-->
<!--                                                                    Autographed-->
<!--                                                                </label>-->
<!--                                                                <input-->
<!--                                                                    type="checkbox"-->
<!--                                                                    class="form-check"-->
<!--                                                                    placeholder=""-->
<!--                                                                    v-model.trim="form_data.combined_service_autographed"-->
<!--                                                                />-->
<!--                                                                &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">&ndash;&gt;-->
<!--                                                                &lt;!&ndash;                                                Same as Billing is required&ndash;&gt;-->
<!--                                                                &lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3">-->
<!--                                                                <label class="form-label w-100 text-capitalize">-->
<!--                                                                    Authenticator Name-->
<!--                                                                    <span class="error" v-if="form_data.combined_service_autographed">*</span>-->
<!--                                                                </label>-->
<!--                                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
<!--                                                                        v-model.trim="v$.form_data.combined_service_authenticator_name.$model"-->
<!--                                                                >-->
<!--                                                                    <option selected disabled>Open this select menu</option>-->
<!--                                                                    <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>-->
<!--                                                                </select>-->
<!--                                                                &lt;!&ndash;                                                            <Select2 v-model="form_data.authenticator_name_two" :options="authenticators" />&ndash;&gt;-->
<!--                                                                <div class="error" v-if="v$.form_data.combined_service_authenticator_name.required.$invalid && show_error_fourteen">-->
<!--                                                                    Authenticator Name is required-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3">-->
<!--                                                                <label class="form-label w-100">-->
<!--                                                                    Authenticator Cert. No.-->
<!--                                                                    <span class="error" v-if="form_data.combined_service_autographed">*</span>-->
<!--                                                                </label>-->
<!--                                                                <input-->
<!--                                                                    type="text"-->
<!--                                                                    class="form-control"-->
<!--                                                                    placeholder=""-->
<!--                                                                    v-model.trim="v$.form_data.combined_service_authenticator_cert_no.$model"-->
<!--                                                                />-->
<!--                                                                <div class="error" v-if="v$.form_data.combined_service_authenticator_cert_no.required.$invalid && show_error_fourteen">-->
<!--                                                                    Authenticator cert. no. is required-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <div class="col-md-2">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100">-->
<!--                                                    Estimated Value-->
<!--                                                    <span class="error">*</span>-->
<!--                                                </label>-->
<!--                                                <input-->
<!--                                                    type="text"-->
<!--                                                    class="form-control"-->
<!--                                                    placeholder=""-->
<!--                                                    v-model.trim="v$.form_data.combined_service_estimated_value.$model"-->
<!--                                                />-->
<!--                                                <div class="error" v-if="v$.form_data.combined_service_estimated_value.required.$invalid && show_error_fourteen">-->
<!--                                                    Estimated value is required-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->


<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        &lt;!&ndash;item type reholder&ndash;&gt;-->
<!--                        <div class="col-md-12" v-if="showItemTypeReholderBox">-->
<!--                            <div class="card shipping_address_card">-->
<!--                                <div class="card-body">-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-1">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100">-->
<!--                                                    Qty-->
<!--                                                </label>-->
<!--                                                <input-->
<!--                                                    type="text"-->
<!--                                                    class="form-control"-->
<!--                                                    placeholder=""-->
<!--                                                    v-model.trim="form_data.item_qty"-->
<!--                                                    readonly-->
<!--                                                />-->
<!--&lt;!&ndash;                                                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
<!--&lt;!&ndash;                                                    contact name is required&ndash;&gt;-->
<!--&lt;!&ndash;                                                </div>&ndash;&gt;-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <div class="col-md-9">-->
<!--                                            <div class="row">-->
<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Certification Number-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.reholder_certification_number.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.reholder_certification_number.required.$invalid && show_error_fifteen">-->
<!--                                                            Certification number is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <div class="col-md-2">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100">-->
<!--                                                    Estimated Value-->
<!--                                                    <span class="error">*</span>-->
<!--                                                </label>-->
<!--                                                <input-->
<!--                                                    type="text"-->
<!--                                                    class="form-control"-->
<!--                                                    placeholder=""-->
<!--                                                    v-model.trim="v$.form_data.reholder_estimated_value.$model"-->
<!--                                                />-->
<!--                                                <div class="error" v-if="v$.form_data.reholder_estimated_value.required.$invalid && show_error_fifteen">-->
<!--                                                    Estimated value is required-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->


<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        &lt;!&ndash;item type crossover&ndash;&gt;-->
<!--                        <div class="col-md-12" v-if="showItemTypeCrossoverBox">-->
<!--                            <div class="card shipping_address_card">-->
<!--                                <div class="card-body">-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-1">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100">-->
<!--                                                    Qty-->
<!--                                                </label>-->
<!--                                                <input-->
<!--                                                    type="text"-->
<!--                                                    class="form-control"-->
<!--                                                    placeholder=""-->
<!--                                                    v-model.trim="form_data.item_qty"-->
<!--                                                    readonly-->
<!--                                                />-->
<!--&lt;!&ndash;                                                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
<!--&lt;!&ndash;                                                    contact name is required&ndash;&gt;-->
<!--&lt;!&ndash;                                                </div>&ndash;&gt;-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <div class="col-md-9">-->
<!--                                            <div class="row">-->
<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #1   (Year,Manufacturer,Set,Other)-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.crossover_description_one.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.crossover_description_one.required.$invalid && show_error_sixteen">-->
<!--                                                            Description one is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #2-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.crossover_description_two.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.crossover_description_two.required.$invalid && show_error_sixteen">-->
<!--                                                            Description two is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Description #3-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.crossover_description_three.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.crossover_description_three.required.$invalid && show_error_sixteen">-->
<!--                                                            Description three is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-6">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Serial Number   (Only if printed directly on item)-->
<!--&lt;!&ndash;                                                            <span class="error">*</span>&ndash;&gt;-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="form_data.crossover_serial_number"-->
<!--                                                        />-->
<!--                                                        &lt;!&ndash;                                                        <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
<!--                                                        &lt;!&ndash;                                                            contact name is required&ndash;&gt;-->
<!--                                                        &lt;!&ndash;                                                        </div>&ndash;&gt;-->
<!--                                                    </div>-->
<!--                                                </div>-->

<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="row">-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">-->
<!--                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">-->
<!--                                                                    Autographed-->
<!--                                                                </label>-->
<!--                                                                <input-->
<!--                                                                    type="checkbox"-->
<!--                                                                    class="form-check"-->
<!--                                                                    placeholder=""-->
<!--                                                                    v-model.trim="form_data.crossover_autographed"-->
<!--                                                                />-->
<!--                                                                &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">&ndash;&gt;-->
<!--                                                                &lt;!&ndash;                                                Same as Billing is required&ndash;&gt;-->
<!--                                                                &lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3">-->
<!--                                                                <label class="form-label w-100 text-capitalize">-->
<!--                                                                    Authenticator Name-->
<!--                                                                    <span class="error" v-if="form_data.crossover_autographed">*</span>-->
<!--                                                                </label>-->
<!--                                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
<!--                                                                        v-model.trim="v$.form_data.crossover_authenticator_name.$model"-->
<!--                                                                >-->
<!--                                                                    <option selected disabled>Open this select menu</option>-->
<!--                                                                    <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>-->
<!--                                                                </select>-->
<!--                                                                &lt;!&ndash;                                                            <Select2 v-model="form_data.authenticator_name_two" :options="authenticators" />&ndash;&gt;-->
<!--                                                                <div class="error" v-if="v$.form_data.crossover_authenticator_name.required.$invalid && show_error_sixteen">-->
<!--                                                                    Authenticator Name is required-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div class="col-md-4">-->
<!--                                                            <div class="mb-3">-->
<!--                                                                <label class="form-label w-100">-->
<!--                                                                    Authenticator Cert. No.-->
<!--                                                                    <span class="error" v-if="form_data.crossover_autographed">*</span>-->
<!--                                                                </label>-->
<!--                                                                <input-->
<!--                                                                    type="text"-->
<!--                                                                    class="form-control"-->
<!--                                                                    placeholder=""-->
<!--                                                                    v-model.trim="v$.form_data.crossover_authenticator_cert_no.$model"-->
<!--                                                                />-->
<!--                                                                <div class="error" v-if="v$.form_data.crossover_authenticator_cert_no.required.$invalid && show_error_sixteen">-->
<!--                                                                    Authenticator cert. no. is required-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <div class="col-md-2">-->
<!--                                            <div class="row">-->
<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100">-->
<!--                                                            Estimated Value-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                            placeholder=""-->
<!--                                                            v-model.trim="v$.form_data.crossover_estimated_value.$model"-->
<!--                                                        />-->
<!--                                                        <div class="error" v-if="v$.form_data.crossover_estimated_value.required.$invalid && show_error_sixteen">-->
<!--                                                            Estimated value is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="col-md-12">-->
<!--                                                    <div class="mb-3">-->
<!--                                                        <label class="form-label w-100 text-capitalize">-->
<!--                                                            Minimum Grade-->
<!--                                                            <span class="error">*</span>-->
<!--                                                        </label>-->
<!--                                                        <select class="form-select mb-text-only" aria-label="Default select example"-->
<!--                                                                v-model.trim="v$.form_data.crossover_minimum_grade.$model"-->
<!--                                                        >-->
<!--                                                            <option selected disabled>Open this select menu</option>-->
<!--                                                            <option v-for="(grade,index) in minimumGrades" :value="grade.id" :key="grade.id">{{grade.name}}</option>-->
<!--                                                        </select>-->
<!--                                                        &lt;!&ndash;                                                    <Select2 v-model="form_data.minimum_grade" :options="minimumGrades" />&ndash;&gt;-->
<!--                                                        <div class="error" v-if="v$.form_data.crossover_minimum_grade.required.$invalid && show_error_sixteen">-->
<!--                                                            Minimum grade is required-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </tab-content>-->
            </form-wizard>
        </form>
    </div>
</template>

<script>
import VuePhoneNumberInput from 'vue-phone-number-input';
import { useVuelidate } from '@vuelidate/core'
import {required, email, requiredIf, numeric} from '@vuelidate/validators'
// import {isReadonly} from "vue";


export default {
    name: "EditEntry",
    props: ["customers","promos","parties","authenticators","item"],
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
            // customers: [
            //     {
            //         "id":1,
            //         "name":"Customer 1"
            //     },
            //     {
            //         "id":2,
            //         "name":"Customer 2"
            //     },
            //     {
            //         "id":3,
            //         "name":"Customer 3"
            //     },
            //     {
            //         "id":4,
            //         "name":"Customer 4"
            //     },
            //     {
            //         "id":5,
            //         "name":"Customer 5"
            //     },
            // ],
            // promoCodes: [
            //     {
            //         'id':1,
            //         'name':'promo - 1',
            //     },
            //     {
            //         'id':2,
            //         'name':'promo - 2',
            //     },
            //     {
            //         'id':3,
            //         'name':'promo - 3',
            //     },
            //     {
            //         'id':4,
            //         'name':'promo - 1',
            //     },
            //     {
            //         'id':5,
            //         'name':'promo - 1',
            //     },
            // ],
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
            // thirdParties: [
            //     {
            //         'id':1,
            //         'name':'Third party - 1',
            //     },
            //     {
            //         'id':2,
            //         'name':'Third party - 2',
            //     },
            //     {
            //         'id':3,
            //         'name':'Third party - 3',
            //     },
            //     {
            //         'id':4,
            //         'name':'Third party - 4',
            //     },
            // ],
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
            // authenticators:[
            //     {
            //         'id':1,
            //         'name':'Auth 1'
            //     },
            //     {
            //         'id':2,
            //         'name':'Auth 2'
            //     },
            //     {
            //         'id':3,
            //         'name':'Auth 3'
            //     },
            //     {
            //         'id':4,
            //         'name':'Auth 4'
            //     },
            //     {
            //         'id':5,
            //         'name':'Auth 5'
            //     },
            // ],
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
                customer: '',
                name: '',
                customerId: '',
                // email:'',
                contact_name:'',
                item_qty:1,
                billing_address_line_one:'',
                billing_address_line_two:'',
                billing_country:'',
                billing_province:'',
                billing_city:'',
                billing_postal:'',
                billing_phone:'',
                same_as_billing:false,
                autographed:false,
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
                submission_date:'',
                products:[],
                itemType:'',

                //next
                grading_location:'',
                promo_code:'',
                payment_made:'',
                pay_on_pickup:'',
                cod:'',
                shopify_order_number:'',
                shipping_method:'',
                pickup_location:'',
                show_pickup_location:'',
                third_party_drop_center:'',
                use_customer_account:'',
                customer_account_number:'',
                crossover_item_type:'',
                authenticator_name:'',
                authenticator_name_two:'',
                authenticator_name_three:'',
                authenticator_name_four:'',
                crossover_minimum_grade:'',

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
            },

        }
    },
    mounted() {
        let self = this;

        self.form_data.customer= {
            id:self.item.customer_id,
            name:self.item.customer_name,
        },
            self.form_data.name= self.item.customer_name,
            self.form_data.customerId= self.item.customer_id,
            // email:'',
            self.form_data.contact_name= self.item.contact_name,
            self.form_data.item_qty= self.item.item_qty,
            self.form_data.billing_address_line_one= self.item.billing_address_line_one,
            self.form_data.billing_address_line_two= self.item.billing_address_line_two,
            self.form_data.billing_country= self.item.billing_country,
            self.form_data.billing_province= self.item.billing_province,
            self.form_data.billing_city= self.item.billing_city,
            self.form_data.billing_postal= self.item.billing_postal,
            self.form_data.billing_phone= self.item.billing_phone,
            self.form_data.same_as_billing= self.item.same_as_billing,
            self.form_data.autographed= self.item.autographed,
            self.form_data.shipping_name= self.item.shipping_name,
            self.form_data.shipping_company_name= self.item.shipping_company_name,
            self.form_data.shipping_address_line_one= self.item.shipping_address_line_one;
            self.form_data.shipping_address_line_two= self.item.shipping_address_line_two,
            self.form_data.shipping_country= self.item.shipping_country,
            self.form_data.shipping_province= self.item.shipping_province,
            self.form_data.shipping_city= self.item.shipping_city,
            self.form_data.shipping_postal= self.item.shipping_postal,
            self.form_data.shipping_phone= self.item.shipping_phone,
            self.form_data.status= self.item.status,
            self.form_data.submission_date= self.item.submission_date,
            self.form_data.products= self.item.products,
            self.form_data.itemType= self.item.itemType,

            //next
            self.form_data.grading_location= self.item.grading_location,
            self.form_data.promo_code= self.item.promo_code,
            self.form_data.payment_made= self.item.payment_made,
            self.form_data.pay_on_pickup= self.item.pay_on_pickup,
            self.form_data.cod= self.item.cod,
            self.form_data.shopify_order_number= self.item.shopify_order_number,
            self.form_data.shipping_method= self.item.shipping_method,
            self.form_data.pickup_location= self.item.pickup_location,
            self.form_data.show_pickup_location= self.item.show_pickup_location,
            self.form_data.third_party_drop_center= self.item.third_party_drop_center,
            self.form_data.use_customer_account= self.item.use_customer_account,
            self.form_data.customer_account_number= self.item.customer_account_number,
            self.form_data.crossover_item_type= self.item.crossover_item_type,
            self.form_data.authenticator_name= self.item.authenticator_name,
            self.form_data.authenticator_name_two= self.item.authenticator_name_two,
            self.form_data.authenticator_name_three= self.item.authenticator_name_three,
            self.form_data.authenticator_name_four= self.item.authenticator_name_four,
            self.form_data.crossover_minimum_grade= self.item.crossover_minimum_grade,

            //item type card
            self.form_data.card_description_one= self.item.card_description_one,
            self.form_data.card_description_two= self.item.card_description_two,
            self.form_data.card_description_three= self.item.card_description_three,
            self.form_data.card_serial_number= self.item.card_serial_number,
            self.form_data.card_autographed= self.item.card_autographed,
            self.form_data.card_authenticator_name= self.item.card_authenticator_name,
            self.form_data.card_authenticator_cert_no= self.item.card_authenticator_cert_no,
            self.form_data.card_estimated_value= self.item.card_estimated_value,

            //item type auto authentication
            self.form_data.auto_authentication_description_one= self.item.auto_authentication_description_one,
            self.form_data.auto_authentication_description_two= self.item.auto_authentication_description_two,
            self.form_data.auto_authentication_description_three= self.item.auto_authentication_description_three,
            self.form_data.auto_authentication_serial_number= self.item.auto_authentication_serial_number,
            self.form_data.auto_authentication_autographed= self.item.auto_authentication_autographed,
            self.form_data.auto_authentication_authenticator_name= self.item.auto_authentication_authenticator_name,
            self.form_data.auto_authentication_authenticator_cert_no= self.item.auto_authentication_authenticator_cert_no,
            self.form_data.auto_authentication_estimated_value= self.item.auto_authentication_estimated_value,

            //item type combined service
            self.form_data.combined_service_description_one= self.item.combined_service_description_one,
            self.form_data.combined_service_description_two= self.item.combined_service_description_two,
            self.form_data.combined_service_description_three= self.item.combined_service_description_three,
            self.form_data.combined_service_serial_number= self.item.combined_service_serial_number,
            self.form_data.combined_service_autographed= self.item.combined_service_autographed,
            self.form_data.combined_service_authenticator_name= self.item.combined_service_authenticator_name,
            self.form_data.combined_service_authenticator_cert_no= self.item.combined_service_authenticator_cert_no,
            self.form_data.combined_service_estimated_value= self.item.combined_service_estimated_value,

            //item type combined service
            self.form_data.reholder_certification_number= self.item.reholder_certification_number,
            self.form_data.reholder_estimated_value= self.item.reholder_estimated_value,

            //item type crossover
            self.form_data.crossover_description_one= self.item.crossover_description_one,
            self.form_data.crossover_description_two= self.item.crossover_description_two,
            self.form_data.crossover_description_three= self.item.crossover_description_three,
            self.form_data.crossover_serial_number= self.item.crossover_serial_number,
            self.form_data.crossover_autographed= self.item.crossover_autographed,
            self.form_data.crossover_authenticator_name= self.item.crossover_authenticator_name,
            self.form_data.crossover_authenticator_cert_no= self.item.crossover_authenticator_cert_no;
            self.form_data.crossover_estimated_value= self.item.crossover_estimated_value;

            if (self.form_data.shipping_method == "Pickup"){
                self.showPickupLocationBox=true;
            }else if(self.form_data.shipping_method == "Show Pickup") {
                self.showShowPickupLocationBox = true;
            }else if(self.form_data.shipping_method == "Return to Third Party"){
                self.showThirdPartyBox=true;
            }else if(self.form_data.shipping_method == "Delivery"){
                self.showPickupLocationBox=false;
                self.showShowPickupLocationBox = false;
                self.showThirdPartyBox=false;
                self.showUPSBox=false;
            } else {
                self.showUPSBox=true;
            }
    },
    methods:{
        async submit(){
            if (this.checkSixthStep()){
                Swal.fire({
                    // title: "Are the selected product offerings applicable for drop off center: <br> West's Card Edmonton",
                    title: `Do you want to update this order: <br> ${this.form_data.name}`,
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
                            .put(`/admin/entries/${this.item.id}`, this.form_data)
                            .then(function (response) {
                                console.log(response)
                                Swal.fire("Update!", "", "success").then((result)=>{
                                    if (result.isConfirmed){
                                        if (response.status == 200){
                                            window.location.href = `/admin/entries/${response.data.id}`;
                                        }
                                    }
                                });

                                // window.location.reload()
                                // window.location.href = "/admin/thirds";
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
                        window.location.href = "/admin/entries";
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
            if (this.v$.form_data.name.$invalid) {
                this.show_error_one = true;
                return false;
            }
            this.completed_step_count = 1;
            this.form_wizard_subtitle = 'Please Continue to next'
            return true;

        },
        checkSecondStep(){
            this.v$.$touch()
            if (this.v$.form_data.grading_location.$invalid) {
                this.show_error_two = true;
                return false;
            }
            this.completed_step_count = 2;
            this.form_wizard_subtitle = 'Please Continue to next'
            return true;
        },
        checkThirdStep(){
            this.v$.$touch()
            if (this.v$.form_data.billing_address_line_one.$invalid ||
                this.v$.form_data.billing_country.$invalid ||
                this.v$.form_data.billing_province.$invalid ||
                this.v$.form_data.billing_city.$invalid ||
                this.v$.form_data.billing_postal.$invalid ||
                this.v$.form_data.billing_phone.$invalid
            ) {
                this.show_error_three = true;
                return false;
            }
            this.completed_step_count = 3;
            this.form_wizard_subtitle = 'Almost Done'
            return true;
        },
        checkFourthStep(){
            this.v$.$touch()
            if (this.v$.form_data.shipping_address_line_one.$invalid ||
                this.v$.form_data.shipping_country.$invalid ||
                this.v$.form_data.shipping_province.$invalid ||
                this.v$.form_data.shipping_city.$invalid ||
                this.v$.form_data.shipping_postal.$invalid ||
                this.v$.form_data.shipping_phone.$invalid
            ) {
                this.show_error_four = true;
                return false;
            }
            this.completed_step_count = 4;
            this.form_wizard_subtitle = 'Almost Done'
            return true;
        },
        checkFifthStep(){
            this.v$.$touch()
            if (this.v$.form_data.submission_date.$invalid) {
                this.show_error_five = true;
                return false;
            }else {
                return true;
            }
        },
        checkSixthStep(){
            this.v$.$touch()
            if (this.v$.form_data.shipping_method.$invalid) {
                this.show_error_six = true;
                return false;
            }else if (this.v$.form_data.pickup_location.$invalid) {
                this.show_error_seven = true;
                return false;
            }else if (this.v$.form_data.show_pickup_location.$invalid) {
                this.show_error_eight = true;
                return false;
            }else if (this.v$.form_data.third_party_drop_center.$invalid) {
                this.show_error_nine = true;
                return false;
            }else if (this.v$.form_data.customer_account_number.$invalid) {
                this.show_error_ten = true;
                return false;
            }else {
                return true;
            }
        },
        checkSeventhStep(){
            this.v$.$touch()
            if (this.v$.form_data.itemType.$invalid) {
                this.show_error_eleven = true;
                return false;
            }else if (this.v$.form_data.card_description_one.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.card_description_two.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.card_description_three.$invalid) {
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
            }else if (this.v$.form_data.auto_authentication_description_two.$invalid) {
                this.show_error_thirteen = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_description_three.$invalid) {
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
            }else if (this.v$.form_data.combined_service_description_two.$invalid) {
                this.show_error_fourteen = true;
                return false;
            }else if (this.v$.form_data.combined_service_description_three.$invalid) {
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
            }else if (this.v$.form_data.crossover_description_two.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_description_three.$invalid) {
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
            window.location.assign("/admin/entries");
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
        itemTypeChangeEvent(){
            if (this.form_data.itemType == 'Card'){
                this.showItemTypeCardBox=true;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
            }
            if (this.form_data.itemType == 'Auto Authentication'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=true;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
            }
            if (this.form_data.itemType == 'Combined Service'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=true;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
            }
            if (this.form_data.itemType == 'Reholder'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=true;
                this.showItemTypeCrossoverBox=false;
            }
            if (this.form_data.itemType == 'Crossover'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=true;
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
    },

    validations: {
        form_data: {
            name: {
                required,
            },
            grading_location: {
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
            submission_date:{
                required,
            },
            shipping_method:{
                required,
            },
            pickup_location:{
                required: requiredIf(function () {
                    return this.showPickupLocationBox // return true if this field is required
                })
            },
            show_pickup_location:{
                required: requiredIf(function () {
                    return this.showShowPickupLocationBox // return true if this field is required
                })
            },
            third_party_drop_center:{
                required: requiredIf(function () {
                    return this.showThirdPartyBox // return true if this field is required
                })
            },
            customer_account_number:{
                required: requiredIf(function () {
                    return this.showUPSBox // return true if this field is required
                }),
            },
            itemType:{
                required,
            },
            //item type card
            card_description_one:{
                required: requiredIf(function () {
                    return this.showItemTypeCardBox // return true if this field is required
                }),
            },
            card_description_two:{
                required: requiredIf(function () {
                    return this.showItemTypeCardBox // return true if this field is required
                }),
            },
            card_description_three:{
                required: requiredIf(function () {
                    return this.showItemTypeCardBox // return true if this field is required
                }),
            },
            card_authenticator_name:{
                required: requiredIf(function () {
                    return this.form_data.card_autographed;// return true if this field is required
                }),
            },
            card_authenticator_cert_no:{
                required: requiredIf(function () {
                    return this.form_data.card_autographed; // return true if this field is required
                }),
            },
            card_estimated_value:{
                required: requiredIf(function () {
                    return this.showItemTypeCardBox // return true if this field is required
                }),
            },
            //item type auto athentication
            auto_authentication_description_one:{
                required: requiredIf(function () {
                    return this.showItemTypeAutoAthenticationBox // return true if this field is required
                }),
            },
            auto_authentication_description_two:{
                required: requiredIf(function () {
                    return this.showItemTypeAutoAthenticationBox // return true if this field is required
                }),
            },
            auto_authentication_description_three:{
                required: requiredIf(function () {
                    return this.showItemTypeAutoAthenticationBox // return true if this field is required
                }),
            },
            auto_authentication_authenticator_name:{
                required: requiredIf(function () {
                    return this.form_data.auto_authentication_autographed; // return true if this field is required
                }),
            },
            auto_authentication_authenticator_cert_no:{
                required: requiredIf(function () {
                    return this.form_data.auto_authentication_autographed; // return true if this field is required
                }),
            },
            auto_authentication_estimated_value:{
                required: requiredIf(function () {
                    return this.showItemTypeAutoAthenticationBox // return true if this field is required
                }),
            },
            //item type combined service
            combined_service_description_one:{
                required: requiredIf(function () {
                    return this.showItemTypeCombinedServiceBox // return true if this field is required
                }),
            },
            combined_service_description_two:{
                required: requiredIf(function () {
                    return this.showItemTypeCombinedServiceBox // return true if this field is required
                }),
            },
            combined_service_description_three:{
                required: requiredIf(function () {
                    return this.showItemTypeCombinedServiceBox // return true if this field is required
                }),
            },
            combined_service_authenticator_name:{
                required: requiredIf(function () {
                    return this.form_data.combined_service_autographed; // return true if this field is required
                }),
            },
            combined_service_authenticator_cert_no:{
                required: requiredIf(function () {
                    return this.form_data.combined_service_autographed; // return true if this field is required
                }),
            },
            combined_service_estimated_value:{
                required: requiredIf(function () {
                    return this.showItemTypeCombinedServiceBox // return true if this field is required
                }),
            },
            //item type reholder
            reholder_certification_number:{
                required: requiredIf(function () {
                    return this.showItemTypeReholderBox // return true if this field is required
                }),
            },
            reholder_estimated_value:{
                required: requiredIf(function () {
                    return this.showItemTypeReholderBox // return true if this field is required
                }),
            },

            //item type crossover
            crossover_description_one:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
            },
            crossover_description_two:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
            },
            crossover_description_three:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
            },
            crossover_authenticator_name:{
                required: requiredIf(function () {
                    return this.form_data.crossover_autographed; // return true if this field is required
                }),
            },
            crossover_authenticator_cert_no:{
                required: requiredIf(function () {
                    return this.form_data.crossover_autographed; // return true if this field is required
                }),
            },
            crossover_estimated_value:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
            },
            crossover_minimum_grade:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
            },
            crossover_item_type:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
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
