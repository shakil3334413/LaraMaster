<template>
    <div>
        <Link href="/listing">Listing</Link>&nbsp;
        <Link href="/listing/create">New Listing</Link>
        <!-- Timer Section in view -->
        <!-- <h2>The Timer Start {{timer}}</h2> -->
        <!-- Success Pages Show div -->
        <div v-if="flashSuccess" class="success">
            {{ flashSuccess }}
        </div>
    </div>
    <slot>Default</slot>
</template>
<script setup>
    import { Link,usePage } from '@inertiajs/vue3';
    import { computed } from 'vue';
    // import {ref} from 'vue';

    // page.props.flash.syccess  
    const page = usePage();
    const flashSuccess = computed(
        () => page.props.flash.success,
    )
    // Timer Section Code
    // const timer = ref(0);
    // setInterval(() => timer.value++, 1000);
</script>

<style scoped>
    .success{
        background-color: green;
        color: white;
    }
</style>