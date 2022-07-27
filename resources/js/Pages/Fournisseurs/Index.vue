<template>
    <AppLayout title="fournisseurs">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                fournisseurs
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
                            <Link :href="route('fournisseurs.edit',fournisseur.id)" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded">Modifier
                            </Link>
                            <button @click="destroy(fournisseur.id)" class="px-4 py-2 bg-red-600 hover:bg-red-900 text-white rounded">Supprimer
                            </button>
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
