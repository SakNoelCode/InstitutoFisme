<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue'

const props = defineProps({
    id: Number,
    nombre: String,
    descripcion: String,
    imagen: String
});

const descripcionShow = computed(() => {
    return props.descripcion.slice(0,90);
})
</script>

<template>
    <div class="w-full px-4 md:w-1/2 xl:w-1/3">
        <div class="overflow-hidden rounded-lg bg-white">
            <!---img src="images/cards/card-01/image-01.jpg" alt="image" class="w-full" /---->
            <img :src="'storage/' + imagen" :alt="nombre" class="w-full h-[230px] object-cover object-center" />
            <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
                <h3>
                    <Link :href="route('inicio.detalleCurso',props.id)"
                        class="mb-4 block text-xl font-semibold text-dark hover:text-primary sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]">
                        {{ nombre }}
                    </Link>
                </h3>
                <p class="mb-7 text-base leading-relaxed text-body-color">
                    {{ descripcionShow }}
                </p>

                <Link :href="route('inicio.detalleCurso',props.id)"
                    class="inline-block rounded-full border border-[#E5E7EB] py-2 px-7 text-base font-medium text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                    Ver detalles
                </Link>
            </div>
        </div>
    </div>

    <!--div class="w-full px-4 md:w-1/2 xl:w-1/3">
        <div class="overflow-hidden rounded-lg bg-white">
            <img src="images/cards/card-01/image-01.jpg" alt="image" class="w-full" />
            <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
                <h3>
                    <a href="javascript:void(0)"
                        class="mb-4 block text-xl font-semibold text-dark hover:text-primary sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]">
                        50+ Best creative website themes & templates
                    </a>
                </h3>
                <p class="mb-7 text-base leading-relaxed text-body-color">
                    Lorem ipsum dolor sit amet pretium consectetur adipiscing
                    elit. Lorem consectetur adipiscing elit.
                </p>

                <a href="javascript:void(0)"
                    class="inline-block rounded-full border border-[#E5E7EB] py-2 px-7 text-base font-medium text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                    View Details
                </a>
            </div>
        </div>
    </div>
    <div class="w-full px-4 md:w-1/2 xl:w-1/3">
        <div class="overflow-hidden rounded-lg bg-white">
            <img src="images/cards/card-01/image-02.jpg" alt="image" class="w-full" />
            <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
                <h3>
                    <a href="javascript:void(0)"
                        class="mb-4 block text-xl font-semibold text-dark hover:text-primary sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]">
                        The ultimate UX and UI guide to card design
                    </a>
                </h3>
                <p class="mb-7 text-base leading-relaxed text-body-color">
                    Lorem ipsum dolor sit amet pretium consectetur adipiscing
                    elit. Lorem consectetur adipiscing elit.
                </p>

                <a href="javascript:void(0)"
                    class="inline-block rounded-full border border-[#E5E7EB] py-2 px-7 text-base font-medium text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                    View Details
                </a>
            </div>
        </div>
    </div>
    <div class="w-full px-4 md:w-1/2 xl:w-1/3">
        <div class="overflow-hidden rounded-lg bg-white">
            <img src="images/cards/card-01/image-03.jpg" alt="image" class="w-full" />
            <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
                <h3>
                    <a href="javascript:void(0)"
                        class="mb-4 block text-xl font-semibold text-dark hover:text-primary sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]">
                        Creative Card Component designs graphic elements
                    </a>
                </h3>
                <p class="mb-7 text-base leading-relaxed text-body-color">
                    Lorem ipsum dolor sit amet pretium consectetur adipiscing
                    elit. Lorem consectetur adipiscing elit.
                </p>

                <a href="javascript:void(0)"
                    class="inline-block rounded-full border border-[#E5E7EB] py-2 px-7 text-base font-medium text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                    View Details
                </a>
            </div>
        </div>
    </div--->
</template>

<style></style>