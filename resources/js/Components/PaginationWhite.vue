<script setup>
import { Link } from '@inertiajs/vue3';

let cssClassInicio = 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700'
let cssClass = 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700'
let cssClassActive = 'flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700'
let cssClassFinal = 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700'

defineProps({
    pagination: Object
})

</script>
<!--Componente encargado de paginar los registros en el Fronted
- Usar datos de tipo Resource para que la paginación funcione
- Ejm de uso:
   <Pagination :pagination="posts.meta" />
-->
<template>
    <div class="py-8 text-center">
 
        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-base h-10">
                
                    <Link v-for="link in pagination.links" 
                    :key="link.label" 
                    :href="link.url ?? ''" 
                    v-html="link.label"
                    :class="{ 
                        'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700' : !link.active,
                        'flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700': link.active, 
                        'text-gray-200': !link.url,
                        'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700': link.label.includes('Anterior'),
                        'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700':link.label.includes('Siguiente')}" 
                        preserve-scroll
                        />
            </ul>
        </nav>
    </div>
</template>

<style scoped></style>

