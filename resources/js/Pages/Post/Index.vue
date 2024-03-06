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
    posts: Object
});

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
    form.post(route('posts.destroy', id));
}

const form = useForm({
    _method: 'DELETE',
});

</script>

<template>
    <AppLayout title="Posts">

        <!----Header section-->
        <HeaderSection :icon="'mdi mdi-pencil'" :textIcon="'Crear nuevo post'" :hrefIcon="route('posts.create')">
            <li>Posts</li>
        </HeaderSection>



        <!---Section content-->
        <section class="section main-section">

            <!---Notificacion Success-->
            <NotificationSuccess :message="$page.props.flash.message" />

            <!---Notificacion Fail-->
            <!----NotificationFail :message="$page.props.flash.error" /---->

            <!---Tabla con elementos-->
            <div class="card has-table" v-if="posts.data.length">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-post-outline"></i></span>
                        Posts
                    </p>
                    <a href="#" class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-reload"></i></span>
                    </a>
                </header>

                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Contenido</th>
                                <th>Autor</th>
                                <th>Categoría</th>
                                <th>Publicado el</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="post in posts.data" :key="post.id">
                                <td data-label="Título">{{ post.titulo }}</td>
                                <td data-label="Contenido">{{ post.contenido }}</td>
                                <td data-label="Autor">{{ post.autor }}</td>
                                <td data-label="Categoría">
                                    <template v-for="categoria in post.categorias" :key="categoria.id">
                                        {{ categoria.nombre }}
                                    </template>
                                </td>
                                <td data-label="Fecha de publicación">
                                    <small class="text-gray-500" title="Oct 25, 2021">{{ post.created_at }}</small>
                                </td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <!---Editar-->
                                        <Link :href="route('posts.edit', post.id)" class="button small blue">
                                        <span class="icon"><span class="mdi mdi-pencil"></span></span>
                                        </Link>
                                        <!--button class="button small blue --jb-modal" data-target="sample-modal-2"
                                            type="button">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </button---->
                                        <!---Eliminar-->
                                        <button class="button small red" @click="showDeleteModal(post.id)">
                                            <span class="icon"><span class="mdi mdi-delete-empty"></span></span>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <Pagination :pagination="posts.meta" />
                </div>
            </div>

            <!---Tabla Vacía-->
            <EmptyTable v-else />

        </section>


    </AppLayout>
</template>
