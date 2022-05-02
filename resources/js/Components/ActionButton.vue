<template>

    <button
        class="flex justify-center px-3 py-2 rounded-md"
        :class="isDisabled ? 'bg-gray-200 text-gray-700 cursor-not-allowed'
            : 'bg-indigo-200 text-indigo-700 hover:bg-indigo-700 hover:text-white transition ease-in-out duration-150'">
        <slot />
    </button>

</template>

<script>
export default {
    name: "ActionButton",

    props: {
        isDisabled: Boolean
    }
}
</script>

