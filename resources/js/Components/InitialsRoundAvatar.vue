<script setup>
const props = defineProps({
    name: String,
    size: {
        type: String,
        default: '12'
    },
});

const { name } = props;

const initials = () => {
    return name.split(" ").reduce((p, c) => p + c.charAt(0).toUpperCase(), "");
};

</script>

<template>
    <div
        class="bg-gray-400 flex items-center justify-center rounded-full text-gray-900"
        :class="`w-${size} h-${size} ${ size === '12' ? null : 'text-xs'  }`"
    >
        {{ initials() }}
    </div>
</template>
