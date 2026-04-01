<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    suppliers: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <Head title="Suppliers" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Suppliers</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between mb-6">
                            <h1 class="text-2xl font-bold">Suppliers</h1>
                            <Link :href="route('suppliers.create')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Add Supplier
                            </Link>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Person</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Products</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="supplier in suppliers" :key="supplier.id">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ supplier.name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ supplier.email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ supplier.phone }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ supplier.contact_person }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ supplier.products?.length || 0 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <Link :href="route('suppliers.show', supplier.id)" class="text-indigo-600 hover:text-indigo-900 mr-3">View</Link>
                                            <Link :href="route('suppliers.edit', supplier.id)" class="text-blue-600 hover:text-blue-900 mr-3">Edit</Link>
                                            <Link :href="route('suppliers.destroy', supplier.id)" method="delete" class="text-red-600 hover:text-red-900">Delete</Link>
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
