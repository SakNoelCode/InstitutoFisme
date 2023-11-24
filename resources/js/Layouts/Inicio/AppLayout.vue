<script setup>
import { Head } from '@inertiajs/vue3';
import NavBar from '@/Include/NavBarSection.vue';
import FooterSection from '@/Include/FooterSection.vue';

defineProps({
    title: String,
});
</script>
 
<template>
    <Head :title="title" />

    <NavBar />

    <main>
        <slot />
    </main>

    <FooterSection />
</template>

<style></style>