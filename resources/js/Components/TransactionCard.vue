<script setup>
import InitialsRoundAvatar from '@/Components/InitialsRoundAvatar';

const props = defineProps({
    transaction: Object,
    userId: Number,
    size: {
        type: String,
        default: 'medium'
    }
});

const { transaction, userId, size } = props;

const isReceiver = transaction.to_id === userId;

const isMedium = size === 'medium';

</script>

<template>
    <div class="bg-gray-100 flex rounded-lg px-8 py-4 rounded-lg">
        <initials-round-avatar class="mr-8" :name="$page.props.auth.user.name" :size="isMedium ? '12' : '8'"></initials-round-avatar>
        <div class="flex flex-col justify-center">
            <span class="text-xs text-gray-700">{{  isReceiver ? transaction.from.name : transaction.to.name }}</span>
            <span class="text-gray-800" :class="isMedium ? null : 'text-xs font-semibold'">{{ transaction.description }}</span>
        </div>
        <div
            :class="[
                {
                    'text-green-600 font-semibold': isReceiver,
                    'text-xl': isMedium
                },
                'grow flex justify-end items-center',
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
