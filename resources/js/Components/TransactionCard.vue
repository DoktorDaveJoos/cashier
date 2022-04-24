<script setup>
const props = defineProps({
    transaction: Object,
    userId: Number,
});

const { transaction, userId } = props;

const isReceiver = transaction.to_id === userId;

const infoName = isReceiver ? transaction.from.name : transaction.to.name;

const initials = () => {
    const split = infoName.split(" ", 2);
    return split.reduce((p, c) => p + c.charAt(0).toUpperCase(), '');
}
</script>

<template>
    <div class="bg-gray-100 flex rounded-lg px-8 py-4 rounded-lg">
        <div
            class="bg-gray-400 flex items-center justify-center rounded-full w-12 h-12 mr-8 text-gray-900"
        >
            {{ initials() }}
        </div>
        <div class="flex flex-col justify-center">
            <span class="text-xs text-gray-700">{{ infoName }}</span>
            <span class="text-gray-800">{{ transaction.description }}</span>
        </div>
        <div
            :class="[
                {
                    'text-green-600 font-semibold': isReceiver,
                },
                'grow flex justify-end items-center text-xl',
            ]"
        >
            <div class="flex items-baseline">
                <span class="text-sm" v-if="isReceiver">+</span>
                <span class="text-sm" v-else>-</span>
                {{ transaction.amount.toFixed(2) }}
                <span class="text-sm">€</span>
            </div>
        </div>
    </div>
</template>
