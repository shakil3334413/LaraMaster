<template>
    <div v-for="listing in listings" :key="listing.id">
       <div>
            <Link :href="route('listing.show',listing.id)">
                <ListingAddress :listing="listing" />
            </Link>
       </div>
       <div>
            <Link :href="`/listing/${listing.id}/edit`" as="button">Edit</Link>&nbsp;
            <Link :href="`/listing/${listing.id}`" method="DELETE" as="button">Delete</Link>
       </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
import ListingAddress from '@/Components/ListingAddress.vue';
    defineProps({
        listings: Array
    })
</script>
