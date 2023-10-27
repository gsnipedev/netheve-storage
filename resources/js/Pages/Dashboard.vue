<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import DangerButton from "@/Components/DangerButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import PrimaryIconButton from "@/Components/PrimaryIconButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const form = useForm({});


defineProps({
    data: Object
})
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div
            class="mt-4 max-w-7xl mx-auto px-6 lg:px-8 text-gray-700 dark:text-gray-300 rounded-md flex justify-center">
            <div class="flex">
                <a v-for="l in data.links" :href="l.url">
                    <button
                        class="hover:z-20 !p-2 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 dark:hover:bg-gray-700 px-4 py-2 border border-transparent font-semibold text-xs  uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                        v-html="l.label"></button>
                </a>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto sm:p-6 lg:p-8 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 mt-4 rounded-md overflow-x-auto">
            <table class="w-full table-fixed min-w-[1000px]">
                <thead>
                <tr>
                    <td class="p-4 font-bold w-10">ID</td>
                    <td class="p-4 font-bold">Nama Barang</td>
                    <td class="font-bold">Tag</td>
                    <td class="font-bold">Stok Barang</td>
                    <td class="font-bold">Tanggal</td>
                    <td class="font-bold">Pembuat</td>
                </tr>
                </thead>
                <tbody>
                <tr class="border-t border-b border-gray-300 dark:border-gray-700">
                    <td colspan="7">
                        <a :href="route('item.create')">
                            <PrimaryButton class="w-full bg-blue-500 my-2">+ Tambah Inventory</PrimaryButton>
                        </a>
                    </td>
                </tr>
                <tr class="border-t border-b border-gray-300 dark:border-gray-700" v-for="d in data.data">
                    <td class="p-4">{{ d.id }}</td>
                    <td class="p-4">{{ d.name }}</td>
                    <td>{{ d.tag.name }}</td>
                    <td>{{ d.stock }}</td>
                    <td>{{ new Date(d.created_at).toISOString().split('T')[0] }}</td>
                    <td>{{ d.user.name }}</td>
                    <td class="text-end">
                        <a :href="route('item.edit', d.id)">
                            <SecondaryButton class="mr-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Edit</SecondaryButton>
                        </a>
                        <form class="inline" @submit.prevent="form.delete(route('item.destroy', d.id))">
                            <DangerButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Delete
                            </DangerButton>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="max-w-7xl mx-auto sm:p-6 lg:p-8 text-gray-700 dark:text-gray-300 rounded-md flex justify-center">
            <div class="flex">
                <a v-for="l in data.links" :href="l.url">
                    <button
                        class="hover:z-20 !p-2 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 dark:hover:bg-gray-700 px-4 py-2 border border-transparent font-semibold text-xs  uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                        v-html="l.label"></button>
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-gray-700 dark:text-gray-300 rounded-md flex justify-center">
            <div>
                <span>Page: {{ data.current_page }}, Total: {{ data.total }} Row (s)</span>
            </div>
        </div>

        <br>
        <!--    <div class="text-white">{{ data }}</div>-->
    </AuthenticatedLayout>
</template>

<style scoped>
</style>
