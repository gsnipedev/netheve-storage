<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import Select from "@/Components/Select.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import {router, useForm} from "@inertiajs/vue3";
import {ref} from "vue";

const trx = ref([])

const form = useForm({
  division_id: 1,
  item_id: 1,
  amount: 0
});

defineProps({
  divisions: Array
})

async function fetchItem() {
  const response = await fetch(`${route('search.division')}?division_id=${form.division_id}`, {
    method: 'GET'
  })

  trx.value = await response.json()
}

function submit() {
  form.post(route('transaction.store_back'), {
    onSuccess: () => form.reset()
  });
}
</script>

<template>
  <section>
    <header>
      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Pengembalian Barang</h2>

      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        Form untuk mengembalikan barang kembali ke inventory.
      </p>
    </header>

    <form @submit.prevent="submit" class="mt-6 space-y-6">
      <div>
        <InputLabel for="division" value="Divisi"/>

        <Select id="division" v-model="form.division_id" @change="fetchItem" class="w-full h-11 mt-1">
          <option v-for="d in divisions" :value="d.id">{{ d.name }}</option>
        </Select>

        <InputError :message="form.errors.division_id" class="mt-2"/>
      </div>

      <div>
        <InputLabel for="item_selector" value="Barang Inventory"/>
        <Select v-model="form.item_id" class="w-full block mt-1 h-11" id="item_selector">
          <option v-for="t in trx" :value="t.items.id">{{ t.items.name }} ({{ t.remaining_amount }})</option>
        </Select>

        <InputError :message="form.errors.item_id" class="mt-2"/>
      </div>

      <div>
        <InputLabel for="amount" value="Kuantitas"/>

        <TextInput
            id="amount"
            v-model="form.amount"
            type="number"
            class="mt-1 block w-full"
        />

        <InputError :message="form.errors.amount" class="mt-2"/>
      </div>

      <div class="flex items-center gap-4">
        <PrimaryButton :disabled="form.processing">Kirim</PrimaryButton>

        <Transition
            enter-active-class="transition ease-in-out"
            enter-from-class="opacity-0"
            leave-active-class="transition ease-in-out"
            leave-to-class="opacity-0"
        >
          <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">
            Data Tersimpan.
          </p>
        </Transition>
      </div>
    </form>

    <!--    <div class="text-white">{{ trx }}</div>-->
  </section>
</template>

<style scoped>

</style>
