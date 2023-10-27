<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {onMounted} from "vue";
import Select from "@/Components/Select.vue";

function submit() {
    form.put(route('item.update', props.data.id), {
        //onFinish: () => form.reset('password'),
    });
}

const props = defineProps({
    data: Object,
    tags: Array
})

const form = useForm({
    name: props.data.name,
    stock: props.data.stock,
    tag: props.data.tag_id,
    remember: false,
});
</script>

<template>
    <Head title="Edit Item"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Item (id: {{
                    data.id
                }})</h2>
        </template>

        <div
            class="max-w-7xl mx-auto p-6 lg:p-8 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 mt-4 rounded-md container">

            <form action="" @submit.prevent="submit">
                <div>
                    <InputLabel for="itemName" value="Nama Barang"/>

                    <TextInput
                        id="itemName"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                    />

                    <InputError class="mt-2" :message="form.errors.name"/>
                </div>

                <div class="mt-4">
                    <InputLabel for="stock" value="Stock Barang"/>

                    <TextInput
                        id="stock"
                        type="number"
                        class="mt-1 block w-full"
                        required
                        v-model="form.stock"
                    />

                    <InputError class="mt-2" :message="form.errors.stock"/>
                </div>

                <div class="mt-4">
                    <InputLabel for="tag" value="Tag"/>

                    <Select id="tag" class="w-full mt-1 block px-3 h-11" v-model="form.tag">
                        <option v-for="t in tags" :value="t.id">{{ t.name }}</option>
                    </Select>

                    <InputError class="mt-2" :message="form.errors.tag"/>
                </div>

                <div class="mt-4">
                    <PrimaryButton class="text-center" :class="{ 'opacity-25': form.processing }"
                                   :disabled="form.processing">
                        Update
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
