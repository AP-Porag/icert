<template>
<div class="">
    <form>
        <!--            :title="`Create Third party with ${step_count} steps`"-->
<!--        :subtitle="form_wizard_subtitle"-->
        <form-wizard
            @on-complete="submit"
            @on-change="handleTabChange"
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
<!--            <tab-content-->
<!--                title="General Info"-->
<!--                icon="ti-user"-->
<!--                :before-change="checkFirstStep"-->
<!--            >-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!--                        <div class="card shipping_address_card">-->
<!--                            <div class="card-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-capitalize">-->
<!--                                                Name-->
<!--                                                <span class="error">*</span>-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control"-->
<!--                                                placeholder=""-->
<!--                                                v-model.trim="v$.form_data.name.$model"-->
<!--                                                ref="name"-->
<!--                                                readonly="readonly"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">-->
<!--                                                Name is required-->
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
<!--                        <div class="card shipping_address_card">-->
<!--                            <div class="card-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label w-100 text-capitalize">-->
<!--                                                Name-->
<!--                                            </label>-->
<!--                                            <input-->
<!--                                                autofocus-->
<!--                                                type="text"-->
<!--                                                class="form-control md-readonly"-->
<!--                                                placeholder=""-->
<!--                                                v-model.trim="v$.form_data.name.$model"-->
<!--                                                ref="name"-->
<!--                                                readonly="readonly"-->
<!--                                            />-->
<!--                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">-->
<!--                                                Name is required-->
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
                                            <label class="form-label w-100 text-capitalize font_big_text text-center">
                                                Status (select one)
                                                <span class="error">*</span>
                                            </label>
                                            <div class="d-flex justify-content-center w-100">
                                                <div class="form-check form-check-inline check_right_margin">
                                                    <label class="form-check-label font_big_text" for="inlineRadio1">Active</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="active"
                                                           v-model.trim="v$.form_data.status.$model"
                                                    />
                                                </div>

                                                <div class="form-check form-check-inline check_right_margin">
                                                    <label class="form-check-label font_big_text" for="inlineRadio2">Suspend</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="suspend"
                                                           v-model.trim="v$.form_data.status.$model"
                                                    />
                                                </div>

                                                <div class="form-check form-check-inline check_right_margin">
                                                    <label class="form-check-label font_big_text" for="inlineRadio3">Delete</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="delete"
                                                           v-model.trim="v$.form_data.status.$model"
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
                                <p class="font-size-18 mb-3 font_big_text text-center">Check only the products that can be certified by this 3rd party authenticator</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="font_big_text" style="margin-top: 6px;margin-bottom: 15px;text-decoration: underline;"><input type="checkbox" :checked="isAllSelected" @click="selectAllCats" style="margin-left: 15px; margin-right: 5px;"><span style="margin-bottom: 10px;">Select All</span></label>
                                    </div>
                                    <div class="col-md-3" v-for="(product,index) in products" :key="product.id">
                                        <div class="mb-3 d-flex justify-content-start w-100">
                                            <label class="form-label text-capitalize font_big_text" style="margin-top: 6px;margin-left: 15px; display: flex;">
                                            <input
                                                type="checkbox"
                                                class="form-check mr-3"
                                                v-model.trim="v$.form_data.products.$model"
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


export default {
    name: "EditAuthenticator",
    props: ["item","products"],
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
            step_count:2,
            completed_step_count:'',
            form_wizard_subtitle:'Start here',
            isAllSelected: false,
            form_data:{
                name: '',
                status:'',
                products:[],
            },

        }
    },
    methods:{
        async submit(){
            if (this.checkFourthStep()){
                // alert('Yay. Done!');
                Swal.fire({
                    title: `Are the selected product offerings applicable for The Third Party Authenticator: <br> ${this.form_data.name}`,
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
                            .put(`/admin/authenticators/${this.item.id}`, this.form_data)
                            .then(function (res) {
                                console.log(res)
                                Swal.fire("Saved!", "", "success");
                                // window.location.reload()
                                window.location.href = "/admin/authenticators";
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
                        window.location.href = "/admin/authenticators";
                    }else if (result.isDenied) {
                        console.log(result.isDenied)
                        // Swal.fire("Changes are not saved", "", "info");
                    }
                });

            }else {
                return;
            }
        },
        checkFirstStep(){
            this.v$.$touch()
            if (this.v$.form_data.name.$invalid) {
                this.show_error_one = true;
                return false;
            }
            this.completed_step_count = 1;
            this.form_wizard_subtitle = 'Awesome start lets Continue 😀'
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
            window.location.assign("/admin/authenticators");
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
    mounted() {
        let self = this;

            self.form_data.name = self.item.name
            self.form_data.status = self.item.status
            self.item.products.forEach((value, index) => {
                self.form_data.products.push(value.product_id)
            });
    },

    validations: {
        form_data: {
            name: {
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

<style>
.vue-form-wizard .wizard-nav .wizard-navigation .wizard-nav-pills {
    display: none !important;
}
.vue-form-wizard .wizard-nav .wizard-navigation .wizard-header {
    display: none !important;
}
.vue-form-wizard.md .wizard-icon-circle{
    display: none !important;
}
.stepTitle .active{
    display: none !important;
}
.wizard-progress-bar{
    display: none !important;
}
</style>
