<template>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-2">
            <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Drinks</h2>
            <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">

                <li v-for="product in products" v-bind:key="product.id" @click="addProductToOrder(product)"
                    class="col-span-1 flex shadow-sm rounded-md">
                    <div
                        class="flex-shrink-0 flex items-center justify-center w-16 bg-indigo-500 text-white text-sm font-medium rounded-l-md">
                        {{ product.variant }}
                    </div>
                    <div
                        class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                        <div class="flex-1 px-4 py-2 text-sm truncate">
                            <a href="#" class="text-gray-900 font-medium hover:text-gray-600">{{ product.name }}</a>
                            <p class="text-gray-500">{{ product.price }}€</p>
                        </div>
                    </div>
                </li>
            </ul>

        </div>


        <div class="px-4 sm:px-6 py-4 lg:px-8 bg-white shadow-sm rounded-md border border-gray-200 truncate">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Order</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button :disabled="order.length === 0" type="button"
                            @click="showModal()"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto disabled:bg-gray-400">
                        Cash Up!
                    </button>
                </div>
            </div>
            <div class="-mx-4 mt-8 flex flex-col sm:-mx-6 md:mx-0">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col"
                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">
                            Product
                        </th>
                        <th scope="col"
                            class="py-3.5 px-3 text-right text-sm font-semibold text-gray-900 sm:table-cell">
                            Price
                        </th>
                    </tr>
                    </thead>
                    <tbody class="border-b border-gray-200">
                    <tr v-for="product in order">
                        <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                            <div class="font-medium text-gray-900">{{ product.name }} {{ product.variant }}</div>
                        </td>
                        <td class="py-4 px-3 text-right text-sm text-gray-500 sm:table-cell">{{
                                product.price.toFixed(2)
                            }} €
                        </td>
                    </tr>

                    </tbody>
                    <tfoot>

                    <tr>
                        <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                            <div class="font-bold text-gray-900">Total</div>
                        </td>
                        <td class="py-4 px-3 text-right text-sm text-gray-500 sm:table-cell">{{ total }} €</td>

                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>

    <Modal :show="modal">

        <div
            class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-r from-purple-100 via-pink-100 to-red-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
            </svg>
        </div>
        <template v-if="paymentSteps === 'read'">

            <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Reading Customer-ID</h3>
                <div class="mt-2">
                    <p>
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 mt-2 mb-4 rounded-full text-xs font-semibold bg-green-100 text-green-800"> RFID Reader Connected </span>
                    </p>
                    <p class="text-sm text-gray-500">Ask the customer to hold their RFID wristband up to the reader.</p>
                </div>
            </div>

            <form class="mt-5 sm:flex sm:items-center" @submit.prevent="submitId">
                <div class="w-full sm:max-w-xs">
                    <label for="userId" class="sr-only">UserID</label>
                    <input v-model="userId" type="text" name="userId" id="userId"
                           class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                           placeholder="Type in ID of User">
                </div>
                <ActionButton class="ml-3" :is-disabled="loading">Read</ActionButton>
            </form>

            <Alert class="mt-4" v-if="payment?.errors.length > 0" :errors="payment?.errors"></Alert>
        </template>

        <template v-else-if="paymentSteps === 'validate'">
            <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ payment.user.name }}</h3>
                <div class="mt-2">
                    <p>
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 mt-2 mb-4 rounded-full text-xs font-semibold bg-green-100 text-green-800"> Funds are sufficient </span>
                    </p>
                    <p class="text-sm text-gray-500">Please verify the identity of the customer.</p>
                </div>
            </div>

            <button
                @click="processPayment"
                class="flex w-full justify-center px-3 py-2 bg-indigo-200 text-indigo-700 rounded-lg mr-4 mt-4"
            >
                Process Payment
            </button>

        </template>

        <template v-else-if="paymentSteps === 'finished'">
            <h1> Finished </h1>
        </template>

        <template v-else>
            <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Something went wrong</h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Sorry for the inconvenience.</p>
                </div>
            </div>

            <button
                @click="reload()"
                class="flex w-full justify-center px-3 py-2 bg-indigo-200 text-indigo-700 rounded-lg mr-4 mt-4"
            >
                Reload
            </button>
        </template>

    </Modal>

</template>

<script>
import {Inertia} from '@inertiajs/inertia';
import Layout from '@/Layouts/Checkout/Authenticated';
import Modal from '@/Components/Modal';
import Alert from '@/Components/Alert';
import ActionButton from "@/Components/ActionButton";

export default {
    layout: Layout,
    components: {
        Modal: Modal,
        Alert: Alert,
        ActionButton: ActionButton
    },

    data() {
        return {
            modal: false,
            // TODO Remove
            userId: null,
            order: [],
            paymentSteps: 'read',
            loading: false,
        }
    },

    props: {
        uuid: String,
        products: Array,
        payment: {
            type: Object,
            default: {
                user: null,
                errors: []
            }
        }
    },

    methods: {
        addProductToOrder(product) {
            this.order.push(product);
        },
        showModal() {
            this.modal = true;
        },

        submitId() {
            const url = new URL(route('checkout.index', this.uuid));
            url.searchParams.append('user', this.userId);

            Inertia.visit(url,
                {
                    only: ['payment'],
                    onStart: () => this.loading = true,
                    onFinish: () => this.prepareNextStep(),
                    preserveState: true,
                }
            );
        },
        processPayment() {

            const transaction = {
                userId: this.userId,
                amount: this.total,
                description: 'Some drinks'
            };

            Inertia.post(route('checkout.store', this.uuid), transaction, {
                onFinish: () => this.prepareNextStep()
            });
        },

        prepareNextStep() {
            this.loading = false;

            if (this.paymentSteps === 'read') {
                this.paymentSteps = 'validate';
                return;
            }

            if (this.paymentSteps === 'validate') {
                this.paymentSteps = 'finished';
                setTimeout(() => {
                    this.reload();
                }, 1000);
            }

        },

        reload() {
            Inertia.visit(route('checkout.index', this.uuid));
        }
    },

    computed: {
        total() {
            return this.order.reduce((p, c) => p += c.price, 0).toFixed(2);
        }
    }
}
</script>
