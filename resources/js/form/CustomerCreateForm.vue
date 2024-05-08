<template>
    <div class="">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Customer Info</h4>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Name <span class="error">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Name" v-model.trim="v$.form_data.name.$model">
                        <div class="error" v-if="v$.form_data.name.required.$invalid && show_error">
                            Name is required
                        </div>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Email <span class="error">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Email" v-model.trim="v$.form_data.email.$model">
                        <div class="error" v-if="v$.form_data.email.required.$invalid && show_error">
                            Email is required
                        </div>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Contact Name</label>
                        <input type="text" name="contact_name" class="form-control" placeholder="Contact Name" v-model.trim="form_data.contact_name">
                        <!--                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error">-->
                        <!--                    Contact name is required-->
                        <!--                </div>-->
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Telephone <span class="error">*</span></label>
                        <VuePhoneNumberInput
                            id="phone"
                            name="phone"
                            v-model.trim="v$.form_data.phone.$model"
                            default-country-code="CA"
                            :only-countries="only_phone"
                        />
                        <div class="error" v-if="v$.form_data.phone.required.$invalid && show_error">
                            Telephone is required
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Billing Address</h4>
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
<!--                        <div class="col-md-4">-->
<!--                            <div class="mb-3">-->
<!--                                <label class="form-label w-100 text-capitalize">-->
<!--                                    Telephone#-->
<!--                                    <span class="error">*</span>-->
<!--                                </label>-->
<!--                                <VuePhoneNumberInput-->
<!--                                    id="phoneNumber1"-->
<!--                                    class="mb-text-only"-->
<!--                                    v-model.trim="v$.form_data.billing_phone.$model"-->
<!--                                    :readonly="isReadonly"-->
<!--                                    default-country-code="CA"-->
<!--                                    :only-countries="only_phone"-->
<!--                                    style="background-color: #e8f0fe !important;"-->
<!--                                />-->
<!--                                <div class="error" v-if="v$.form_data.billing_phone.required.$invalid && show_error_two">-->
<!--                                    Phone is required-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Shipping Address</h4>
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
                                Customer Name (if different)
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
                                    :only-countries="only_phone"
                                />
                                <div class="error" v-if="v$.form_data.shipping_phone.required.$invalid && show_error_three">
                                    Phone is required
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 offset-md-6 col-md-6">
                        <div class="text-end">
                            <button class="btn btn-primary waves-effect waves-lightml-2 me-2" @click="submitForm">
                                <i class="fa fa-save"></i> Save
                            </button>

                            <button class="btn btn-secondary waves-effect" @click="cancelCreate">
                                <i class="fa fa-times"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import VuePhoneNumberInput from 'vue-phone-number-input';
import { useVuelidate } from '@vuelidate/core'
import { required,email } from '@vuelidate/validators'
export default {
    name: "CustomerCreateForm",
    components: {
        VuePhoneNumberInput,
    },
    props: ['propFromBlade'],
    setup: () => ({ v$: useVuelidate() }),
    data(){
        return{
            show_error: false,
            only_phone:['CA','US','AU','NZ','GB'],
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
                phone:'',
                page: '',
            },
        }
    },
    mounted() {
        this.form_data.page = this.propFromBlade
        console.log(this.propFromBlade);
        console.log(this.form_data.page);
    },
    methods:{
        async submitForm(e){
            e.preventDefault();
            if (this.checkFormSubmit()){

                let self = this;
                axios
                    .post("/admin/customers", this.form_data)
                    .then(function (res) {
                        Swal.fire("Saved!", "", "success").then((result)=>{
                            if (result.isConfirmed) {
                                // window.location.href = "/admin/customers";
                                window.location.href = "/"+self.propFromBlade;
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
            }else {
                return;
            }
        },
        checkFormSubmit(){
            this.v$.$touch()
            if (this.v$.form_data.name.$invalid ||
                this.v$.form_data.email.$invalid ||
                // this.v$.form_data.contact_name.$invalid ||
                this.v$.form_data.phone.$invalid
            ) {
                this.show_error = true;
                return false;
            }else {
                return true;
            }
        },
        cancelCreate(e){
            e.preventDefault();
            // window.location.href = "/admin/customers";
            window.location.href = "/"+this.propFromBlade;
        },
        sameAsBillingChanged(event){
            if (this.form_data.same_as_billing){
                this.form_data.shipping_name = this.form_data.name
                this.form_data.shipping_company_name = this.form_data.contact_name
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
    },
    validations: {
        form_data: {
            name: {
                required,
            },
            // contact_name: {
            //     required,
            // },
            email: {
                required,
                email
            },
            phone:{
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
            // billing_phone:{
            //     required,
            // },
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
        }
    }
}
</script>

<style scoped>

</style>
