<!-- resources/js/Pages/Index.vue -->
<template>
    <head>
        <title>Index | {{appName}}</title>
    </head>
    <app-layout>
        <div class="container">
            <div class="my-3">
                <h1>Welcome to the Index Page</h1>
                <p>This is the main content of the index page.</p>
            </div>
        </div>

    </app-layout>
</template>

<script setup>
import {computed} from 'vue'
import {usePage} from '@inertiajs/vue3'

const page = usePage()

const appName = computed(() => page.props.appName)

</script>

<script>


import AppLayout from '@/Layouts/App.vue';

export default {
    components: {
        AppLayout
    }

};
</script>

<style scoped>
/* Add styles specific to the Index page here */
</style>
