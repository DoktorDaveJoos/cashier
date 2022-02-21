<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';
import {toRefs} from "@vue/reactivity";

const props = defineProps({
    credit: Number,
    checkouts: [],
    products: []
});

const { festival_id } = toRefs(props);

const form = useForm({
    user_id: festival_id,
    password: ''
});


const submit = () => {

    // const id = props.festival_id;
    //
    // form.post(`/checkouts/${id}/login`, {
    //     onFinish: () => form.reset('password'),
    // });
};


</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>Deine Kohlen:</div>
                        <div class="mb-4">{{ credit }}</div>

                        <div>Checkouts:</div>
                        <div v-for="checkout in checkouts">
                            localhost/checkouts/{{ checkout.accessor }}/checkout - pin: {{ checkout.plain }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
