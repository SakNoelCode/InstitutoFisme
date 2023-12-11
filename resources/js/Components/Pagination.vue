<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    pagination: Object
})
</script>

<!--Componente encargado de paginar los registros
- Usar datos de tipo Resource para que la paginación funcione
- Ejm de uso:
   <Pagination :pagination="posts.meta" />
-->
<template>
    <div class="table-pagination">
        <div class="flex items-center justify-between">
            <div class="buttons">
                <Link v-for="link in pagination.links" :key="link.label" :href="link.url ?? ''" v-html="link.label"
                    class="button" :class="{ 'active': link.active, 'text-gray-300': !link.url }" preserve-scroll />
            </div>
            <small>Página {{ pagination.current_page }} de {{ pagination.last_page }}</small>
        </div>
    </div>
</template>
