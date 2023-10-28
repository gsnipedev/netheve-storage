<script setup>

import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import {Head, useForm} from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

function submit(){
    form.post(route('division.store'));
}

const props = defineProps({
    data: Object
})

const form = useForm({
    name: ''
})
</script>

<template>
    <Head title="Buat Divisi"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Buat Divisi</h2>
        </template>

        <div
            class="max-w-7xl mx-auto p-6 lg:p-8 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 mt-4 rounded-md container">

            <form action="" @submit.prevent="submit">
                <div>
                    <InputLabel for="name" value="Nama Divisi"/>

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                    />

                    <InputError class="mt-2" :message="form.errors.name"/>
                </div>

                <div class="mt-4">
                    <PrimaryButton class="text-center" :class="{ 'opacity-25': form.processing }"
                                   :disabled="form.processing">
                        Simpan
                    </PrimaryButton>
                </div>
            </form>
        </div>

        <!--        <div class="text-white">{{ data }}</div>-->
        <!--    <div class="text-white">{{ errors }}</div>-->
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
