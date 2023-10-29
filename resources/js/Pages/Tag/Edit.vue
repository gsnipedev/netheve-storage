<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Select from "@/Components/Select.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Head, useForm} from "@inertiajs/vue3";

const props = defineProps({
    data: Object
})

const form = useForm({
    name: props.data.name
})

function submit(){
    form.put(route('tag.update', props.data.id), {});
}
</script>

<template>
    <Head title="Edit Tag"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Tag (id: {{
                    data.id
                }})</h2>
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
                        Update
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
