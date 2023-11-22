<script setup>
import NavBar from '@/Layouts/Nav/Nav.vue'
import AsideBar from '@/Layouts/Nav/Aside.vue'
import Footer from '@/Components/Admin/Footer.vue'
import { Head, Link, router } from '@inertiajs/vue3'

defineProps({
    title: String,
});

</script>

<template>
    <div class="body-admin">

        <Head :title="title" />

        <NavBar />

        <AsideBar />

        <main>
            <slot />
        </main>

        <Footer />

    </div>
</template>