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
            <template #body="{show, columns}">
                <tr
                    v-for="(commande, key) in commandes.data"
                    :key="key"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td
                        v-for="column in columns"
                        v-show="show(column.key)"
                        :key="column.key"
                        class="border-t"
                    >
                        <template v-if="column.key === 'actions'">
                            <Link :href="route('commandes.edit',commande.id)" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded">Modifier
                            </Link>
                            <button @click="destroy(commande.id)" class="px-4 py-2 bg-red-600 hover:bg-red-900 text-white rounded">Supprimer
                            </button>
                        </template>
                        <Link v-else="" :href="route('commandes.show',commande.id)" class="px-6 py-4 flex items-center">
                            {{ commande[column.key] }}
                        </Link>
                    </td>
                </tr>
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
