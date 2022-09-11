<template>

    <AppLayout title=" commande">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                informations du {{form.outil}}
            </h2>

        </template>

        <body class="overflow-hidden dark:bg-gray-900">
            <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
                <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                    <div class="border-b border-gray-200 pb-6">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300 ">Nom : {{outil.nom}}</p>
                    </div>
                    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                        <div class="flex items-center justify-center">
                            <p class="text-sm leading-none text-gray-600 dark:text-gray-300">Location : {{form.louer?'oui':'non'}}</p>
                        </div>
                    </div>
                    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Date </p>
                        <div class="flex items-center justify-center">
                            <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.date}}
                            </p>
                        </div>
                    </div>
                    <div
                        class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4  ">
                        Details :
                    </div>
                    <div><br>
                        <p v-if="form.louer" class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">periode :
                            {{form.periode + ' ' + form.periodicite}}</p>
                        <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Prix :
                            {{form.prix}}</p>
                        <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">quantite : {{form.quantite}}
                        </p>
                        <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">fournisseur: {{fournisseur.nom}}
                        </p>
                    </div>

                </div>
            </div>
        </body>


    </AppLayout>
</template>
<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { useForm, Link } from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
export default {
    props: {
        acquisitionOutil: Object,
        fournisseur: Object,
        outil:Object,
    },
    data() {
        return {
            showData: false,
            showData1: false
        }
    },
    setup(props) {
        const form = useForm({
            prix: props.acquisitionOutil.prix,
            date: props.acquisitionOutil.date,
            periode: props.acquisitionOutil.periode,
            periodicite: props.acquisitionOutil.periodicite,
            quantite: props.acquisitionOutil.quantite,
            louer: props.acquisitionOutil.louer,

        });
        return { form };
    },
    methods: {
        showList() {
            if (this.showData === false) {
                this.showData = true
            } else {
                this.showData = false
            }
        },
        showList1() {
            if (this.showData1 === false) {
                this.showData1 = true
            } else {
                this.showData1 = false
            }
        },
    },
    components: { Link, AppLayout },
}
</script>
