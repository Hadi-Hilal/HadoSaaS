<template>
    <head>
        <title>{{trans("Reset Password")}} | {{appName}}</title>

    </head>

    <app-layout>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>{{ trans("Reset Password") }}</h3>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="form.post(route('password.update'))">
                                <input :value="token" name="token" type="hidden">
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

                                <div class="mb-3">
                                    <label class="form-label" for="password">{{ trans("Password") }}</label>
                                    <input
                                        id="password"
                                        v-model="form.password"
                                        class="form-control"
                                        required
                                        type="password"
                                    />
                                    <span v-if="errors.password"
                                          class="invalid-feedback d-block">{{ errors.password }}</span>

                                </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                           for="password_confirmation">{{ trans("Confirm Password") }}</label>
                                    <input
                                        id="password_confirmation"
                                        v-model="form.password_confirmation"
                                        class="form-control"
                                        required
                                        type="password_confirmation"
                                    />
                                    <span v-if="errors.password_confirmation"
                                          class="invalid-feedback d-block">{{ errors.password_confirmation }}</span>

                                </div>


                                <button class="btn btn-primary w-100" type="submit">

                                    {{ trans("Reset Password") }}
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
        const params = new URLSearchParams(window.location.search);
        const form = useForm({
            email: '',
            password: '',
            remember: false,
            token: params.get('token') || ''
        });

        return {form, appName, trans};
    }
}

</script>

<style scoped>
/* Add styles specific to the Index page here */
</style>
