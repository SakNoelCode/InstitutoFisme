<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    icon: String,
    textIcon: String,
    hrefIcon: String
})
</script>

<!--Componente encargado de Crear la cabecera de las vistas
- Para agregar más item al Breadcum, solo añadir más etiquetas li
- El slot representa al contenido que deberá llenarse en el Componente padre
- Ejm:   
<HeaderSection :icon="'mdi mdi-pencil'" :textIcon="'Crear nuevo post'" :hrefIcon="route('posts.create')">
     <li>Posts</li>
</HeaderSection>
-->
<template>
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <!---li>Posts</li>
                <li>Panel</li--->
                <slot />
            </ul>
            <Link :href="hrefIcon" class="button blue">
            <span class="icon"><span :class="icon"></span></span>
            <span>{{ textIcon }}</span>
            </Link>
        </div>
    </section>
</template>

<style scoped></style>