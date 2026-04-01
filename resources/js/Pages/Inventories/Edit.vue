<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    inventory: {
        type: Object,
        required: true
    },
    products: {
        type: Array,
        required: true
    }
});

const form = useForm({
    quantity: props.inventory.quantity,
    location: props.inventory.location,
    min_stock: props.inventory.min_stock,
    max_stock: props.inventory.max_stock,
    product_id: props.inventory.product_id
});

const submit = () => {
    form.put(route('inventories.update', props.inventory.id));
};
</script>

<template>
    <Head title="Edit Inventory" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Inventory</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Product</label>
                                    <select
                                        v-model="form.product_id"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    >
                                        <option value="">Select a product</option>
                                        <option v-for="product in products" :key="product.id" :value="product.id">
                                            {{ product.name }} ({{ product.sku }})
                                        </option>
                                    </select>
                                    <div v-if="form.errors.product_id" class="text-red-500 text-sm mt-1">{{ form.errors.product_id }}</div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Location</label>
                                    <input
                                        v-model="form.location"
                                        type="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    />
                                    <div v-if="form.errors.location" class="text-red-500 text-sm mt-1">{{ form.errors.location }}</div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Quantity</label>
                                    <input
                                        v-model="form.quantity"
                                        type="number"
                                        min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    />
                                    <div v-if="form.errors.quantity" class="text-red-500 text-sm mt-1">{{ form.errors.quantity }}</div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Min Stock</label>
                                    <input
                                        v-model="form.min_stock"
                                        type="number"
                                        min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    />
                                    <div v-if="form.errors.min_stock" class="text-red-500 text-sm mt-1">{{ form.errors.min_stock }}</div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Max Stock</label>
                                    <input
                                        v-model="form.max_stock"
                                        type="number"
                                        min="0"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        required
                                    />
                                    <div v-if="form.errors.max_stock" class="text-red-500 text-sm mt-1">{{ form.errors.max_stock }}</div>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <Link :href="route('inventories.index')" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 mr-3">
                                    Cancel
                                </Link>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" :disabled="form.processing">
                                    Update Inventory
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
