<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
defineProps({
    posts: {
        Type: Number
    },
    cursos: Number,
    egresados: Number,
    equipos: Number
})
</script>

<template>
    <!---AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout----->
    <AppLayout title="Dashboard">

        <!---Header Section-->
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Dashboard</li>
                    <!---li>Panel</li--->
                </ul>
                <!---a href="#" class="button blue">
                    <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                    <span>Accion</span>
                </a--->
            </div>
        </section>

        <!-----Section Cards-->
        <div class="grid gap-6 grid-cols-1 md:grid-cols-2 mb-6">

            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Post publicados
                            </h3>
                            <h1>
                                {{ posts }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-green-500">
                            <i class="mdi mdi-post mdi-48px"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Cursos registrados
                            </h3>
                            <h1>
                                {{ cursos }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-blue-500"><i class="mdi mdi-book mdi-48px"></i></span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Total de equipos
                            </h3>
                            <h1>
                                {{ equipos }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-red-500"><i class="mdi mdi-tools mdi-48px"></i></span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Número de egresados
                            </h3>
                            <h1>
                                {{ egresados }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-red-500"><i class="mdi mdi-account-group-outline mdi-48px"></i></span>
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
