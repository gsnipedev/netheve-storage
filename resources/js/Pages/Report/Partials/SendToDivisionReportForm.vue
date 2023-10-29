<script setup>

import PrimaryButton from "@/Components/PrimaryButton.vue";
import Select from "@/Components/Select.vue";
import DatePicker from "@/Components/DatePicker.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PdfService from "@/Service/PdfService.js";
import {useForm} from "@inertiajs/vue3";

defineProps({
  divisions: Array,
})

const form = useForm({
  division_id: null,
  start_date: null,
  end_date: null,
})

const pdfService = new PdfService();

async function submitSendToDivisionReport() {

  if (form.division_id === null || form.start_date === null || form.end_date === null) {
    return;
  }

  const result = await axios.post(route('report.send_to_division'), {
    division_id: form.division_id,
    start_date: form.start_date,
    end_date: form.end_date
  })

  console.log(result.data)

  pdfService.makeSendToDivisionReport(result.data.db, form.start_date, form.end_date, result.data.division_data.name)
}

</script>

<template>

  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Laporan Pengiriman ke Divisi</h2>

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      Cetak laporan berdasarkan divisi tertentu dengan jangka tanggal.
    </p>
  </header>

  <br>
  <form action="" @submit.prevent="submitSendToDivisionReport">
    <div>
      <InputLabel for="division" value="Divisi"/>

      <Select id="division" v-model="form.division_id" class="w-full h-11 mt-1">
        <option selected style='display: none'></option>
        <option v-for="d in divisions" :value="d.id">{{ d.name }}</option>
      </Select>
    </div>

    <div class="mt-4 grid grid-cols-2 gap-4">
      <div>
        <InputLabel for="startDate" value="Tanggal Mulai"/>
        <DatePicker type="date" v-model="form.start_date" id="startDate" class="w-full block mt-1"/>
      </div>
      <div>
        <InputLabel for="endDate" value="Tanggal Akhir"/>
        <DatePicker type="date" v-model="form.end_date" id="endDate" class="w-full block mt-1"/>
      </div>
    </div>

    <div class="mt-4">
      <PrimaryButton class="text-center"
                     :class="{ 'opacity-25': form.processing }"
                     :disabled="form.processing">
        Cetak Laporan
      </PrimaryButton>
    </div>
  </form>

</template>

<style scoped>

</style>
