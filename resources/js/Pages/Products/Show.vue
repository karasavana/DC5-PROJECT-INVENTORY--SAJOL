<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    product: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <Head title="Product Details" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product Details</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-6">
                            <Link :href="route('products.index')" class="text-blue-600 hover:text-blue-800">
                                ← Back to Products
                            </Link>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Product Information</h3>
                                <p><strong>Brand:</strong> {{ product.brand }}</p>
                                <p><strong>Model:</strong> {{ product.model }}</p>
                                <p><strong>Name:</strong> {{ product.name }}</p>
                                <p><strong>SKU:</strong> {{ product.sku }}</p>
                                <p><strong>Price:</strong> ₱{{ product.price }}</p>
                                <p><strong>Description:</strong> {{ product.description }}</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Supplier Information</h3>
                                <p><strong>Supplier:</strong> {{ product.supplier?.name }}</p>
                                <p><strong>Contact:</strong> {{ product.supplier?.contact_person }}</p>
                                <p><strong>Email:</strong> {{ product.supplier?.email }}</p>
                                <p><strong>Phone:</strong> {{ product.supplier?.phone }}</p>
                            </div>
                        </div>

                        <div v-if="product.inventory" class="mb-8">
                            <h3 class="text-lg font-semibold mb-2">Inventory Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-gray-50 p-4 rounded">
                                    <p><strong>Quantity:</strong> {{ product.inventory.quantity }}</p>
                                    <p><strong>Location:</strong> {{ product.inventory.location }}</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded">
                                    <p><strong>Min Stock:</strong> {{ product.inventory.min_stock }}</p>
                                    <p><strong>Max Stock:</strong> {{ product.inventory.max_stock }}</p>
                                </div>
                            </div>
                            <div v-if="product.inventory.quantity <= product.inventory.min_stock" class="mt-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                                ⚠️ Low stock alert! Current quantity is at or below minimum stock level.
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <Link :href="route('products.edit', product.id)" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Edit Product
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
