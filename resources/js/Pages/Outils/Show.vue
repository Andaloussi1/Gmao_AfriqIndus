<template>

    <AppLayout title=" commande">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                informations du {{form.nom}} 
            </h2>

        </template>

        <body class="overflow-hidden dark:bg-gray-900">
        <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
            <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                <div class="border-b border-gray-200 pb-6">
                    <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2"> Nom: {{form.nom}}</h1>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Reference </p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.reference}}</p>
                    </div>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Marque :  </p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.marque}}</p>
                    </div>
                </div>
                <div class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4  ">
                    Details du commande :
                </div>
                <div><br>
                    <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Type : {{form.type}}</p>
                    <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Stock : {{form.stock}}</p>
                </div>

            </div>
        </div>
        </body>


    </AppLayout>
</template>
<script>
import {reactive} from 'vue'
import {Inertia} from '@inertiajs/inertia'
import {useForm, Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
export default {
    props:{
        outil:Object,
    },
    data(){
        return{
            showData:false,
            showData1:false
        }
    },
    setup(props) {
        const form = useForm({
            nom: props.outil.nom,
            reference: props.outil.reference,
            marque: props.outil.marque,
            type: props.outil.type,
            stock: props.outil.stock,
        });
        return {form};
    },
    methods:{
        showList(){
            if(this.showData===false){
                this.showData=true
            } else{
                this.showData=false
            }
        },
        showList1(){
            if(this.showData1===false){
                this.showData1=true
            } else{
                this.showData1=false
            }
        },
    },
    components: {Link, AppLayout},
}
</script>
