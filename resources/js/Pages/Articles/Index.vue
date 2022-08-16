<script setup >
import {Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";
import {Inertia} from "@inertiajs/inertia";



defineProps(["articles"]);

const destroy=(id)=>{
    if(confirm('Êtes-vous sûr?')){
        Inertia.delete(route('articles.destroy',id))
    }
}


</script>

<template>
    <AppLayout title="Articles">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Articles
        </h2>
        <div class="flex justify-end m-2 p-2">
            <Link href="/articles/create" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Créer
            </Link>
        </div>


        <Table :resource="articles">
            <template #body="{show, columns}">
                <tr
                    v-for="(article, key) in articles.data"
                    :key="key"
                    class="hover:bg-gray-100 focus-within:bg-gray-100 h-24"
                    :class="{'hover:bg-red-100 bg-red-400':
                              article.niveauStock <= 5,
                             'hover:bg-yellow-100 bg-yellow-300':
                              article.niveauStock <= 10 && article.niveauStock > 5}"
                >
                    <td
                        v-for="column in columns"
                        v-show="show(column.key)"
                        :key="column.key"
                        class="border-t"
                    >
                        <template v-if="column.key === 'actions'">
                            <div class="flex">
                                <Link :href="route('articles.edit',article.id)" class="flex rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </Link>
                                <button @click="destroy(article.id)" class="flex rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </template>
                        <Link :href="route('articles.show',article.id)" v-else-if="column.key === 'url'">
                            <div class="relative w-14 h-14">
                                <img :src="article[column.key]" alt="article image" />
                            </div>
                        </Link>
                        <Link v-else="" :href="route('articles.show',article.id)" class="px-6 py-4 flex items-center">
                            {{ article[column.key] }}
                        </Link>
                    </td>
                </tr>

            </template>
        </Table>

    </AppLayout>
</template>

