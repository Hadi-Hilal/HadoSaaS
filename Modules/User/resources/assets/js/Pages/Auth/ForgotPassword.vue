<template>
    <head>
        <title>{{trans("Forgot Password")}} | {{appName}}</title>

    </head>

    <app-layout>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>{{ trans("Forgot Password") }}</h3>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="form.post(route('password.email'))">
                                <div class="mb-3">
                                    <label class="form-label" for="email">{{ trans("Email") }}</label>
                                    <input
                                        id="email"
                                        v-model="form.email"
                                        autofocus
                                        class="form-control"
                                        required
                                        type="email"
                                    />
                                    <span v-if="errors.email" class="invalid-feedback d-block">{{ errors.email }}</span>
                                </div>


                                <button class="btn btn-primary w-100" type="submit">

                                    {{ trans("Send Email Verification") }}
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>


<script>
import {computed} from 'vue';
import {usePage, Link, useForm} from '@inertiajs/vue3';
import AppLayout from '@/Layouts/App.vue';

export default {
    components: {
        AppLayout, Link
    },
    props: {
        errors: Object
    },
    setup() {
        const page = usePage();

        const appName = computed(() => page.props.appName)
        const trans = (key) => page.props.translations[key] || key;

        const form = useForm({
            email: '',
        });

        return {form, appName, trans};
    }
}

</script>

<style scoped>
/* Add styles specific to the Index page here */
</style>
