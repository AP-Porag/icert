<template>
<div class="">
    <form>
        <form-wizard
            @on-complete="submit"
            @on-change="tabChanged"
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
                                                Drop Off Center
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
                                            <label class="form-label w-100">
                                                Contact Name
                                                <span class="error">*</span>
                                            </label>
                                            <input
                                                autofocus
                                                type="text"
                                                class="form-control"
                                                placeholder="contact name"
                                                v-model.trim="v$.form_data.contact_name.$model"
                                            />
                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error">
                                                contact name is required
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
                                                placeholder="email"
                                                v-model.trim="v$.form_data.email.$model"
                                            />
                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error">
                                                email is required
                                            </div>
                                            <div class="error" v-if="v$.form_data.email.email.$invalid && show_error">
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
<!--            <tab-content-->
<!--                title="Billing Address"-->
<!--                icon="ti-infinite"-->
<!--                :before-change="checkSecondStep"-->
<!--            >-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!--                        <div class="card shipping_address_card">-->
<!--                            <div class="card-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Drop Off Center-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="customer name"-->
<!--                                                v-model.trim="v$.form_data.name.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
<!--                                                Name is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100">-->
<!--                                                Contact Name-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="contact name"-->
<!--                                                v-model.trim="v$.form_data.contact_name.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error">-->
<!--                                                contact name is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Email Address-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="email"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="email"-->
<!--                                                v-model.trim="v$.form_data.email.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error">-->
<!--                                                email is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-12">-->
<!--                        <div class="card shipping_address_card">-->
<!--                            <div class="card-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-6">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Address Line one-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="address line one"-->
<!--                                                v-model.trim="v$.form_data.billing_address_line_one.$model"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.billing_address_line_one.required.$invalid && show_error">-->
<!--                                                One Address Line is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Address Line two-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="address line two"-->
<!--                                                v-model.trim="v$.form_data.billing_address_line_two.$model"-->
<!--                                            />-->
<!--&lt;!&ndash;                                            <div class="error" v-if="v$.form_data.billing_address_line_two.required.$invalid && show_error">&ndash;&gt;-->
<!--&lt;!&ndash;                                                Second address Line two is required&ndash;&gt;-->
<!--&lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-7">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Country-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <select class="form-select" aria-label="Default select example"-->
<!--                                                    v-model.trim="v$.form_data.billing_country.$model"-->
<!--                                            >-->
<!--                                                <option selected disabled>Open this select menu</option>-->
<!--                                                <option v-for="(country,index) in countries" :key="country.id">{{country.name}}</option>-->
<!--                                            </select>-->
<!--                                            <div class="error" v-if="v$.form_data.billing_country.required.$invalid && show_error">-->
<!--                                                Country is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-5">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Province/State-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <select class="form-select" aria-label="Default select example"-->
<!--                                                    v-model.trim="v$.form_data.billing_province.$model"-->
<!--                                            >-->
<!--                                                <option selected disabled>Open this select menu</option>-->
<!--                                                <option v-for="(province,index) in provinces" :key="province.id">{{province.name}}</option>-->
<!--                                            </select>-->
<!--                                            <div class="error" v-if="v$.form_data.billing_province.required.$invalid && show_error">-->
<!--                                                Province is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                City-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="city"-->
<!--                                                v-model.trim="v$.form_data.billing_city.$model"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.billing_city.required.$invalid && show_error">-->
<!--                                                City is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                postal/Zip code-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="postal/zip code"-->
<!--                                                v-model.trim="v$.form_data.billing_postal.$model"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.billing_postal.required.$invalid && show_error">-->
<!--                                                Postal is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Telephone#-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <VuePhoneNumberInput-->
<!--                                                id="phoneNumber1"-->
<!--                                                v-model.trim="v$.form_data.billing_phone.$model"-->
<!--                                                default-country-code="CA"-->
<!--                                                :only-countries="countries_phone"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.billing_phone.required.$invalid && show_error">-->
<!--                                                Phone is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </tab-content>-->
<!--            <tab-content-->
<!--                title="Shipping Address"-->
<!--                icon="ti-map-alt"-->
<!--                :before-change="checkThirdStep"-->
<!--            >-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!--                        <div class="card shipping_address_card">-->
<!--                            <div class="card-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Drop Off Center-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="customer name"-->
<!--                                                v-model.trim="v$.form_data.name.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">-->
<!--                                                Name is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100">-->
<!--                                                Contact Name-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="contact name"-->
<!--                                                v-model.trim="v$.form_data.contact_name.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error">-->
<!--                                                contact name is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Email Address-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="email"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="email"-->
<!--                                                v-model.trim="v$.form_data.email.$model"-->
<!--                                                readonly-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error">-->
<!--                                                email is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <div class="col-md-12">-->
<!--                        <div class="card shipping_address_card">-->
<!--                            <div class="card-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-12">-->
<!--                                        <div class="mb-3 d-flex justify-content-start">-->
<!--                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">-->
<!--                                                Same as billing address-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="checkbox"-->
<!--                                                class="form-check"-->
<!--                                                placeholder="same as billing address"-->
<!--                                                v-model.trim="v$.form_data.same_as_billing.$model"-->
<!--                                            />-->
<!--&lt;!&ndash;                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">&ndash;&gt;-->
<!--&lt;!&ndash;                                                Same as Billing is required&ndash;&gt;-->
<!--&lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Name (if different)-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="name"-->
<!--                                                v-model.trim="v$.form_data.shipping_name.$model"-->
<!--                                            />-->
<!--&lt;!&ndash;                                            <div class="error" v-if="v$.form_data.shipping_name.required.$invalid && show_error">&ndash;&gt;-->
<!--&lt;!&ndash;                                                Name for shipping is required&ndash;&gt;-->
<!--&lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Company name-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="company name"-->
<!--                                                v-model.trim="v$.form_data.shipping_company_name.$model"-->
<!--                                            />-->
<!--&lt;!&ndash;                                            <div class="error" v-if="v$.form_data.shipping_company_name.required.$invalid && show_error">&ndash;&gt;-->
<!--&lt;!&ndash;                                                Company name is required&ndash;&gt;-->
<!--&lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Address Line one-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="address line one"-->
<!--                                                v-model.trim="v$.form_data.shipping_address_line_one.$model"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.shipping_address_line_one.required.$invalid && show_error">-->
<!--                                                One Address is required for shipping-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-6">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Address Line two-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="address line two"-->
<!--                                                v-model.trim="v$.form_data.shipping_address_line_two.$model"-->
<!--                                            />-->
<!--&lt;!&ndash;                                            <div class="error" v-if="v$.form_data.shipping_address_line_two.required.$invalid && show_error">&ndash;&gt;-->
<!--&lt;!&ndash;                                                Second shipping address required&ndash;&gt;-->
<!--&lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-7">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Country-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="country"-->
<!--                                                v-model.trim="v$.form_data.shipping_country.$model"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.shipping_country.required.$invalid && show_error">-->
<!--                                                country is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-5">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Province/State-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="province"-->
<!--                                                v-model.trim="v$.form_data.shipping_province.$model"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.shipping_province.required.$invalid && show_error">-->
<!--                                                province is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                City-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="city"-->
<!--                                                v-model.trim="v$.form_data.shipping_city.$model"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.shipping_city.required.$invalid && show_error">-->
<!--                                                city is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                postal/Zip code-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder="postal/zip code"-->
<!--                                                v-model.trim="v$.form_data.shipping_postal.$model"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.shipping_postal.required.$invalid && show_error">-->
<!--                                                Postal is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-uppercase">-->
<!--                                                Telephone#-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <VuePhoneNumberInput-->
<!--                                                id="phoneNumber1"-->
<!--                                                v-model.trim="v$.form_data.shipping_phone.$model"-->
<!--                                                default-country-code="CA"-->
<!--                                                :only-countries="countries_phone"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.shipping_phone.required.$invalid && show_error">-->
<!--                                                Phone is required-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                </div>-->
<!--            </tab-content>-->
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
                                            <div class="d-flex justify-content-start w-100">
                                                <div class="form-check form-check-inline check_right_margin">
                                                    <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"
                                                           v-model.trim="v$.form_data.status.$model"
                                                    />
                                                </div>

                                                <div class="form-check form-check-inline check_right_margin">
                                                    <label class="form-check-label" for="inlineRadio2">Suspend</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"
                                                           v-model.trim="v$.form_data.status.$model"
                                                    />
                                                </div>

                                                <div class="form-check form-check-inline check_right_margin">
                                                    <label class="form-check-label" for="inlineRadio3">Delete</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"
                                                           v-model.trim="v$.form_data.status.$model"
                                                    />
                                                </div>
                                            </div>
                                            <div class="error" v-if="v$.form_data.status.required.$invalid && show_error">
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
                                <p class="font-size-18 mb-3">Check only the product offering at this drop off center</p>
                                <div class="row">
                                    <div class="col-md-3" v-for="(product,index) in products" :key="product.id">
                                        <div class="mb-3 d-flex justify-content-between w-75">
                                            <label class="form-label text-uppercase" style="margin-top: 6px;margin-right: 15px;">
                                                {{product.name}}
                                            </label>
                                            <input
                                                autofocus
                                                type="checkbox"
                                                class="form-check"
                                                v-model.trim="v$.form_data.products.$model"
                                            />
                                        </div>
                                    </div>
                                    <div class="error" v-if="v$.form_data.products.required.$invalid && show_error">
                                        Products is required
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


export default {
    name: "CreateThirdPartyDropOff",
    components: {
        VuePhoneNumberInput,
    },
    setup: () => ({ v$: useVuelidate() }),
    data(){
        return{
            show_error: false,
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
            products:[
                {
                    "id": 1,
                    "name": "Check"
                },
                {
                    "id": 2,
                    "name": "Display Box"
                },
                {
                    "id": 3,
                    "name": "First Day Cover"
                },
                {
                    "id": 4,
                    "name": "Food"
                },
                {
                    "id": 5,
                    "name": "Index Card"
                },
                {
                    "id": 6,
                    "name": "Pack"
                },
                {
                    "id": 7,
                    "name": "Pass"
                },
                {
                    "id": 8,
                    "name": "Photo"
                },
                {
                    "id": 9,
                    "name": "Postcard"
                },
                {
                    "id": 10,
                    "name": "Rack Pack"
                },
                {
                    "id": 11,
                    "name": "Set"
                },
                {
                    "id": 12,
                    "name": "Ticket"
                },
                {
                    "id": 13,
                    "name": "Wax Box"
                },
                {
                    "id": 14,
                    "name": "Wrapper"
                },
                {
                    "id": 15,
                    "name": "Reholder"
                },
                {
                    "id": 16,
                    "name": "Crossover"
                }
            ],
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
                status:'',
                products:[],
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
            this.v$.$touch()
            if (this.v$.form_data.name.$invalid || this.v$.form_data.contact_name.$invalid || this.v$.form_data.email.$invalid) {
                this.show_error = true;
                return false;
            }
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
            this.completed_step_count = 4;
            this.form_wizard_subtitle = 'Almost Done'
            return true;
        },
        tabChanged(oldIndex, newIndex){
            console.log('tab change called')
            console.log(oldIndex)
            console.log(newIndex)
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
.shipping_address_card{
    background: #eeeeee;
}
.check_right_margin{
    margin-right: 100px;
}
.error{
    text-transform: capitalize;
}
</style>
