<script setup>
import { computed } from 'vue';
import AppLayout from '@/Layouts/Inicio/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    curso: Object,
    imgCurso: String,
})

const url = computed(() => {
    return decodeURIComponent(props.curso.url_inscripciones);
})

const showPrecio = computed(() => {
    return props.curso.costo + ' Soles'
})

const fechaInicio = computed(() => {
    const fechaString = props.curso.fecha_inicio;
    const fecha = new Date(fechaString);

    const dia = fecha.getDate() + 1;
    const mes = fecha.getMonth() + 1; // El mes se devuelve de 0 a 11, por lo que sumamos 1
    const year = fecha.getFullYear();

    const mesConCeros = mes.toString().padStart(2, '0');
    const diaConCeros = dia.toString().padStart(2, '0');

    const fechaFormateada = `${diaConCeros}/${mesConCeros}/${year}`;
    return fechaFormateada;
})

const fechaFin = computed(() => {
    const fechaString = props.curso.fecha_fin;
    const fecha = new Date(fechaString);

    const dia = fecha.getDate() + 1; 
    const mes = fecha.getMonth() + 1; // El mes se devuelve de 0 a 11, por lo que sumamos 1
    const year = fecha.getFullYear();

    const mesConCeros = mes.toString().padStart(2, '0');
    const diaConCeros = dia.toString().padStart(2, '0');

    const fechaFormateada = `${diaConCeros}/${mesConCeros}/${year}`;
    return fechaFormateada;
})
</script>
 
<template>
    <AppLayout title="Detalles del curso">

        <section class="pt-20 lg:pt-[80px]">

            <div class="container mx-auto flex flex-wrap py-6">

                <!-- Sidebar Section -->
                <aside class="w-full md:w-1/3 flex flex-col items-center px-3 md:order-2">

                    <div class="w-full bg-white shadow flex flex-col my-4 p-6 ">
                        <Link :href="route('inicio.cursos')"
                            class="rounded-lg bg-primary py-3 px-7 text-base font-medium text-white hover:bg-opacity-90">
                        <span class="mdi mdi-arrow-left-bold"></span>
                        Volver a Cursos
                        </Link>
                    </div>

                    <div class="w-full bg-white shadow flex-col my-4 p-6 hidden md:flex">
                        <p class="text-xl font-semibold pb-5"> <span class="mdi mdi-alert-box"></span> Más información:</p>
                        <p class="pb-2">
                            <span class="font-semibold">Tipo:</span> {{ curso.tipo }}
                        </p>
                        <p class="pb-2" v-if="curso.costo == '0.00'">
                            <span class="font-semibold">Costo:</span> <span
                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 ml-1 rounded">Gratis</span>
                        </p>
                        <p class="pb-2" v-else>
                            <span class="font-semibold">Costo:</span> {{ showPrecio }}
                        </p>
                        <p class="pb-2">
                            <span class="font-semibold">Duración:</span> {{ curso.duracion }}
                        </p>
                        <p class="pb-2">
                            <span class="font-semibold">Fecha Inicio:</span> {{ fechaInicio }}
                        </p>
                        <p class="pb-2">
                            <span class="font-semibold">Fecha Fin:</span> {{ fechaFin }}
                        </p>

                        <p class="pb-2">
                            <span class="font-semibold"><a target="_blank" :href="url">Inscríbete aquí<span class="mdi mdi-format-color-highlight"></span></a></span> 
                        </p>
                        

                    </div>

                </aside>


                <!-- Post Section -->
                <section class="w-full md:w-2/3 flex flex-col items-start px-3 md:order-1">

                    <article class="flex flex-col shadow my-4 w-full">


                        <div class="py-4 md:py-8 px-4">
                            <div class="max-w-screen-lg text-gray-500 sm:text-lg">
                                <h2 class="mb-6 text-4xl tracking-tight font-bold text-gray-900 text-justify">
                                    {{ curso.nombre }}
                                </h2>
                                <p class="mb-8 font-medium text-justify">
                                    {{ curso.descripcion }}
                                </p>

                                <img class="rounded-lg" :src="imgCurso" :alt="curso.nombre">

                            </div>
                        </div>

                    </article>

                </section>

                <div class="w-full md:w-1/3 flex flex-col items-center px-3 md:hidden"> 
                    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                        <p class="text-xl font-semibold pb-5"> <span class="mdi mdi-alert-box"></span> Más información:</p>
                        <p class="pb-2">
                            <span class="font-semibold">Tipo:</span> {{ curso.tipo }}
                        </p>
                        <p class="pb-2" v-if="curso.costo == '0.00'">
                            <span class="font-semibold">Costo:</span> <span
                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 ml-1 rounded">Gratis</span>
                        </p>
                        <p class="pb-2" v-else>
                            <span class="font-semibold">Costo:</span> {{ showPrecio }}
                        </p>
                        <p class="pb-2">
                            <span class="font-semibold">Duración:</span> {{ curso.duracion }}
                        </p>
                        <p class="pb-2">
                            <span class="font-semibold">Fecha Inicio:</span> {{ fechaInicio }}
                        </p>
                        <p class="pb-2">
                            <span class="font-semibold">Fecha Fin:</span> {{ fechaFin }}
                        </p>
                        <p class="pb-2">
                            <span class="font-semibold"><a target="_blank" :href="url">Inscríbete aquí<span class="mdi mdi-format-color-highlight"></span></a></span> 
                        </p>

                    </div>
                </div>



            </div>

        </section>

    </AppLayout>
</template>

<style scoped></style>