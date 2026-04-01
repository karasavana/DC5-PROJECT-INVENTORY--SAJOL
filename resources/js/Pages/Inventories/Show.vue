<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    inventory: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <Head title="Inventory Details" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Inventory Details</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-6">
                            <Link :href="route('inventories.index')" class="text-blue-600 hover:text-blue-800">
                                ← Back to Inventories
                            </Link>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Product Information</h3>
                                <p><strong>Product:</strong> {{ inventory.product?.name }}</p>
                                <p><strong>SKU:</strong> {{ inventory.product?.sku }}</p>
                                <p><strong>Price:</strong> ${{ inventory.product?.price }}</p>
                                <p><strong>Supplier:</strong> {{ inventory.product?.supplier?.name }}</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Inventory Information</h3>
                                <p><strong>Quantity:</strong> {{ inventory.quantity }}</p>
                                <p><strong>Location:</strong> {{ inventory.location }}</p>
                                <p><strong>Min Stock:</strong> {{ inventory.min_stock }}</p>
                                <p><strong>Max Stock:</strong> {{ inventory.max_stock }}</p>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h3 class="text-lg font-semibold mb-2">Stock Status</h3>
                            <div v-if="inventory.quantity <= inventory.min_stock" class="p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                <div class="flex items-center">
                                    <span class="text-2xl mr-3">⚠️</span>
                                    <div>
                                        <p class="font-bold">Low Stock Alert</p>
                                        <p>Current quantity ({{ inventory.quantity }}) is at or below minimum stock level ({{ inventory.min_stock }}). Consider restocking soon.</p>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="inventory.quantity >= inventory.max_stock" class="p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded">
                                <div class="flex items-center">
                                    <span class="text-2xl mr-3">📦</span>
                                    <div>
                                        <p class="font-bold">Overstocked</p>
                                        <p>Current quantity ({{ inventory.quantity }}) exceeds maximum stock level ({{ inventory.max_stock }}). Consider reducing stock or holding off on new orders.</p>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                                <div class="flex items-center">
                                    <span class="text-2xl mr-3">✅</span>
                                    <div>
                                        <p class="font-bold">Normal Stock Level</p>
                                        <p>Current quantity ({{ inventory.quantity }}) is within optimal range ({{ inventory.min_stock }} - {{ inventory.max_stock }}).</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h3 class="text-lg font-semibold mb-2">Stock Analysis</h3>
                            <div class="bg-gray-50 p-4 rounded">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                                    <div>
                                        <p class="text-2xl font-bold text-blue-600">{{ inventory.quantity }}</p>
                                        <p class="text-sm text-gray-600">Current Stock</p>
                                    </div>
                                    <div>
                                        <p class="text-2xl font-bold text-green-600">{{ inventory.max_stock - inventory.quantity }}</p>
                                        <p class="text-sm text-gray-600">Space Available</p>
                                    </div>
                                    <div>
                                        <p class="text-2xl font-bold text-orange-600">{{ inventory.quantity - inventory.min_stock }}</p>
                                        <p class="text-sm text-gray-600">Above Minimum</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <Link :href="route('inventories.edit', inventory.id)" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Edit Inventory
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
