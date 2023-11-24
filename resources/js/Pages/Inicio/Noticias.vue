<script setup>
import AppLayout from '@/Layouts/Inicio/AppLayout.vue';
import NewsSection from '@/Include/NewsSection.vue';

const props = defineProps({
    posts: Array
})
</script>
 
<template>
    <AppLayout title="Blog">

        <!-- ====== Blog Section Start -->
    <section class="pt-20 lg:pt-[120px]">
        <div class="container mx-auto">
            <div class="-mx-4 flex flex-wrap justify-center">
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
            </div>

            <div class="-mx-4 flex flex-wrap">

                <NewsSection v-for="post in posts" :key="post.id" :fecha="post.created_at" :titulo="post.titulo" :contenido="post.contenido" />
                
            </div>
        </div>
    </section>
    <!-- ====== Blog Section End -->

    </AppLayout>
</template>

<style></style>