<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeCheckbox from '@/Components/Checkbox.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import {toRefs} from "@vue/reactivity";

const props = defineProps({
    status: String,
    accessor: String,
    name: String
});

const { accessor } = toRefs(props);

const form = useForm({
    password: ''
});


const submit = () => {
    form.post(`/checkouts/${props.accessor}/login`, {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Log in" />

        <BreezeValidationErrors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>


        <form @submit.prevent="submit">
        <div>Checkout to {{ accessor }}</div>
            <div class="mt-4">
                <BreezeLabel for="password" value="PIN" />
                <BreezeInput id="password" type="password" class="mt-1 p-2 block w-full" v-model="form.password" required autofocus/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
