<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    supplier: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <Head title="Supplier Details" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Supplier Details</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-6">
                            <Link :href="route('suppliers.index')" class="text-blue-600 hover:text-blue-800">
                                ← Back to Suppliers
                            </Link>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Company Information</h3>
                                <p><strong>Name:</strong> {{ supplier.name }}</p>
                                <p><strong>Email:</strong> {{ supplier.email }}</p>
                                <p><strong>Phone:</strong> {{ supplier.phone }}</p>
                                <p><strong>Address:</strong> {{ supplier.address }}</p>
                                <p><strong>Contact Person:</strong> {{ supplier.contact_person }}</p>
                            </div>
                        </div>

                        <div class="flex justify-end mb-6">
                            <Link :href="route('suppliers.edit', supplier.id)" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mr-3">
                                Edit Supplier
                            </Link>
                        </div>

                        <div v-if="supplier.products && supplier.products.length > 0">
                            <h3 class="text-lg font-semibold mb-4">Products</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="product in supplier.products" :key="product.id">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ product.name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ product.sku }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ product.price }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ product.inventory?.quantity || 0 }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div v-else>
                            <p class="text-gray-500">No products found for this supplier.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
