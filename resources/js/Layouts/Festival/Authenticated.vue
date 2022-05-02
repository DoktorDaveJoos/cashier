<script setup>
import BreezeDropdown from '@/Components/Dropdown.vue';
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import InitialsRoundAvatar from "@/Components/InitialsRoundAvatar";
import {Link} from '@inertiajs/inertia-vue3';</script>

<template>
    <div>
        <!-- TODO: Fix mobile(!) Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div
            class="fixed inset-0 flex z-40 md:hidden"
            role="dialog"
            aria-modal="true"
        >
            <div
                class="fixed inset-0 bg-gray-600 bg-opacity-75"
                aria-hidden="true"
            ></div>

            <div
                class="relative flex-1 flex flex-col max-w-xs w-full bg-indigo-700"
            >
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button
                        type="button"
                        class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    >
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg
                            class="h-6 w-6 text-white"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>

                <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                    <div class="flex-shrink-0 flex items-center px-4">
                        <!-- TODO -->
                    </div>
                    <nav class="mt-5 px-2 space-y-1">
                        <!-- Current: "bg-indigo-800 text-white", Default: "text-white hover:bg-indigo-600 hover:bg-opacity-75" -->
                        <a
                            href="#"
                            class="bg-indigo-800 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md"
                        >
                            <!-- Heroicon name: outline/home -->
                            <svg
                                class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                />
                            </svg>
                            Dashboard
                        </a>
                    </nav>
                </div>
                <div class="flex-shrink-0 flex border-t border-indigo-800 p-4">
                    <a href="#" class="flex-shrink-0 group block">
                        <div class="flex items-center">
                            <initials-round-avatar
                                :name="$page.props.auth.user.name"
                            ></initials-round-avatar>
                            <div class="ml-3">
                                <p class="text-base font-medium">
                                    {{ $page.props.auth.user.name }}
                                </p>
                                <p class="text-sm font-medium text-indigo-400">
                                    {{ $page.props.auth.user.email }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Force sidebar to shrink to fit close icon -->
            </div>
        </div>

        <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
            <div class="flex-1 flex flex-col min-h-0 bg-white">
                <div class="flex-1 flex flex-col py-6 overflow-y-auto">
                    <div
                        class="flex items-center justify-center flex-shrink-0 px-4 mb-8"
                    >
                        <span
                            class="text-lg font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"
                        >CASHIER</span
                        >
                    </div>
                    <nav class="mt-5 flex-1 px-4 space-y-2">
                        <Link href="/dashboard"
                              class="bg-gray-200 text-gray-500 text-sm font-semibold group flex items-center px-2 py-2 rounded-md hover:bg-gray-400 hover:text-white transition ease-in-out duration-150">
                            <svg
                                class="mr-3 ml-2 flex-shrink-0 h-4 w-4 text-gray-500 group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                />
                            </svg>
                            Dashboard
                        </Link>
                        <Link href="/checkouts"
                              class="bg-gray-200 text-gray-500 text-sm font-semibold group flex items-center px-2 py-2 rounded-md hover:bg-gray-400 hover:text-white transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="mr-3 ml-2 flex-shrink-0 h-4 w-4 text-gray-500 group-hover:text-white"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Checkouts
                        </Link>
                        <Link href="/products"
                              class="bg-gray-200 text-gray-500 text-sm font-semibold group flex items-center px-2 py-2 rounded-md hover:bg-gray-400 hover:text-white transition ease-in-out duration-150">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="mr-3 ml-2 flex-shrink-0 h-4 w-4 text-gray-500 group-hover:text-white"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Products
                        </Link>
                    </nav>
                </div>
                <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                    <a href="#" class="flex-shrink-0 w-full group block">
                        <div class="flex items-center">
                            <initials-round-avatar
                                :name="$page.props.auth.user.name"
                            ></initials-round-avatar>
                            <BreezeDropdown align="top" width="48">
                                <template #trigger>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium">
                                            {{ $page.props.auth.user.name }}
                                        </p>
                                        <p class="text-xs font-medium text-indigo-400">
                                            {{ $page.props.auth.user.email }}
                                        </p>
                                    </div>
                                </template>
                                <template #content>
                                    <BreezeDropdownLink :href="route('logout')" method="post" as="button">
                                        Log Out
                                    </BreezeDropdownLink>
                                </template>
                            </BreezeDropdown>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="md:pl-64 flex flex-col flex-1">
            <div
                class="sticky top-0 z-10 md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 bg-gray-100"
            >
                <button
                    type="button"
                    class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                >
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg
                        class="h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>
            </div>

            <main class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900">
                            Dashboard
                        </h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <slot />
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>
