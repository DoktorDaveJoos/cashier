<template>
    <div class="py-8 grid gap-4 grid-cols-2">
        <div class="flex flex-col">
                                <span class="text-sm text-gray-400"
                                >Balance</span
                                >
            <span
                class="text-4xl text-gray-800 font-semibold"
            >{{ balance }}€</span
            >

            <div class="flex mt-4">
                <button
                    class="px-3 py-2 bg-indigo-200 text-indigo-700 text-xs rounded-lg mr-4"
                >
                    Charge or Cashout
                </button>
                <button
                    class="px-3 py-2 bg-indigo-200 text-indigo-700 text-xs rounded-lg"
                >
                    Generate Report
                </button>
            </div>

            <div class="flex flex-col mt-40">
                                    <span class="text-xs text-gray-400"
                                    >Transactions</span
                                    >
                <span class="text-3xl text-gray-800">{{
                        transactionCount
                    }}</span>

                <span class="text-xs text-gray-400 mt-6"
                >Checkouts registered</span
                >
                <span class="text-3xl text-gray-800">{{
                        checkouts.length
                    }}</span>
            </div>
        </div>
        <div class="space-y-4">
            <span class="text-gray-400 text-sm">Most recent transactions</span>
            <transaction-card
                v-for="transaction in transactions.data"
                :transaction="transaction"
                :userId="$page.props.auth.user.id"
                :key="transaction.id"
                size="small"
            ></transaction-card>
        </div>
    </div>
</template>

<script>
import TransactionCard from "@/Components/TransactionCard";
import Layout from '@/Layouts/Festival/Authenticated';

export default {
    layout: Layout,
    components: {
        TransactionCard: TransactionCard
    },
    props: {
        balance: Number,
        transactionCount: Number,
        checkouts: Array,
        products: Array,
        transactions: Object,
    },
}
</script>
