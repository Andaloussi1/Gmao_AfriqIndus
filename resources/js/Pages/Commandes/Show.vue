<template>

    <AppLayout title="commande">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                informations du {{form.titre}} :
            </h2>

        </template>

        <body class="overflow-hidden dark:bg-gray-900">
        <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">


            <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                <div class="border-b border-gray-200 pb-6">
                    <p class="text-sm leading-none text-gray-600 dark:text-gray-300 ">Titre: {{form.titre}}</p>

                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Adresse:</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.adresseLivraison}}</p>
                    </div>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Date Commande:</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.dateCommande}}</p>
                    </div>
                </div>
                <div class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4  ">
                    Details de la Commande :
                </div>
                <div><br>
                    <div class="border-b text-center font-bold text-xl mb-2">
                        <label >
                            Remarque:
                        </label>
                        <p class=" text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7" > {{form.description}}</p>
                    </div>
                    <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Total: {{form.total}}</p>
                    <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Status: {{form.status}}</p>
                    <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">total HTVA: {{form.totalHTVA}}</p>
                    <p class="md:w-96 text-base leading-normal text-gray-600 dark:text-gray-300 mt-4">Date Livraison {{form.dateLivraison}}</p>
                </div>
                <div>
                    <div class="border-t border-b py-4 mt-7 border-gray-200">
                        <div @click="showList" data-menu class="flex justify-between items-center cursor-pointer">
                            <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Autres informations</p>

                        </div>

                    </div>
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
        commande:Object,


    },
    data(){
        return{
            showData:false,
            showData1:false
        }
    },
    setup(props) {
        const form = useForm({
            titre: props.commande.titre,
            description: props.commande.description,
            adresseLivraison: props.commande.adresseLivraison,
            dateCommande: props.commande.dateCommande,
            dateLivraison: props.commande.dateLivraison,
            status: props.commande.status,
            total: props.commande.total,
            totalHTVA: props.commande.totalHTVA

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
