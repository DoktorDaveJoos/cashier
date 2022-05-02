<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Customer/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import TransactionCard from "@/Components/TransactionCard";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    balance: Number,
    transactions: Object,
});

const fakeFund = () => {
    Inertia.post(route("fake"), null, {
        preserveState: true,
    });
};
</script>

<template>
    <Head title="Dashboard"></Head>

    <BreezeAuthenticatedLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col justify-between h-16">
                <div class="flex justify-between">
                    <span class="text-3xl text-gray-800 mt-10"
                        >Welcome {{ $page.props.auth.user.name }}!</span
                    >
                    <button
                        @click="fakeFund()"
                        class="self-start mt-8 mb-4 px-3 py-2 bg-indigo-500 rounded-md text-sm uppercase text-white hover:bg-indigo-700 transition-colors ease-in-out duration-150"
                    >
                        Fund your account
                    </button>
                </div>

                <div class="self-center flex flex-col my-10">
                    <span class="text-gray-400 text-lg uppercase font-light"
                        >Balance</span
                    >
                    <span class="text-gray-800 text-6xl"
                        >{{ balance.toFixed(2) }}
                        <span class="text-lg">€</span>
                    </span>
                </div>

                <span class="text-3xl text-gray-800">Transactions</span>

                <div class="space-y-4 py-8">
                    <transaction-card
                        v-for="transaction in transactions.data"
                        :transaction="transaction"
                        :userId="$page.props.auth.user.id"
                        :key="transaction.id"
                    ></transaction-card>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
