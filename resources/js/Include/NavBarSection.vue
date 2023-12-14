<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'
import NavLink from '@/Components/Inicio/NavLink.vue';

let navbarOpen = ref(false)

</script>

<template>
    <!-- ====== Navbar Section Start -->
    <header class="absolute left-0 top-0 z-50 w-full">
        <div class="container mx-auto">
            <div class="relative -mx-4 flex items-center justify-between">
                <div class="w-60 max-w-full px-4">
                    <Link href="/" class="block w-full py-5">
                    <img src="/images/logo/logoFisme.svg" alt="logo" class="w-full" />
                    </Link>
                </div>
                <div class="flex w-full items-center justify-between px-4">
                    <div>
                        <button @click="navbarOpen = !navbarOpen" :class="navbarOpen && 'navbarTogglerActive'"
                            id="navbarToggler"
                            class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-body-color"></span>
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-body-color"></span>
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-body-color"></span>
                        </button>
                        <nav :class="!navbarOpen && 'hidden'" id="navbarCollapse"
                            class="absolute right-4 top-full w-full max-w-[250px] rounded-lg bg-white py-5 px-6 shadow transition-all lg:static lg:block lg:w-full lg:max-w-full lg:shadow-none">
                            <ul class="block lg:flex">
                                <li>
                                    <NavLink :active="route().current('inicio.welcome')" :href="route('inicio.welcome')">
                                        Inicio
                                    </NavLink>
                                </li>
                                <li>
                                    <NavLink :active="route().current('inicio.nosotros')" :href="route('inicio.nosotros')">
                                        Nosotros
                                    </NavLink>
                                </li>
                                <li>
                                    <NavLink :active="$page.url.startsWith('/blog')" :href="route('inicio.noticias')">
                                        Blog
                                    </NavLink>
                                </li>
                                <li>
                                    <NavLink :active="route().current('inicio.equipamiento')" :href="route('inicio.equipamiento')">
                                        Equipamiento
                                    </NavLink>
                                </li>
                                <li>
                                    <NavLink :active="$page.url.startsWith('/cursos')" :href="route('inicio.cursos')">
                                        Cursos
                                    </NavLink>
                                </li>
                                <li>
                                    <NavLink :active="route().current('inicio.egresados')" :href="route('inicio.egresados')">
                                        Egresados
                                    </NavLink>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="hidden justify-end pr-16 sm:flex lg:pr-0">
                        <!--a href="javascript:void(0)" class="py-3 px-7 text-base font-medium text-dark hover:text-primary">
                            Login
                        </a--->
                        <Link :href="route('login')"
                            class="rounded-lg bg-primary py-3 px-7 text-base font-medium text-white hover:bg-opacity-90">
                        Iniciar sesión
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ====== Navbar Section End -->
</template>

<style></style>