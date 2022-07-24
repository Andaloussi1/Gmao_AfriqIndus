<template>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table id="tableComponent" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th v-for="field in fields" :key='field' scope="col" class="py-3 px-6">
                    {{field}}
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in data" :key='item' class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td v-for="field in fields" :key='field' class="py-4 px-6">
                    {{item[field]}}
                </td>
                <td class="py-4 px-6 text-right">
                    <Link :href="'./' + name + '/' + item['id']" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
import {Link} from "@inertiajs/inertia-vue3"
export default {
    name: "TableComponent",
    components: {
        Link,
    },
    props:{
        //
        data:{
            type: Object,
        },
        fields:{
            type: Array,
        },
        name:{
            type: String,
        }
    },
}
</script>

<style scoped>

</style>
