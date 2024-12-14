<template>
    <head>
        <title>{{trans("Login")}} | {{appName}}</title>

    </head>

    <app-layout>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>{{ trans("Login") }}</h3>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="form.post(route('login'))">
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

                                <div class="mb-3 form-check">
                                    <input id="remember" v-model="form.remember" class="form-check-input"
                                           type="checkbox"/>
                                    <label class="form-check-label" for="remember">{{ trans("Remember Me") }}</label>
                                </div>

                                <button class="btn btn-primary w-100" type="submit">

                                    {{ trans("Sign In") }}
                                </button>
                            </form>

                            <div class="mt-3 text-center">
                                <Link :href="route('password.request')">{{ trans("Forgot Password") }}</Link>
                                <br/>
                                <Link :href="route('register')">{{ trans("I Don't Have Account!") }}</Link>
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
            email: '',
            password: '',
            remember: false,
        });

        return {form, appName, trans};
    }
}

</script>

<style scoped>
/* Add styles specific to the Index page here */
</style>
