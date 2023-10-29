<script setup>

import SendToDivisionForm from "@/Pages/Transaction/Partials/SendToDivisionForm.vue";
import {Head, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ReceiveFromDivisionForm from "@/Pages/Transaction/Partials/ReceiveFromDivisionForm.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({});

defineProps({
    tags: Array
})
</script>

<template>
  <Head title="Tag"/>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tag</h2>
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
                      <a :href="route('tag.create')">
                          <PrimaryButton class="w-full bg-blue-500 my-2">+ Tambah Tag</PrimaryButton>
                      </a>
                  </td>
              </tr>
              <tr class="border-t border-b border-gray-300 dark:border-gray-700" v-for="t in tags">
                  <td class="p-4">{{ t.id }}</td>
                  <td class="p-4">{{ t.name }}</td>
                  <td class="text-end">
                      <a :href="route('tag.edit', t.id)">
                          <SecondaryButton class="mr-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Edit</SecondaryButton>
                      </a>
                      <form class="inline" @submit.prevent="form.delete(route('tag.destroy', t.id))">
                          <DangerButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                              Delete
                          </DangerButton>
                      </form>
                  </td>
              </tr>
              </tbody>
          </table>
      </div>

<!--      <div class="text-white">{{ tags }}</div>-->

  </AuthenticatedLayout>
</template>

<style scoped>

</style>
