<script setup>

import AppLayout from '@/Layouts/Inicio/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    curso: Object,
    imgCurso: String,
})

</script>
 
<template>
    <AppLayout title="Detalles del curso">

        <section class="pt-20 lg:pt-[80px]">

            <div class="container mx-auto flex flex-wrap py-6">

                <!-- Post Section -->
                <section class="w-full md:w-2/3 flex flex-col items-start px-3">

                    <article class="flex flex-col shadow my-4 w-full">


                        <div class="py-8 px-4">
                            <div class="max-w-screen-lg text-gray-500 sm:text-lg">
                                <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900">
                                    {{ curso.nombre }}
                                </h2>
                                <p class="mb-4 font-medium">
                                    {{ curso.descripcion }}
                                </p>

                                <img class="rounded-lg" :src="imgCurso" :alt="curso.nombre">

                            </div>
                        </div>

                    </article>

                </section>

                <!-- Sidebar Section -->
                <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

                    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                        <Link :href="route('inicio.cursos')"
                            class="rounded-lg bg-primary py-3 px-7 text-base font-medium text-white hover:bg-opacity-90">
                        <span class="mdi mdi-arrow-left-bold"></span>
                        Volver a Cursos
                        </Link>
                    </div>

                    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                        <p class="text-xl font-semibold pb-5">Más información:</p>
                        <p class="pb-2">
                            Tipo: {{ curso.tipo }}
                        </p>
                        <p class="pb-2">
                            Costo: {{ curso.costo }}
                        </p>
                        <p class="pb-2">
                            Duración: {{ curso.duracion }}
                        </p>
                        <p class="pb-2">
                            Fecha Inicio: {{ curso.fecha_inicio }}
                        </p>
                        <p class="pb-2">
                            Fceha Fin: {{ curso.fecha_fin }}
                        </p>

                    </div>

                </aside>

            </div>

        </section>

    </AppLayout>
</template>

<style scoped></style>