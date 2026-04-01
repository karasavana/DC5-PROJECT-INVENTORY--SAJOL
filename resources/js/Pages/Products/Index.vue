<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    products: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between mb-6">
                            <h1 class="text-2xl font-bold">Products</h1>
                            <Link :href="route('products.create')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Add Product
                            </Link>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Supplier</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="product in products" :key="product.id">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ product.name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ product.sku }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₱{{ product.price }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ product.supplier?.name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ product.inventory?.quantity || 0 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <Link :href="route('products.show', product.id)" class="text-indigo-600 hover:text-indigo-900 mr-3">View</Link>
                                            <Link :href="route('products.edit', product.id)" class="text-blue-600 hover:text-blue-900 mr-3">Edit</Link>
                                            <Link :href="route('products.destroy', product.id)" method="delete" class="text-red-600 hover:text-red-900">Delete</Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
