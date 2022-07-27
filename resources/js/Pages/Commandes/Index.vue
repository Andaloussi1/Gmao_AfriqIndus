<template>
    <AppLayout title="Commandes">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Commandes
        </h2>
        <div class="flex justify-end m-2 p-2">
            <Link href="/commandes/create" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Créer
            </Link>
        </div>

        <Table :resource="commandes">
            <template #cell(actions)="{ item: commande}">
                <Link :href="route('commandes.edit',commande.id)" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded">Modifier
                </Link>
                <button @click="destroy(commande.id)" class=" focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Supprimer
                </button>
                <Link :href="route('commandes.show',commande.id)" type="button" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Icon description</span>
                </Link>
            </template>
        </Table>

    </AppLayout>
</template>
<script setup>
import {Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";
import {Inertia} from "@inertiajs/inertia";

defineProps(["commandes"]);

const destroy=(id)=>{
    if(confirm('Êtes-vous sûr?')){
        Inertia.delete(route('commandes.destroy',id))
    }
}


</script>
