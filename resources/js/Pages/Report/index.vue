<script setup>

import {Head, router, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PdfService from "@/Service/PdfService.js";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import Select from "@/Components/Select.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import DatePicker from "@/Components/DatePicker.vue";
import {ref} from "vue";
import SendToDivisionReportForm from "@/Pages/Report/Partials/SendToDivisionReportForm.vue";

const props = defineProps({
  divisions: Array,
  items: Array
})

const form = useForm({});
const fetchResult = ref([]);


</script>

<template>
  <Head title="Transaksi"/>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Laporan</h2>
    </template>

    <div
        class="max-w-7xl mx-auto p-6 lg:p-8 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 mt-4 rounded-md container">
      <SendToDivisionReportForm :divisions="divisions"/>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>
