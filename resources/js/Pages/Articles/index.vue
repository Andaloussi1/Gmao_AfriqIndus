<script setup>

import { Link } from '@inertiajs/inertia-vue3'

import AppLayout from '@/Layouts/AppLayout.vue';
import {Head} from "@inertiajs/inertia-vue3";


defineProps({
        article:Object,

})


</script>



<template>
    <AppLayout title="Articles">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Articles
            </h2>
            <div class="flex justify-end m-2 p-2">
                <Link href="/article/create" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Créer
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-center">
                                        <thead class="border-b bg-gray-800">
                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                #
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                Nom
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                Marque
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                Prix d'achat
                                            </th>

                                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                Prix de vente
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">

                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="a in article" class="bg-white border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ a.id }}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ a.nom }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ a.marque }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ a.prixAchat }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ a.prixVente }}
                                            </td>

                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <Link href="/article/edit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Modifier
                                                </Link>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
