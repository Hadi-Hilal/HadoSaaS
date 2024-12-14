<template>
    <head>
        <title>{{trans("Register")}} | {{appName}}</title>
    </head>

    <app-layout>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>{{ trans("Register") }}</h3>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="form.post(route('register'))">

                                <div class="mb-3">
                                    <label class="form-label" for="name">{{ trans("Name") }}</label>
                                    <input
                                        id="name"
                                        v-model="form.name"
                                        autofocus
                                        class="form-control"
                                        required
                                        type="name"
                                    />
                                    <span v-if="errors.name" class="invalid-feedback d-block">{{ errors.name }}</span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="email">{{ trans("Email") }}</label>
                                    <input
                                        id="email"
                                        v-model="form.email"
                                        class="form-control"
                                        required
                                        type="email"
                                    />
                                    <span v-if="errors.email" class="invalid-feedback d-block">{{ errors.email }}</span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="mobile">{{ trans("Mobile") }}</label>
                                    <input
                                        id="mobile"
                                        v-model="form.mobile"
                                        class="form-control"
                                        required
                                        type="mobile"
                                    />
                                    <span v-if="errors.mobile"
                                          class="invalid-feedback d-block">{{ errors.mobile }}</span>
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
                                    {{ trans("Register") }}
                                </button>
                            </form>

                            <div class="mt-3 text-center">
                                <Link :href="route('login')">{{ trans("Already Have An Account?") }}</Link>
                            </div>
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
            name: '',
            email: '',
            mobile: '',
            password: '',
            password_confirmation: '',

        });

        return {form, appName, trans};
    }
}

</script>

<style scoped>
/* Add styles specific to the Index page here */
</style>
