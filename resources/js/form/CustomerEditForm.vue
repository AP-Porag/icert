<template>
    <div class="">
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
                <label class="form-label">Contact Name <span class="error">*</span></label>
                <input type="text" name="contact_name" class="form-control" placeholder="Contact Name" v-model.trim="v$.form_data.contact_name.$model">
                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error">
                    Contact name is required
                </div>
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
</template>

<script>
import VuePhoneNumberInput from 'vue-phone-number-input';
import { useVuelidate } from '@vuelidate/core'
import { required,email } from '@vuelidate/validators'
export default {
    name: "CustomerCreateForm",
    props: ["item"],
    components: {
        VuePhoneNumberInput,
    },
    setup: () => ({ v$: useVuelidate() }),
    data(){
        return{
            show_error: false,
            only_phone:['CA','US','AU','NZ','GB'],
            form_data:{
                name: '',
                email:'',
                contact_name:'',
                phone:'',
            },
        }
    },
    methods:{
        async submitForm(e){
            e.preventDefault();
            if (this.checkFormSubmit()){
                axios
                    .put(`/admin/customers/${this.item.id}`, this.form_data)
                    .then(function (res) {
                        Swal.fire("Saved!", "", "success").then((result)=>{
                            if (result.isConfirmed) {
                                window.location.href = "/admin/customers";
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
                this.v$.form_data.contact_name.$invalid ||
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
            window.location.href = "/admin/customers";
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
            phone:{
                required,
            },
        }
    },
    mounted() {
        let self = this;

        self.form_data.name = self.item.name
        self.form_data.email = self.item.email
        self.form_data.contact_name = self.item.contact_name
        self.form_data.phone = self.item.phone
    },
}
</script>

<style scoped>

</style>
