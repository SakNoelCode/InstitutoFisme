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
    egresados: Object
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
            deleteRegister(id);
            Swal.fire("Eliminado", "", "success");
        }
        //deleteCurso(id);
    });
};

const deleteRegister = (id) => {
    form.post(route('egresados.destroy', id));
}

const form = useForm({
    _method: 'DELETE',
});

</script>

<template>
    <AppLayout title="Egresados">

        <!--Header section-->
        <HeaderSection :icon="'mdi mdi-pencil'" :textIcon="'Crear nuevo egresado'"
            :hrefIcon="route('egresados.create')">
            <li>Egresados</li>
        </HeaderSection>


        <!---Section content-->
        <section class="section main-section">

            <!---Notificacion Success-->
            <NotificationSuccess :message="$page.props.flash.message" />

            <!---Notificacion Fail-->
            <!----NotificationFail :message="$page.props.flash.error" /---->

            <!---Tabla con elementos-->
            <div class="card has-table" v-if="egresados.data.length">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-group-outline"></i></span>
                        Egresados
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in egresados.data" :key="item.id">
                                <td data-label="Nombre">{{ item.nombre }}</td>
                                <td data-label="Descripción">{{ item.descripcion }}</td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <!---Editar-->
                                        <Link :href="route('egresados.edit', item.id)" class="button small blue">
                                        <span class="icon"><span class="mdi mdi-pencil"></span></span>
                                        </Link>
                                        <!--button class="button small blue --jb-modal" data-target="sample-modal-2"
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                </button---->
                                        <!---Eliminar-->
                                        <button class="button small red" @click="showDeleteModal(item.id)">
                                            <span class="icon"><span class="mdi mdi-delete-empty"></span></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <Pagination :pagination="egresados.meta" />
                </div>

            </div>

            <!---Tabla Vacía-->
            <EmptyTable v-else />

        </section>


    </AppLayout>
</template>

<style scoped></style>