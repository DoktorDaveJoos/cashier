<template>
    <div class="py-8">
        <div class="flex flex-col">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <p class="mt-2 text-sm text-gray-700">All your products that be offered.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <button type="button"
                                class="px-3 py-2 bg-indigo-200 text-indigo-700 text-xs rounded-lg mr-4">
                            Add Product
                        </button>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Size
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Unit
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Price
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="product in products">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ product.name }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ product.variant}}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ product.variant }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ product.price }}
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                class="sr-only">, {{ product.name }}</span></a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from '@/Layouts/Festival/Authenticated';

export default {
    layout: Layout,
    props: {
        products: Array,
    },
}
</script>
