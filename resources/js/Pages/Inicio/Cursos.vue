<script setup>
import AppLayout from '@/Layouts/Inicio/AppLayout.vue';
import CursosSection from '@/Include/CursosSection.vue';
import EmptyTable from '@/Components/EmptyTable.vue';
import PaginationWhite from '@/Components/PaginationWhite.vue';
defineProps({
    cursos: Object
})
</script>
 
<template>
    <AppLayout title="Cursos">

        <!-- ====== Cards Section Start -->
        <section class="pt-20 lg:pt-[100px]">
            <div class="container mx-auto">

                <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="mx-auto mb-[60px] max-w-[510px] text-center">
                            <span class="mb-2 block text-lg font-semibold text-primary">
                                Nuestro cursos
                            </span>
                            <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">
                                Cursos y Capacitaciones
                            </h2>
                            <p class="text-base text-body-color">
                                Apuntante a los cursos que impartimos a nuestros estudiantes
                            </p>
                        </div>
                    </div>
                </div>

                <!---Content-->
                <template v-if="cursos.data.length">
                    <div class="-mx-4 flex flex-wrap">
                        <CursosSection v-for="item in cursos.data" :key="item.id" :nombre="item.nombre" :id="item.id"
                            :descripcion="item.descripcion" :imagen="item.img_path" />
                    </div>
                </template>
                <EmptyTable v-else />

                <PaginationWhite v-if="cursos.data.length" :pagination="cursos.meta" />

            </div>
        </section>
        <!-- ====== Cards Section End -->

    </AppLayout>
</template>

<style></style>