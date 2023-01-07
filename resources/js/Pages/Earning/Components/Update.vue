<template>
    <AuthenticatedLayout>
        <form @submit.prevent="submit">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 row">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="grid md:grid-cols-4 md:gap-6 p-6">
                            <div class="relative z-0 mb-2 w-full group">
                                <input v-model="form.name" type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                            </div>

                            <div class="relative z-0 mb-2 w-full group">
                                <input v-model="form.type" type="text" name="floating_company" id="floating_company" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_company" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type</label>
                            </div>

                            <div class="relative z-0 mb-2 w-full group">
                                <input v-model="form.value" step="any" type="number" name="floating_company" id="floating_company" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_company" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Value</label>
                            </div>

                            <div class="relative z-0 mb-2 mt-2 w-full text-center group">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    atualizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps(['earning']);

const form = useForm({
    name: props.earning.name,
    type: props.earning.type,
    value: props.earning.value,
});

const submit = () => {
    form.put(route('earning.update', props.earning.id),{ 
        onSuccess: () => form.reset 
    });
};

</script>