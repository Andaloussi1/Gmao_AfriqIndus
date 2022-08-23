<template>
    <AppLayout title="fournisseurs">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Fournisseurs
            </h2>
            <div class="flex justify-end m-2 p-2">
                <Link href="/fournisseurs/create" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Créer
                </Link>
            </div>
        </template>

        <Table :resource="fournisseurs">
            <template #body="{show, columns}">
                <tr
                    v-for="(fournisseur, key) in fournisseurs.data"
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
                            <div class="flex">
                                <Link :href="route('fournisseurs.edit',fournisseur.id)" class="flex rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </Link>
                                <button @click="destroy(fournisseur.id)" class="flex rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </template>
                        <Link v-else="" :href="route('fournisseurs.show',fournisseur.id)" class="px-6 py-4 flex items-center">
                            {{ fournisseur[column.key] }}
                        </Link>
                    </td>
                </tr>
            </template>
        </Table>

    </AppLayout>
</template>
<script>
import {Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";
import {Inertia} from "@inertiajs/inertia";
export default{
    props:['fournisseurs'],

    components:{ Link, AppLayout ,Table },
    setup(){
        const destroy=(id)=>{
            if(confirm('Êtes-vous sûr?')){
                Inertia.delete(route('fournisseurs.destroy',id))
            }
        }
        return { destroy }
    }
}
</script>
