<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import HeaderSection from '@/Components/HeaderSection.vue';
import { ref, onMounted } from 'vue';

const photoInput = ref(null);
const photoPreview = ref(null);
let tipos = ref([
    {
        id: 1,
        nombre: 'Curso'
    },
    {
        id: 2,
        nombre: 'Capacitación'
    }
])

const props = defineProps({
    curso: Object,
    imgPathUrl: String
})

onMounted(() => {
    if (props.curso.img_path) {
        photoPreview.value = props.imgPathUrl;
    }
})

const form = useForm({
    _method: 'PUT',
    nombre: props.curso.nombre,
    descripcion: props.curso.descripcion,
    tipo: props.curso.tipo,
    costo: props.curso.costo,
    duracion: props.curso.duracion,
    fecha_inicio: props.curso.fecha_inicio,
    fecha_fin: props.curso.fecha_fin,
    img: props.curso.img_path
});


//Métodos
const submit = () => {

    if (photoInput.value) {
        form.img = photoInput.value.files[0];
    }

    form.post(route('cursos.update', props.curso.id));
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
    <AppLayout title="Editar Curso">

        <HeaderSection :icon="'mdi mdi-arrow-left'" :text-icon="'Volver'" :href-icon="route('cursos.index')">
            <li>Cursos</li>
            <li>Editar curso</li>
        </HeaderSection>

        <section class="section main-section">
            <div class="card mb-6">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-ballot"></i></span>
                        Editar curso
                    </p>
                </header>
                <div class="card-content">
                    <form method="post" @submit.prevent="submit()">

                        <!----Nombre del curso-->
                        <div class="field">
                            <label class="label" for="nombre">Nombre:</label>
                            <div class="control">
                                <input class="input" type="text" v-model="form.nombre" id="nombre"
                                    placeholder="Inteligencia de negocios aplicado a empresas">
                            </div>
                            <InputError class="mt-2" :message="form.errors.nombre" />
                        </div>

                        <!---Descripcion del curso-->
                        <div class="field">
                            <label class="label" for="descripcion">Descripción:</label>
                            <div class="control">
                                <textarea class="textarea" v-model="form.descripcion" id="descripcion"
                                    placeholder="Describa el curso"></textarea>
                            </div>
                            <InputError class="mt-2" :message="form.errors.descripcion" />
                        </div>

                        <!----Tipo del curso-->
                        <div class="field">
                            <label class="label">Tipo:</label>
                            <div class="field-body">
                                <div class="field grouped multiline">

                                    <div class="control" v-for="tipo in tipos" :key="tipo.id">
                                        <label class="radio">
                                            <input type="radio" v-model="form.tipo" name="tipo" :value="tipo.nombre">
                                            <span class="check"></span>
                                            <span class="control-label">{{ tipo.nombre }}</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <InputError class="mt-2" :message="form.errors.tipo" />
                        </div>
                        <hr>

                        <!----Costo del curso-->
                        <div class="field">
                            <label class="label" for="costo">Costo:</label>
                            <div class="control">
                                <input class="input" type="number" v-model="form.costo" id="costo" placeholder="50 soles">
                            </div>
                            <InputError class="mt-2" :message="form.errors.costo" />
                        </div>

                        <!----Duración del curso-->
                        <div class="field">
                            <label class="label" for="duracion">Duración:</label>
                            <div class="control">
                                <input class="input" type="text" v-model="form.duracion" id="duracion"
                                    placeholder="2 meses">
                            </div>
                            <InputError class="mt-2" :message="form.errors.duracion" />
                        </div>

                        <hr>
                        <!----Fecha Inicio-->
                        <div class="field">
                            <label class="label" for="fecha_inicio">Fecha Inicio:</label>
                            <div class="control">
                                <input class="input" type="date" v-model="form.fecha_inicio" id="fecha_inicio">
                            </div>
                            <InputError class="mt-2" :message="form.errors.fecha_inicio" />
                        </div>

                        <!----Fecha Fin-->
                        <div class="field">
                            <label class="label" for="fecha_fin">Fecha Fin:</label>
                            <div class="control">
                                <input class="input" type="date" v-model="form.fecha_fin" id="duracion">
                            </div>
                            <InputError class="mt-2" :message="form.errors.fecha_fin" />
                        </div>

                        <hr>

                        <!---Imagen del Curso-->
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