<script setup>

const props = defineProps({
    fecha: String,
    titulo: String,
    contenido: String,
})

</script>

<template>
    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
        <div class="mx-auto mb-10 max-w-[370px]">
            <div class="mb-8 overflow-hidden rounded">
                <img src="images/blogs/blog-01/image-01.jpg" alt="image" class="w-full" />
            </div>
            <div>
                <span
                    class="mb-5 inline-block rounded bg-primary py-1 px-4 text-center text-xs font-semibold leading-loose text-white">
                    {{ fecha }}
                </span>
                <h3>
                    <a href="javascript:void(0)"
                        class="mb-4 inline-block text-xl font-semibold text-dark hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                        {{ titulo }}
                    </a>
                </h3>
                <p class="text-base text-body-color">
                    {{ contenido }}
                </p>
            </div>
        </div>
    </div>

    <!--div class="w-full px-4 md:w-1/2 lg:w-1/3">
        <div class="mx-auto mb-10 max-w-[370px]">
            <div class="mb-8 overflow-hidden rounded">
                <img src="images/blogs/blog-01/image-01.jpg" alt="image" class="w-full" />
            </div>
            <div>
                <span
                    class="mb-5 inline-block rounded bg-primary py-1 px-4 text-center text-xs font-semibold leading-loose text-white">
                    22 Dic, 2023
                </span>
                <h3>
                    <a href="javascript:void(0)"
                        class="mb-4 inline-block text-xl font-semibold text-dark hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                        Meet AutoManage, the best AI management tools
                    </a>
                </h3>
                <p class="text-base text-body-color">
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry.
                </p>
            </div>
        </div>
    </div--->
</template>

<style></style>