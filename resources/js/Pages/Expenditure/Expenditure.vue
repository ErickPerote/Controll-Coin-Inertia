<template>
    <AuthenticatedLayout>

        <Head title="Despesas" />

        <Create></Create>

        <div class=" p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class=" table-fixed w-full text-sm text-center text-black bg:white">
                    <thead class="text-xs text-black uppercase bg-red-400 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Nome
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Vencimento
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Status
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Valor
                            </th>
                            <th scope="col" class="py-3 px-6"></th>
                        </tr>
                    </thead>
                    <tbody v-for="exp in expenditure" :key="exp.id">
                        <tr
                            class="border-b bg-white dark:border-gray-700 truncate" 
                            :class="{ 'bg-green-300 text-black' : exp.status }">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap  truncate">
                                {{ exp.name }}
                            </th>
                            <td class="py-4 px-6 truncate">
                                {{ dayjs(exp.due_date).format('YYYY/MM/DD') }}
                            </td>
                            <td v-if="exp.status" class="py-4 px-6 truncate">
                                Pago
                            </td>
                            <td v-else class="py-4 px-6 truncate">
                                Pendente 
                            </td>
                            <td class="py-4 px-6 truncate">
                                {{ formatPrice(exp.value) }}
                            </td>
                            <td class="py-4 px-6 flex justfy-between truncate">
                                <div class="mb-4">
                                    <Link :href="route('expenditure.edit', {id: exp.id})" class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square mt-4" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </Link>
                                </div>

                                <div class="mt-4 ml-2">
                                    <a  @click="destroy(exp.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Create from './Components/Create.vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
 
dayjs.extend(relativeTime);

const props = defineProps(['expenditure', 'due_date'])

const form = useForm();

function destroy(id) {
    if (confirm("Você realmente deseja excluir o item?")) {
        form.delete(route('expenditure.destroy', id));
    }
}

function formatPrice(value) {
    let val = (value/1).toFixed(2).replace('.', ',')
    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
}

</script>