<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    posts: Array
});

const setupNotificationDismiss = () => {
    const notificationElement = event.currentTarget.closest('.notification');
    if (notificationElement) {
        notificationElement.classList.add('hidden');
    }
}


</script>

<template>
    <AppLayout title="Posts">

        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Posts</li>
                    <!---li>Panel</li--->
                </ul>
                <Link :href="route('posts.create')" class="button blue">
                <span class="icon"><span class="mdi mdi-pencil"></span></span>
                <span>Crear nuevo post</span>
                </Link>
            </div>
        </section>

        <!---Tabla posts-->
        <section class="section main-section">

            <!---Notificacion Success-->
            <div class="notification blue" v-if="$page.props.flash.message">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                    <div>
                        <span class="icon"><i class="mdi mdi-buffer"></i></span>
                        <b>{{ $page.props.flash.message }}</b>
                    </div>
                    <button @click="setupNotificationDismiss()" type="button"
                        class="button small textual --jb-notification-dismiss bg-white">Cerrar</button>
                </div>
            </div>

            <!---Notificacion Fail-->
            <!--div class="notification red">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                    <div>
                        <span class="icon"><i class="mdi mdi-buffer"></i></span>
                        <b>Empty table.</b>
                    </div>
                    <button @click="setupNotificationDismiss()" type="button"
                        class="button small textual --jb-notification-dismiss bg-white">Cerrar</button>
                </div>
            </div---->


            <!---Tabla con elementos-->
            <div class="card has-table" v-if="posts">
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
                            <tr v-for="post in posts" :key="post.id">
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
                                        <Link :href="route('posts.destroy', post.id)" class="button small red" as="button"
                                            method="delete">
                                        <span class="icon"><span class="mdi mdi-delete-empty"></span></span>
                                        </Link>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!---div class="table-pagination">
                        <div class="flex items-center justify-between">
                            <div class="buttons">
                                <button type="button" class="button active">1</button>
                                <button type="button" class="button">2</button>
                                <button type="button" class="button">3</button>
                            </div>
                            <small>Page 1 of 3</small>
                        </div>
                    </div---->
                </div>
            </div>

            <!---Tabla Vacía-->
            <div class="card empty" v-else>
                <div class="card-content">
                    <div>
                        <span class="icon large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span>
                    </div>
                    <p>No hay nada aquí....</p>
                </div>
            </div>

        </section>


    </AppLayout>
</template>
