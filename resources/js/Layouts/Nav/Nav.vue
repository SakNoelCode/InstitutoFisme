<script setup>
import { router, Link } from '@inertiajs/vue3';

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

const toogleMobileAside = () => {
    const dropdownIcon = document.getElementById('icon-aside');

    document.documentElement.classList.toggle('aside-mobile-expanded');
    dropdownIcon.classList.toggle('mdi-forwardburger');
    dropdownIcon.classList.toggle('mdi-backburger');
}

const ToogleMenuMobile = (event) => {
    const dropdownIcon = event.currentTarget.querySelector('.icon .mdi');

    const targetId = event.currentTarget.getAttribute('data-target');
    const targetElement = document.getElementById(targetId);

    if (targetElement) {
        targetElement.classList.toggle('active');
    }

    if (dropdownIcon) {
        dropdownIcon.classList.toggle('mdi-dots-vertical');
        dropdownIcon.classList.toggle('mdi-close');
    }
}

const openPdf = () => {
    window.open('/manual-pdf', '_blank');
}

</script>

<template>
    <nav id="navbar-main" class="navbar is-fixed-top">
        <div class="navbar-brand">
            <a class="navbar-item mobile-aside-button" @click="toogleMobileAside">
                <span class="icon"><i id="icon-aside" class="mdi mdi-forwardburger mdi-24px"></i></span>
            </a>
            <!--div class="navbar-item">
                <div class="control"><input placeholder="Buscar....." class="input"></div>
            </div--->
        </div>
        <div class="navbar-brand is-right">
            <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu" @click="ToogleMenuMobile">
                <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
            </a>
        </div>
        <div class="navbar-menu" id="navbar-menu">
            <div class="navbar-end">

                <!--div class="navbar-item dropdown has-divider" @click="toogleDropDown">

                    <a class="navbar-link">
                        <span class="icon"><i class="mdi mdi-menu"></i></span>
                        <span>Sample Menu</span>
                        <span class="icon">
                            <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="profile.html" class="navbar-item">
                            <span class="icon"><i class="mdi mdi-account"></i></span>
                            <span>My Profile</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-settings"></i></span>
                            <span>Settings</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-email"></i></span>
                            <span>Messages</span>
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-logout"></i></span>
                            <span>Log Out</span>
                        </a>
                    </div>
                </div--->

                <div class="navbar-item dropdown has-divider has-user-avatar" @click="toogleDropDown">
                    <a class="navbar-link">
                        <div class="user-avatar">
                            <!---img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="Imagen del usuario"
                                class="rounded-full"---->
                            <svg class="w-4 h-4 text-gray-800 mt-1 ml-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18">
                                <path
                                    d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                        </div>
                        <div class="is-user-name"><span>{{ $page.props.auth.user.name }}</span></div>
                        <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                    </a>
                    <div class="navbar-dropdown">
                        <a :href="route('profile.show')" class="navbar-item --set-active-profile-html">
                            <span class="icon"><i class="mdi mdi-account"></i></span>
                            <span>Mi perfil</span>
                        </a>
                        <!--a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-settings"></i></span>
                            <span>Settings</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-email"></i></span>
                            <span>Messages</span>
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-logout"></i></span>
                            <span>Cerrar sesión</span>
                        </a----->
                    </div>
                </div>
                <a @click.prevent="openPdf()" class="navbar-item has-divider desktop-icon-only cursor-pointer">
                    <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
                    <span>About</span>
                </a>
                <!---a href="https://github.com/justboil/admin-one-tailwind" class="navbar-item has-divider desktop-icon-only">
                    <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                    <span>GitHub</span>
                </a--->
                <a title="Cerrar sesión" class="navbar-item desktop-icon-only cursor-pointer">
                    <Link :href="route('logout')" as="button" method="post">
                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                    <span>Cerrar sesión</span>
                    </Link>
                </a>
            </div>
        </div>
    </nav>
</template>

<style scoped></style>