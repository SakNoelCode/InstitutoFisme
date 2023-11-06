<script setup>

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
                    <a href="#">
                        <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                        <span class="menu-item-label">Dashboard</span>
                    </a>
                </li>
            </ul>
            <p class="menu-label">Examples</p>
            <ul class="menu-list">
                <li class="--set-active-tables-html">
                    <a href="#">
                        <span class="icon"><i class="mdi mdi-table"></i></span>
                        <span class="menu-item-label">Tables</span>
                    </a>
                </li>
                <li class="--set-active-forms-html">
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
                </li>
            </ul>
            <p class="menu-label">About</p>
            <ul class="menu-list">
                <li>
                    <a href="https://justboil.me/tailwind-admin-templates/free-dashboard/" class="has-icon">
                        <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                        <span class="menu-item-label">About</span>
                    </a>
                </li>
                <li>
                    <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
                        <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                        <span class="menu-item-label">GitHub</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</template>

<style scoped></style>