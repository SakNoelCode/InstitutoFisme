<script setup>
import AppLayout from '@/Layouts/Inicio/AppLayout.vue';

const props = defineProps({
    post: Object,
    imgPost: String,
    imgAutor: String
})

</script>
 
<template>
    <AppLayout title="Detalles de la noticia">

        <section class="pt-20 lg:pt-[80px]">
            <div class="container mx-auto">
                <!---div class="-mx-4 flex flex-wrap justify-center">
                    <div class="w-full px-4">
                        <div class="mx-auto mb-[60px] max-w-[510px] text-center lg:mb-20">
                            <span class="mb-2 block text-lg font-semibold text-primary">
                                Nuestro Blog
                            </span>
                            <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">
                                Noticias y eventos
                            </h2>
                            <p class="text-base text-body-color">
                                Mantente al tanto revisando nuestro blog, donde subiremos noticias y eventos.
                            </p>
                        </div>
                    </div>
                </div--->

                <div>
                    <main class="pt-8 pb-10 lg:pt-16 lg:pb-10 bg-white antialiased">
                        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                            <article class="mx-auto w-full max-w-2xl">
                                <header class="mb-4 lg:mb-6">
                                    <address class="flex items-center mb-6 not-italic">
                                        <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                                            <img class="mr-4 w-16 h-16 rounded-full"
                                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                                alt="Autor">
                                            <div>
                                                <a href="#" rel="author" class="text-xl font-bold text-gray-900">
                                                    {{ post.autor }}
                                                </a>
                                                <p class="text-base text-gray-500">
                                                    Estudiante de la Fisme
                                                </p>
                                                <p class="text-base text-gray-500">
                                                    <time pubdate datetime="2022-02-08" title="February 8th, 2022">
                                                        {{ post.created_at }}
                                                    </time>
                                                </p>
                                            </div>
                                        </div>
                                    </address>
                                    <h1
                                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">
                                        {{ post.titulo }}
                                    </h1>

                                </header>

                                <p class="text-lg text-body-color my-10">
                                    {{ post.contenido }}
                                </p>
                                <figure>
                                    <img :src="imgPost" alt="Hola">
                                </figure>

                            </article>
                        </div>
                    </main>


                </div>

            </div>
        </section>

    </AppLayout>
</template>

<style></style>