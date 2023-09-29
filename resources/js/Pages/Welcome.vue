<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavBar from '@/Include/NavBarSection.vue';
import HeroSection from '@/Include/HeroSection.vue';
import ServicesSection from '@/Include/ServicesSection.vue';
import TestimonialSection from '@/Include/TestimonialSection.vue';
import MisionVisionSection from '@/Include/MisionVisionSection.vue';
import ObjetivosSection from '@/Include/ObjetivosSection.vue';
import NewsSection from '@/Include/NewsSection.vue';
import EquipamientoSection from '@/Include/EquipamientoSection.vue';
import CursosSection from '@/Include/CursosSection.vue';
import TeamSection from '@/Include/TeamSection.vue';
import FooterSection from '@/Include/FooterSection.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean
});
</script>
 
<template>
    <Head title="Inicio" />

    <NavBar />

    <HeroSection />
    
    <ServicesSection />

    <TestimonialSection />

    <MisionVisionSection />

    <ObjetivosSection />

    <NewsSection />

    <EquipamientoSection />

    <CursosSection />
    
   <TeamSection />

   <FooterSection />

</template>

<style></style>
