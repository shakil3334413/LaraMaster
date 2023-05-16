<template>
  <div>Index</div>
  <Link href="/show">Show Page</Link>
  <h3>The props come to indexController {{message}}</h3>
</template>

  <script setup>

  import { Link } from '@inertiajs/vue3'
  defineProps({
    'message': String
  });
  </script>
