<script setup>
import AppLayout from '@/Layouts/Inicio/AppLayout.vue';
import TeamSection from '@/Include/TeamSection.vue';
import EmptyTable from '@/Components/EmptyTable.vue';
import PaginationWhite from '@/Components/PaginationWhite.vue';

defineProps({
    egresados: Object
})
</script>
 
<template>
    <AppLayout title="Egresados">

        <!-- ====== Team Section Start -->
        <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-5">
            <div class="container mx-auto">
                <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="mx-auto mb-[60px] max-w-[510px] text-center">
                            <span class="mb-2 block text-lg font-semibold text-primary">
                                Nuestros egresados
                            </span>
                            <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">
                                Nuestros estudiantes que fueron capacitados
                            </h2>
                            <p class="text-base text-body-color">
                                Estos son algunos de nuestros estudiantes y docentes que lograron formarse exitosamente.
                            </p>
                        </div>
                    </div>
                </div>

                <!---Content-->
                <template v-if="egresados.data.length">
                    <div class="-mx-4 flex flex-wrap justify-center">
                        <TeamSection v-for="item in egresados.data" :key="item.id" :nombre="item.nombre"
                            :descripcion="item.descripcion" :imagen="item.img_path" />
                    </div>
                </template>
                <EmptyTable v-else />

                <!--La condicion de mostrar la paginación dependerá del total de egresados que existan-->
                <PaginationWhite v-if="egresados.data.length && egresados.meta.total > 8" :pagination="egresados.meta" />

            </div>
        </section>
        <!-- ====== Team Section End -->


    </AppLayout>
</template>

