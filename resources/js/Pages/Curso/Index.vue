<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import NotificationSuccess from '@/Components/NotificationSuccess.vue';
import NotificationFail from '@/Components/NotificationFaill.vue';
import Pagination from '@/Components/Pagination.vue';
import HeaderSection from '@/Components/HeaderSection.vue';
import EmptyTable from '@/Components/EmptyTable.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    cursos: Object
})

const showDeleteModal = (id) => {
    Swal.fire({
        title: "Seguro que quieres eliminar el registro?",
        showDenyButton: true,
        //  showCancelButton: true,
        confirmButtonText: "Confirmar",
        denyButtonText: `Cancelar`
    }).then((result) => {

        if (result.isConfirmed) {
            deleteCurso(id);
            Swal.fire("Eliminado", "", "success");
        }
        //deleteCurso(id);
    });
};

const deleteCurso = (id) => {
    form.post(route('cursos.destroy', id));
}

const form = useForm({
    _method: 'DELETE',
});

</script>

<template>
    <AppLayout title="Cursos">

        <!--Header section-->
        <HeaderSection :icon="'mdi mdi-pencil'" :textIcon="'Crear nuevo curso'" :hrefIcon="route('cursos.create')">
            <li>Cursos</li>
        </HeaderSection>


        <!---Section content-->
        <section class="section main-section">

            <!---Notificacion Success-->
            <NotificationSuccess :message="$page.props.flash.message" />

            <!---Notificacion Fail-->
            <!--NotificationFail :message="$page.props.flash.error" /---->

            <!---Tabla con elementos-->
            <div class="card has-table" v-if="cursos.data.length">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-book"></i></span>
                        Cursos
                    </p>
                    <a href="#" class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-reload"></i></span>
                    </a>
                </header>

                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Tipo</th>
                                <th>Costo</th>
                                <th>Inicio</th>
                                <th>Fin</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="curso in cursos.data" :key="curso.id">
                                <td data-label="Nombre">{{ curso.nombre }}</td>
                                <td data-label="Descripción">{{ curso.descripcion }}</td>
                                <td data-label="Tipo">{{ curso.tipo }}</td>
                                <td data-label="Costo">{{ curso.costo }}</td>
                                <td data-label="Inicio">
                                    <small class="text-gray-500" title="Oct 25, 2021">{{ curso.fecha_inicio }}</small>
                                </td>
                                <td data-label="Fin">
                                    <small class="text-gray-500" title="Oct 25, 2021">{{ curso.fecha_fin }}</small>
                                </td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <!---Editar-->
                                        <Link :href="route('cursos.edit', curso.id)" class="button small blue">
                                        <span class="icon"><span class="mdi mdi-pencil"></span></span>
                                        </Link>
                                        <!--button class="button small blue --jb-modal" data-target="sample-modal-2"
                                            type="button">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </button---->
                                        <!---Eliminar-->
                                        <button class="button small red" @click="showDeleteModal(curso.id)">
                                            <span class="icon"><span class="mdi mdi-delete-empty"></span></span>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <Pagination :pagination="cursos.meta" />
                </div>

            </div>

            <!---Tabla Vacía-->
            <EmptyTable v-else />

        </section>


    </AppLayout>
</template>

<style scoped></style>