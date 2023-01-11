<template>
    <div>
        <Head title="Dashboard"></Head>

        <div class=" p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class=" table-fixed w-full text-sm text-center text-gray-500 dark:text-gray-400 rounded-lg">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 bg-orange-400 rounded-lg">
                        <p class="text-white text-2xl font-bold bg-red-400">Pagamentos Vencidos</p>
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Nome
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Valor
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Dia-Vencimento
                            </th>
                        </tr>
                    </thead>
                    <tbody v-for="due_date in data" :key="due_date">
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 truncate">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:bg-gray-800 truncate">
                                {{ due_date.name }}
                            </th>
                            <td class="py-4 px-6 truncate">
                                {{ formatPrice(due_date.value) }}
                            </td>
                            <td class="py-4 px-6 truncate">
                                {{ dayjs(due_date.due_date).format("DD/MM/YYYY") }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
 
dayjs.extend(relativeTime);

const props = defineProps({
    data: {
        type: Object,
        default: () => {}
    }
});

function formatPrice(value) {
    let val = (value/1).toFixed(2).replace('.', ',')
    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
}

</script>