<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div class="rounded-md bg-red-50 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <XCircleIcon class="h-5 w-5 text-red-400" aria-hidden="true" />
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">There were {{ errors.length }} errors with your
                    submission</h3>
                <div class="mt-2 text-sm text-red-700">
                    <ul role="list" class="list-disc pl-5 space-y-1">
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {XCircleIcon} from '@heroicons/vue/solid'

export default {
    components: {
        XCircleIcon,
    },

    props: {
        errors: Array
    }
}
</script>
