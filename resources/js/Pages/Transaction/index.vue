<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import SendToDivisionForm from "@/Pages/Transaction/Partials/SendToDivisionForm.vue";
import ReceiveFromDivisionForm from "@/Pages/Transaction/Partials/ReceiveFromDivisionForm.vue";

defineProps({
    divisions: Array,
    items: Array
})
</script>

<template>
    <Head title="Transaksi"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Transaksi</h2>
        </template>

        <div
            class="max-w-7xl mx-auto p-6 lg:p-8 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 mt-4 rounded-md container">
            <SendToDivisionForm :divisions="divisions" :items="items"/>
        </div>

        <div
            class="max-w-7xl mx-auto p-6 lg:p-8 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 mt-4 rounded-md container">
            <ReceiveFromDivisionForm :divisions="divisions" :items="items"/>
        </div>

        <br>

    </AuthenticatedLayout>
</template>

<style scoped>

</style>
