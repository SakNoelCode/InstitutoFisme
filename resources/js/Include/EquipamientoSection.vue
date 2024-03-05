<script setup>
const props = defineProps({
    nombre: String,
    modelo: String,
    descripcion: String,
    imagen: String
})

const showCustomModal = () => {
  Swal.fire({
    title: props.nombre,
    html: 
    `
    <div style="white-space: pre-line;">
        ${props.descripcion}
        </div>
  `
    ,
    imageUrl: 'storage/'+ props.imagen,
    imageWidth: 400,
    imageHeight: 200,
    imageAlt: props.nombre
  });
};

</script>

<template>
    <div class="w-full px-4 md:w-1/2 xl:w-1/3">
        <div class="relative mb-12">
            <div class="overflow-hidden rounded-lg">
                <!---img src="images/portfolio/portfolio-01/equi_1.jpg" alt="portfolio" class="w-full" /--->
                <img :src="'storage/' + imagen" :alt="nombre" class="w-full h-[300px] object-cover object-center" />
            </div>
            <div class="relative z-10 mx-7 -mt-20 rounded-lg bg-white py-9 px-3 text-center shadow-lg">
                <span class="mb-2 block text-sm font-semibold text-primary">
                    {{ nombre }}
                </span>
                <h3 class="mb-4 text-xl font-bold text-dark">
                    {{ modelo }}
                </h3>
                <button @click="showCustomModal()"
                    class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                    Ver detalles
                </button>
            </div>
        </div>
    </div>



    <!---div class="w-full px-4 md:w-1/2 xl:w-1/3">
                    <div class="relative mb-12">
                        <div class="overflow-hidden rounded-lg">
                            <img src="images/portfolio/portfolio-01/equi_1.jpg" alt="portfolio" class="w-full" />
                        </div>
                        <div class="relative z-10 mx-7 -mt-20 rounded-lg bg-white py-9 px-3 text-center shadow-lg">
                            <span class="mb-2 block text-sm font-semibold text-primary">
                                MetaQuest2
                            </span>
                            <h3 class="mb-4 text-xl font-bold text-dark">
                                Lentes de Realidad Virtual
                            </h3>
                            <a href="javascript:void(0)"
                                class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 xl:w-1/3">
                    <div class="relative mb-12">
                        <div class="overflow-hidden rounded-lg">
                            <img src="images/portfolio/portfolio-01/equi_2.jpeg" alt="portfolio" class="w-full" />
                        </div>
                        <div class="relative z-10 mx-7 -mt-20 rounded-lg bg-white py-9 px-3 text-center shadow-lg">
                            <span class="mb-2 block text-sm font-semibold text-primary">
                                Fly More Combo
                            </span>
                            <h3 class="mb-4 text-xl font-bold text-dark">
                                DJI Mavic Air 2
                            </h3>
                            <a href="javascript:void(0)"
                                class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 xl:w-1/3">
                    <div class="relative mb-12">
                        <div class="overflow-hidden rounded-lg">
                            <img src="images/portfolio/portfolio-01/equi_3.jpg" alt="portfolio" class="w-full" />
                        </div>
                        <div class="relative z-10 mx-7 -mt-20 rounded-lg bg-white py-9 px-3 text-center shadow-lg">
                            <span class="mb-2 block text-sm font-semibold text-primary">
                                Entreprise
                            </span>
                            <h3 class="mb-4 text-xl font-bold text-dark">
                                DJI Mavic 3M
                            </h3>
                            <a href="javascript:void(0)"
                                class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 xl:w-1/3">
                    <div class="relative mb-12">
                        <div class="overflow-hidden rounded-lg">
                            <img src="images/portfolio/portfolio-01/equi_4.jpg" alt="portfolio" class="w-full" />
                        </div>
                        <div class="relative z-10 mx-7 -mt-20 rounded-lg bg-white py-9 px-3 text-center shadow-lg">
                            <span class="mb-2 block text-sm font-semibold text-primary">
                                Creality CR-5 PRO H
                            </span>
                            <h3 class="mb-4 text-xl font-bold text-dark">
                                Impresora 3D
                            </h3>
                            <a href="javascript:void(0)"
                                class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 xl:w-1/3">
                    <div class="relative mb-12">
                        <div class="overflow-hidden rounded-lg">
                            <img src="images/portfolio/portfolio-01/equi_5.jpg" alt="portfolio" class="w-full" />
                        </div>
                        <div class="relative z-10 mx-7 -mt-20 rounded-lg bg-white py-9 px-3 text-center shadow-lg">
                            <span class="mb-2 block text-sm font-semibold text-primary">
                                Creality CR-SCAN LIZARD
                            </span>
                            <h3 class="mb-4 text-xl font-bold text-dark">
                                Escaner
                            </h3>
                            <a href="javascript:void(0)"
                                class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 xl:w-1/3">
                    <div class="relative mb-12">
                        <div class="overflow-hidden rounded-lg">
                            <img src="images/portfolio/portfolio-01/equi_6.jpg" alt="portfolio" class="w-full" />
                        </div>
                        <div class="relative z-10 mx-7 -mt-20 rounded-lg bg-white py-9 px-3 text-center shadow-lg">
                            <span class="mb-2 block text-sm font-semibold text-primary">
                                Herramientas de Arduino e IDE
                            </span>
                            <h3 class="mb-4 text-xl font-bold text-dark">
                                Brazo Robótico
                            </h3>
                            <a href="javascript:void(0)"
                                class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-primary hover:text-white">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div--->
</template>

<style></style>