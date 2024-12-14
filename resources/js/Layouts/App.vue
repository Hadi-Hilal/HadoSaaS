<template>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <Link class="navbar-brand" href="/">
                <img src="http://127.0.0.1:8000/images/logo/kudus_vk.png" alt="logo" class="logo" style="height:80px;">
            </Link>
            <button
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
                class="navbar-toggler"
                data-bs-target="#navbarNav"
                data-bs-toggle="collapse"
                type="button"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarNav" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li v-if="auth?.type === 'admin'" class="nav-item">
                        <a :href="route('admin.dashboard.index')" class="nav-link">{{ trans("Dashboard") }}</a>
                    </li>
                    <li v-if="!auth" class="nav-item">
                        <Link :href="route('login')" class="nav-link">{{ trans("Login") }}</Link>
                    </li>
                    <li v-if="!auth" class="nav-item">
                        <Link :href="route('register')" class="nav-link">{{ trans("Register") }}</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <slot/>
    </main>

    <footer>
        <div class="container">
        </div>
    </footer>
</template>

<script setup>
import {computed} from 'vue'
import {Link, usePage} from '@inertiajs/vue3'

const page = usePage()
const trans = (key) => page.props.translations[key] || key;
const settings = computed(() => page.props.settings)
const storage_path = computed(() => page.props.storage_path)

const auth = computed(() => page.props.auth)
</script>
