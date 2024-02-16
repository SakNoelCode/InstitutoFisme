<script setup>

import { Link } from '@inertiajs/vue3';

const toogleDropDown = () => {
    const dropdown = event.currentTarget;

    if (dropdown.classList.contains('navbar-item')) {
        dropdown.classList.toggle('active');
    } else {
        const dropdownIcon = dropdown.querySelector('.mdi');

        dropdown.parentNode.classList.toggle('active');
        dropdownIcon.classList.toggle('mdi-plus');
        dropdownIcon.classList.toggle('mdi-minus');
    }
}

const openPdf = () => {
    window.open('/manual-pdf', '_blank');
}
</script>

<template>
    <aside class="aside is-placed-left is-expanded">
        <div class="aside-tools">
            <div>
                Panel de <b class="font-black">Administración</b>
            </div>
        </div>
        <div class="menu is-menu-main">
            <p class="menu-label">General</p>
            <ul class="menu-list">
                <li class="--set-active-index-html">
                    <Link :href="route('dashboard')">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                    </Link>
                </li>
            </ul>
            <p class="menu-label">Menu</p>
            <ul class="menu-list">
                <li class="--set-active-tables-html">
                    <Link :href="route('posts.index')">
                    <span class="icon"><span class="mdi mdi-post"></span></span>
                    <span class="menu-item-label">Posts</span>
                    </Link>
                </li>

                <li class="">
                    <Link :href="route('cursos.index')">
                    <span class="icon"><span class="mdi mdi-book"></span></span>
                    <span class="menu-item-label">cursos</span>
                    </Link>
                </li>

                <li class="">
                    <Link :href="route('equipamientos.index')">
                    <span class="icon"><span class="mdi mdi-tools"></span></span>
                    <span class="menu-item-label">Equipamiento</span>
                    </Link>
                </li>

                <li class="">
                    <Link :href="route('egresados.index')">
                    <span class="icon"><span class="mdi mdi-account-group-outline"></span></span>
                    <span class="menu-item-label">Egresados</span>
                    </Link>
                </li>
                <!--li class="--set-active-forms-html">
                    <a href="forms.html">
                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                        <span class="menu-item-label">Forms</span>
                    </a>
                </li>
                <li class="--set-active-profile-html">
                    <a href="profile.html">
                        <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                        <span class="menu-item-label">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="login.html">
                        <span class="icon"><i class="mdi mdi-lock"></i></span>
                        <span class="menu-item-label">Login</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown" @click="toogleDropDown">
                        <span class="icon"><i class="mdi mdi-view-list"></i></span>
                        <span class="menu-item-label">Submenus</span>
                        <span class="icon"><i class="mdi mdi-plus"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="#void">
                                <span>Sub-item One</span>
                            </a>
                        </li>
                        <li>
                            <a href="#void">
                                <span>Sub-item Two</span>
                            </a>
                        </li>
                    </ul>
                </li--->
            </ul>
            <p class="menu-label">Acerca de</p>
            <ul class="menu-list">
                <li>
                    <a @click.prevent="openPdf()" class="has-icon cursor-pointer">
                        <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                        <span class="menu-item-label">Manual</span>
                    </a>
                </li>
                <!--li>
                    <a href="https://justboil.me/tailwind-admin-templates/free-dashboard/" class="has-icon">
                        <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                        <span class="menu-item-label">FAQ</span>
                    </a>
                </li>
                <li>
                    <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
                        <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                        <span class="menu-item-label">GitHub</span>
                    </a>
                </li--->
            </ul>
        </div>
    </aside>
</template>

<style scoped></style>