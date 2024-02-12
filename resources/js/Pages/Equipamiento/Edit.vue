<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import HeaderSection from '@/Components/HeaderSection.vue';
import { ref, onMounted } from 'vue';

const photoInput = ref(null);
const photoPreview = ref(null);

const props = defineProps({
    equipo: Object,
    imgPathUrl: String
})

onMounted(() => {
    if (props.equipo.img_path) {
        photoPreview.value = props.imgPathUrl;
    }
})

const form = useForm({
    _method: 'PUT',
    nombre: props.equipo.nombre,
    modelo: props.equipo.modelo,
    descripcion: props.equipo.descripcion,
    img: props.equipo.img_path
});


//Métodos
const submit = () => {

    if (photoInput.value) {
        form.img = photoInput.value.files[0];
    }

    form.post(route('equipamientos.update', props.equipo.id));
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
    <AppLayout title="Editar equipo">

        <HeaderSection :icon="'mdi mdi-arrow-left'" :text-icon="'Volver'" :href-icon="route('equipamientos.index')">
            <li>Equipamiento</li>
            <li>Editar equipo</li>
        </HeaderSection>

        <section class="section main-section">
            <div class="card mb-6">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-ballot"></i></span>
                        Editar equipo
                    </p>
                </header>
                <div class="card-content">
                    <form method="post" @submit.prevent="submit()">

                        <!----Nombre del equipo-->
                        <div class="field">
                            <label class="label" for="nombre">Nombre:</label>
                            <div class="control">
                                <input class="input" type="text" v-model="form.nombre" id="nombre"
                                    placeholder="Lentes de realidad virtual">
                            </div>
                            <InputError class="mt-2" :message="form.errors.nombre" />
                        </div>

                        <!----Modelo del equipo-->
                        <div class="field">
                            <label class="label" for="modelo">Modelo:</label>
                            <div class="control">
                                <input class="input" type="text" v-model="form.modelo" id="modelo"
                                    placeholder="Meta Quez 2">
                            </div>
                            <InputError class="mt-2" :message="form.errors.modelo" />
                        </div>

                         <!---Descripcion del equipo-->
                         <div class="field">
                            <label class="label" for="descripcion">Descripción:</label>
                            <div class="control">
                                <textarea class="textarea" v-model="form.descripcion" id="descripcion"
                                    placeholder="Agregue una descripción para el equipo"></textarea>
                            </div>
                            <InputError class="mt-2" :message="form.errors.descripcion" />
                        </div>

                        <hr>

                        <!---Imagen del equipo-->
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
                            <InputError class="mt-2" :message="form.errors.img" />
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

<style scoped></style>