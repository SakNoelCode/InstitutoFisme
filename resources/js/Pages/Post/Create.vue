<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import HeaderSection from '@/Components/HeaderSection.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3'

//Props
defineProps({
    errors: Object,
    categorias: Array
});

//Variables
const form = useForm({
    titulo: '',
    contenido: '',
    categoria: '1',
    img_path: '',
    autor: ''
});
const photoInput = ref(null);
const photoPreview = ref(null);

//Métodos
const submit = () => {

    if (photoInput.value) {
        form.img_path = photoInput.value.files[0];
    }
    form.post(route('posts.store'));
}

const seleccionaImg = () => {

    const photo = photoInput.value.files[0];

    if (!photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
}

</script>

<template>
    <AppLayout title="Crear Post">

        <!----Header section-->
        <HeaderSection :icon="'mdi mdi-arrow-left'" :text-icon="'Volver'" :href-icon="route('posts.index')">
            <li>Posts</li>
            <li>Crear post</li>
        </HeaderSection>

        <!---Section content-->
        <section class="section main-section">

            <div class="card mb-6">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-ballot"></i></span>
                        Crear nuevo post
                    </p>
                </header>
                <div class="card-content">
                    <form method="post" @submit.prevent="submit()">

                        <!----Titulo del post-->
                        <div class="field">
                            <label class="label" for="titulo">Título:</label>
                            <div class="control">
                                <input class="input" type="text" v-model="form.titulo" id="titulo"
                                    placeholder="Taller sobre la IA en el auditorio de la FISME">
                            </div>
                            <InputError class="mt-2" :message="form.errors.titulo" />
                        </div>

                        <!---Contenido del post-->
                        <div class="field">
                            <label class="label" for="contenido">Contenido:</label>
                            <div class="control">
                                <textarea class="textarea" v-model="form.contenido" id="contenido"
                                    placeholder="Describe el evento o la noticia que quieres publicar"></textarea>
                            </div>
                            <InputError class="mt-2" :message="form.errors.contenido" />
                        </div>

                        <!----Categoría del post-->
                        <div class="field">
                            <label class="label">Categoría:</label>
                            <div class="field-body">
                                <div class="field grouped multiline">

                                    <div class="control" v-for="category in categorias" :key="category.id">
                                        <label class="radio">
                                            <input type="radio" v-model="form.categoria" name="categoria"
                                                :value="category.id">
                                            <span class="check"></span>
                                            <span class="control-label">{{ category.nombre }}</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <InputError class="mt-2" :message="form.errors.categoria" />
                        </div>

                        <hr>

                        <!---Imagen del post-->
                        <div class="field">
                            <label class="label">Subir imagen referencial:</label>
                            <div class="field-body">
                                <div class="field file">
                                    <label class="upload control">
                                        <a class="button blue">
                                            Subir
                                        </a>
                                        <input ref="photoInput" type="file" @change="seleccionaImg()" accept=".png,.jpg">
                                    </label>
                                </div>

                                <div v-show="photoPreview" class="mt-2">
                                    <span class="block w-56 h-48 bg-cover bg-no-repeat bg-center"
                                        :style="'background-image: url(\'' + photoPreview + '\');'" />
                                </div>

                            </div>
                            <InputError class="mt-2" :message="form.errors.img_path" />
                        </div>

                        <hr>

                        <!---Autor del post-->
                        <div class="field">
                            <label class="label" for="autor">Autor:</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="text" placeholder="Escriba su nombre"
                                            v-model="form.autor" id="autor">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>
                            </div>
                            <InputError class="mt-2" :message="form.errors.autor" />
                        </div>

                        <hr>

                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button green" :disabled="form.processing"
                                    :class="{ 'opacity-75': form.processing }">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>

    </AppLayout>
</template>
