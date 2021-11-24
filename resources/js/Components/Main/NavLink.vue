<template>
    <Link :href="href" :class="classes">
        <i :class="setIcon"></i>
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },

    props: ['href', 'active', 'icon'],

    computed: {
        classes() {
            return this.active
                ? 'text-white hover:bg-primary-focus text-xs uppercase py-5 px-2 font-bold block bg-primary rounded'
                : 'text-blue-500 hover:bg-blue-50 hover:text-blue-900 text-xs uppercase py-5 px-2 font-bold block';
        },
        setIcon() {
            return this.icon + ' opacity-75 mr-2 text-sm';
        }
    }
}
</script>
