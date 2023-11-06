<script setup>
import NavBar from '@/Layouts/Nav/Nav.vue'
import AsideBar from '@/Layouts/Nav/Aside.vue'
import TitleBar from '@/Components/Admin/TitleBar.vue'
</script>

<template>
    <div class="body-admin">
        <NavBar />

        <AsideBar />

        <TitleBar />


        <slot />

    </div>
</template>