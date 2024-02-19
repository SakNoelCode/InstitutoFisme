<script setup>
import AppLayout from '@/Layouts/Inicio/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    post: Object,
    imgPost: String,
    imgAutor: String,
    posts: Array
})


const fecha = computed(() => {
    const fecha = props.post.created_at;

    const dia = fecha.split('/')[0];
    const mes = fecha.split('/')[1];
    const año = fecha.split('/')[2];


    return `${dia - 1}/${mes}/${año}`;
});

</script>
 
<template>
    <AppLayout title="Detalles de la noticia">

        <section class="pt-20 lg:pt-[80px]">

            <div class="container mx-auto flex flex-wrap py-6">

                <!-- Sidebar Section -->
                <aside class="w-full md:w-1/3 flex flex-col items-center px-3 md:order-2">

                    <div class="w-full bg-white shadow flex flex-col md:my-4 p-6">
                        <Link :href="route('inicio.noticias')"
                            class="rounded-lg bg-primary py-3 px-7 text-base font-medium text-white hover:bg-opacity-90">
                        <span class="mdi mdi-arrow-left-bold"></span>
                        Volver a Blog
                        </Link>
                    </div>

                    <div class="w-full bg-white shadow hidden flex-col my-4 p-6 md:flex">
                        <p class="text-xl font-semibold pb-5">Últimas noticias:</p>
                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow mb-3"
                            v-for="item in posts" :key="item.id">
                            <Link :href="route('inicio.detalleNoticia', item.id)">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                {{ item.titulo }}
                            </h5>
                            </Link>
                            <p class="mb-3 font-normal text-gray-700">
                                {{ item.contenido.slice(0, 50) }}....
                            </p>
                            <Link :href="route('inicio.detalleNoticia', item.id)"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Leer más
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                            </Link>
                        </div>
                    </div>

                </aside>

                <!-- Post Section -->
                <section class="w-full md:w-2/3 flex flex-col items-center px-3 shadow-sm my-8 md:order-1">

                    <article class="md:my-4">
                        <header class="mb-4 lg:mb-6">
                            <address class="flex items-center mb-6 not-italic">
                                <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                                    <img class="mr-4 w-16 h-16 rounded-full"
                                        src="https://w7.pngwing.com/pngs/831/88/png-transparent-user-profile-computer-icons-user-interface-mystique-miscellaneous-user-interface-design-smile-thumbnail.png"
                                        alt="Autor">
                                    <div>
                                        <a href="#" rel="author" class="text-xl font-bold text-gray-900">
                                            {{ post.autor }}
                                        </a>
                                        <p class="text-base text-gray-500">
                                            <time pubdate datetime="2022-02-08" title="February 8th, 2022">
                                                {{ fecha }}
                                            </time>
                                        </p>
                                    </div>
                                </div>
                            </address>
                            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">
                                {{ post.titulo }}
                            </h1>

                        </header>

                        <p class="text-lg text-body-color my-10">
                            {{ post.contenido }}
                        </p>
                        <figure class="flex justify-center md:justify-start">
                            <img :src="imgPost" :alt="post.titulo">
                        </figure>

                    </article>
                </section>

                <!-- Sidebar Section -->
                <aside class="w-full md:w-1/3 flex flex-col items-center px-3 md:hidden">

                    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                        <p class="text-xl font-semibold pb-5">Últimas noticias:</p>
                        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow mb-3" v-for="item in posts"
                            :key="item.id">
                            <Link :href="route('inicio.detalleNoticia', item.id)">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                {{ item.titulo }}
                            </h5>
                            </Link>
                            <p class="mb-3 font-normal text-gray-700">
                                {{ item.contenido.slice(0, 50) }}....
                            </p>
                            <Link :href="route('inicio.detalleNoticia', item.id)"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Leer más
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                            </Link>
                        </div>
                    </div>

                </aside>

            </div>

        </section>

    </AppLayout>
</template>

<style></style>