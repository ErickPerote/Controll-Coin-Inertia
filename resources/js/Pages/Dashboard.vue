<template>
    <AuthenticatedLayout>

        <Head title="Dashboard" />

        <div class="h-full">
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-0">
                <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xxl:col-span-8 px-6 py-4">
                    <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-4 xxl:col-span-4 px-6 py-4">
                        <!-- Start profile Card -->
                        <div class="rounded-xl p-4 shadow-xl" :class="{ 'bg-red-300': loss, 'bg-green-400' : !loss }" >
                            <div class="flex flex-col justify-center items-center">
                                <div class="relative rounded-lg shadow-xl w-full bg-cover bg-center h-64">
                                    <div class="absolute inset-0 bg-gray-800 bg-opacity-20"></div>
                                    <div
                                        class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center justify-center">
                                        <div>
                                            <h3 class="text-center text-white text-3xl">
                                                Saldo Total 
                                            </h3>
                                            <h3 class="text-center text-white text-7xl mt-8 font-bold">
                                                R$ {{ formatPrice(SumValues) }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End profile Card -->
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="col-span-12 sm:col-span-12 md:col-span-3 lg:col-span-3 xxl:col-span-3">
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-12 sm:col-span-12 md:col-span-3 lg:col-span-3 xxl:col-span-3">
                                    <!-- Start Card List -->
                                    <div @click="routeEarning()" class="relative w-full h-28 bg-white bg-center group rounded-lg overflow-hidden mt-4 shadow-lg transition duration-300 ease-in-out">
                                        <div class="absolute inset-0 transition duration-300 ease-in-out"></div>
                                        <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
                                            <div>
                                                <div class="text-green-400  text-lg flex space-x-2 items-center">
                                                    <div class="rounded-md p-2 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                            fill="currentColor" class="bi bi-arrow-up-circle"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
                                                        </svg>
                                                    </div>
                                                    <p class="text-green-400 ">Total Ganhos</p>
                                                </div>
                                                <h3 class="text-green-400 text-3xl mt-4 mb-1 font-bold">
                                                   R$ {{ formatPrice(earningTotal) }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Card List -->
                                </div>
                                <div class="col-span-12 sm:col-span-12 md:col-span-3 lg:col-span-3 xxl:col-span-3">
                                    <!-- Start Card List -->
                                    <div @click="routeExpenditure()" class="relative w-full h-28 bg-white bg-center group rounded-lg overflow-hidden mt-4 shadow-lg transition duration-300 ease-in-out">
                                        <div class="absolute inset-0 transition duration-300 ease-in-out"></div>
                                        <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
                                            <div>
                                                <div class="text-red-400 text-lg flex space-x-2 items-center">
                                                    <div class="rounded-md p-2 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                            fill="currentColor" class="bi bi-arrow-down-circle"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                                                        </svg>
                                                    </div>
                                                    <p class="text-red-400">Despesas pagas</p>
                                                </div>
                                                <h3 class="text-red-400 ml-4 text-3xl mt-4 mb-1 font-bold">
                                                   R$ {{ formatPrice(expenditurePayed) }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Card List -->
                                </div>
                                <div class="col-span-12 sm:col-span-12 md:col-span-3 lg:col-span-3 xxl:col-span-3">
                                    <!-- Start Card List -->
                                    <div @click="routeExpenditure()"
                                        class="relative w-full h-28 bg-white bg-center group rounded-lg overflow-hidden mt-4 shadow-lg transition duration-300 ease-in-out">
                                        <div class="absolute inset-0 transition duration-300 ease-in-out"></div>
                                        <div class="relative w-3/4 h-full px-4 sm:px-6 lg:px-4 flex items-center">
                                            <div>
                                                <div class="text-red-400 text-lg flex space-x-2 items-center">
                                                    <div class="rounded-md p-2 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                            fill="currentColor" class="bi bi-arrow-down-circle"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                                                        </svg>
                                                    </div>
                                                    <p class="text-red-400">Valor Despesas</p>
                                                </div>
                                                <h3 class="text-red-400 text-3xl mt-4 mb-1 font-bold">
                                                    R$ {{ formatPrice(expenditureTotal) }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Card List -->
                                </div>
                                <div class="col-span-12 sm:col-span-12 md:col-span-3 lg:col-span-3 xxl:col-span-3">
                                    <!-- Start Card List -->
                                    <div @click="routeExpenditure()"
                                        class="relative w-full h-28 bg-white bg-center group rounded-lg overflow-hidden mt-4 shadow-lg transition duration-300 ease-in-out">
                                        <div class="absolute inset-0 transition duration-300 ease-in-out"></div>
                                        <div class="relative w-3/4 h-full px-4 sm:px-6 lg:px-4 flex items-center">
                                            <div>
                                                <div class="text-red-400 text-lg flex space-x-2 items-center">
                                                    <div class="rounded-md p-2 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                            fill="currentColor" class="bi bi-arrow-down-circle"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                                                        </svg>
                                                    </div>
                                                    <p class="text-red-400">Simulação</p>
                                                </div>
                                                <h3 class="text-red-400 ml-4 text-3xl mt-4 mb-1 font-bold">
                                                    R${{ formatPrice(Simulate) }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Card List -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <TableDueDate :data="due_date" class="mt-24"></TableDueDate>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head } from '@inertiajs/inertia-vue3';
import { ref,onMounted } from 'vue'
import TableDueDate from './ComponentsPage/TableDueDate.vue';

const props = defineProps([
    'SumValues',
    'Simulate',
    'expenditureTotal',
    'earningTotal',
    'expenditureCountPayed',
    'expenditurePayed',
    'due_date',
])

function formatPrice(value) {
    let val = (value / 1).toFixed(2).replace('.', ',')
    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
}

function routeExpenditure() {
    Inertia.get('/expenditure')
}

function routeEarning() {
    Inertia.get('/earning')
}

const loss = props.expenditurePayed > props.earningTotal;

</script>