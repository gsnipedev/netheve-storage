<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

const form = useForm({});

defineProps({
    divisions: Array
})
</script>

<template>
    <Head title="Data Divisi"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Data Divisi</h2>
        </template>

        <div
            class="max-w-7xl mx-auto sm:p-6 lg:p-8 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 mt-4 rounded-md overflow-x-auto">
            <table class="w-full min-w-[500px]">
                <thead>
                <tr>
                    <td class="p-4 font-bold w-10">ID</td>
                    <td class="p-4 font-bold">Nama Divisi</td>
                </tr>
                </thead>
                <tbody>
                <tr class="border-t border-b border-gray-300 dark:border-gray-700">
                    <td colspan="7">
                        <a :href="route('division.create')">
                            <PrimaryButton class="w-full bg-blue-500 my-2">+ Tambah Divisi</PrimaryButton>
                        </a>
                    </td>
                </tr>
                <tr class="border-t border-b border-gray-300 dark:border-gray-700" v-for="d in divisions">
                    <td class="p-4">{{ d.id }}</td>
                    <td class="p-4">{{ d.name }}</td>
                    <td class="text-end">
                        <a :href="route('division.edit', d.id)">
                            <SecondaryButton class="mr-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Edit</SecondaryButton>
                        </a>
                        <form class="inline" @submit.prevent="form.delete(route('division.destroy', d.id))">
                            <DangerButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Delete
                            </DangerButton>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
