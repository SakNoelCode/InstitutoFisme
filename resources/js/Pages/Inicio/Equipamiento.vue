<script setup>
import AppLayout from '@/Layouts/Inicio/AppLayout.vue';
import EquipamientoSection from '@/Include/EquipamientoSection.vue';
import EmptyTable from '@/Components/EmptyTable.vue';
import PaginationWhite from '@/Components/PaginationWhite.vue';

defineProps({
    equipos: Object
})
</script>
 
<template>
    <AppLayout title="Equipamiento">

        <!-- ====== Portfolio Section Start -->
        <section class="pt-20 lg:pt-[120px]">
            <div class="container mx-auto">

                <!-----Encabezado-->
                <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="mx-auto mb-[60px] max-w-[510px] text-center">
                            <span class="mb-2 block text-lg font-semibold text-primary">
                                Nuestro equipamiento
                            </span>
                            <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">
                                Equipos tecnológicos
                            </h2>
                            <p class="text-base text-body-color">
                                Descubra con que equipos técnológicos contamos en la actualidad
                            </p>
                        </div>
                    </div>
                </div>

                <!---Content-->
                <template v-if="equipos.data.length">
                    <div class="-mx-4 flex flex-wrap">
                        <EquipamientoSection v-for="item in equipos.data" :key="item.id" :nombre="item.nombre"
                            :modelo="item.modelo" :imagen="item.img_path" />
                    </div>
                </template>
                <EmptyTable v-else />

                <PaginationWhite v-if="equipos.data.length" :pagination="equipos.meta" />
            </div>
        </section>
        <!-- ====== Portfolio Section End -->

    </AppLayout>
</template>

<style></style>