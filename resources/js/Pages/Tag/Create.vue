<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Select from "@/Components/Select.vue";
import TextInput from "@/Components/TextInput.vue";
import {Head, useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name: ''
})

function submit(){
    form.post(route('tag.store'), {});
}
</script>

<template>
    <Head title="Tambah Tag"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tambah Tag</h2>
        </template>

        <div
            class="max-w-7xl mx-auto p-6 lg:p-8 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 mt-4 rounded-md container">

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="tagName" value="Tag"/>

                    <TextInput
                        id="tagName"
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
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
