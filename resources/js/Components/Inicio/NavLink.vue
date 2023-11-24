<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'flex py-2 text-base font-medium text-primary lg:ml-12 lg:inline-flex'
        : 'flex py-2 text-base font-medium text-dark hover:text-primary lg:ml-12 lg:inline-flex';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>