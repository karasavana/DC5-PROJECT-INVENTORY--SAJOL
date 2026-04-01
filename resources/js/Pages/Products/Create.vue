<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    suppliers: {
        type: Array,
        required: true
    }
});

const form = useForm({
    name: '',
    description: '',
    price: '',
    sku: '',
    supplier_id: ''
});

const submit = () => {
    form.post(route('products.store'));
};
</script>

<template>
    <Head title="Create Product" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Product</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Name</label>
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    />
                                    <div v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">SKU</label>
                                    <input
                                        v-model="form.sku"
                                        type="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    />
                                    <div v-if="form.errors.sku" class="text-red-500 text-sm mt-1">{{ form.errors.sku }}</div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Price</label>
                                    <input
                                        v-model="form.price"
                                        type="number"
                                        step="0.01"
                                        min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    />
                                    <div v-if="form.errors.price" class="text-red-500 text-sm mt-1">{{ form.errors.price }}</div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Supplier</label>
                                    <select
                                        v-model="form.supplier_id"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    >
                                        <option value="">Select a supplier</option>
                                        <option v-for="supplier in suppliers" :key="supplier.id" :value="supplier.id">
                                            {{ supplier.name }}
                                        </option>
                                    </select>
                                    <div v-if="form.errors.supplier_id" class="text-red-500 text-sm mt-1">{{ form.errors.supplier_id }}</div>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea
                                        v-model="form.description"
                                        rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    ></textarea>
                                    <div v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</div>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <Link :href="route('products.index')" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 mr-3">
                                    Cancel
                                </Link>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" :disabled="form.processing">
                                    Create Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
