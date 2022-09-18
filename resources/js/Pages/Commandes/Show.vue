<template>

    <AppLayout title=" commande">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                informations du {{form.titre}}
            </h2>

        </template>

        <body class="overflow-hidden dark:bg-gray-900">
        <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
            <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                <div class="border-b border-gray-200 pb-6">
                    <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2">Titre : {{form.titre}}</h1>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Description : </p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.description}}</p>
                    </div>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Adresse Livraison : </p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.adresseLivraison}}</p>
                    </div>
                </div>
                <div class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4  ">
                    Details du commande :
                </div>
                <div><br>
                    <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Date Commande : {{form.dateCommande}}</p>
                    <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Date Livrasion : {{form.dateLivraison}}</p>
                    <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Status : {{form.status}}</p>
                    <br>
                    <div class="bg-slate-400">
                        <table class="border-collapse table-auto w-full text-sm">
                            <thead>
                                <tr>
                                    <th class="border-b border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-50 text-left">Article</th>
                                    <th class="border-b border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-50 text-left">Prix</th>
                                    <th class="border-b border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-50  text-left">Quantité</th>
                                </tr>
                            </thead>

                            <tbody class="bg-slate-800">
                                <tr v-for="article in ligneCommande">
                                    <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{article.nom}}</td>
                                    <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{article.prix}}</td>
                                    <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{article.quantite}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="md:w-96 text-base leading-normal text-gray-600 dark:text-gray-300 mt-4">Total : {{calculateTotal().totalTVA}}</p>
                    <p class="md:w-96 text-base leading-normal text-gray-600 dark:text-gray-300 mt-4">Total HTVA : {{calculateTotal().totalHTVA}}</p>
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
        ligneCommande:Object,
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
            totalHTVA: props.commande.totalHTVA,
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
        calculateTotal() {
            let total = {
                totalHTVA: 0,
                totalTVA: 0,
            };

            this.$props.ligneCommande.forEach((article) => {
                var prixLigne = article.prix * article.quantite;
                total.totalHTVA += prixLigne;
                total.totalTVA += prixLigne + prixLigne * article.tauxTVA * 0.01;
            })
            return total;
        },
    },
    components: {Link, AppLayout},
}
</script>
