<template>

    <AppLayout title=" Article">


        <a :href="route('report',article.id)">

            <i class="fa fa-file-pdf-o" ></i>
                Fiche Technique PDF


        </a>





        <body class="overflow-hidden dark:bg-gray-900">
            <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
                <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
                    <img class="w-full" v-for="url in urls" :src="url"/>
                </div>
                <div class="md:hidden">
                    <img class="w-full" :src=urls[0] />
                    <div class="flex items-center justify-between mt-3 space-x-4 md:space-x-0">
                        <img class="md:w-48 md:h-48 w-full" v-for="url in urls" :src="url"/>
                    </div>
                </div>
                <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                    <div class="flex mb-10 float-right">
                        <Link :href="route('articles.edit',article.id)" class="hover:bg-gray-300 flex rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </Link>
                        <button @click="destroy(article.id)" class="hover:bg-gray-300 flex rounded ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300 "> Reference: {{form.reference}}</p>
                        <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2">{{form.nom}}</h1>
                    </div>
                    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Prix de vente:</p>
                        <div class="flex items-center justify-center">
                            <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.prixVente}}</p>
                        </div>
                    </div>
                    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Fournisseur</p>
                        <div class="flex items-center justify-center">
                            <p  class="text-sm leading-none text-gray-600 dark:text-gray-300">{{fournisseur.nom}}</p>
                        </div>
                    </div>
                    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Stock:</p>
                        <div class="flex items-center justify-center">
                            <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.niveauStock}}</p>
                        </div>
                    </div>
                    <div class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4  ">
                        Details d'article :
                    </div>
                    <div><br>
                        <div class="border-b text-center font-bold text-xl mb-2">
                            <label >
                                designation:
                            </label>
                            <p class=" text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7" > {{form.designation}}</p>
                        </div>
                        <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Marque: {{form.marque}}</p>
                        <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Type: {{form.type}}</p>
                        <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Emplacement: {{form.emplacement}}</p>
                        <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Total: {{form.total}}</p>
                        <p class="md:w-96 text-base leading-normal text-gray-600 dark:text-gray-300 mt-4">Prix d'achat: {{form.prixAchat}}</p>
                    </div>
                    <div>
                        <div class="border-t border-b py-4 mt-7 border-gray-200">
                            <div @click="showList" data-menu class="flex justify-between items-center cursor-pointer">
                                <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Autres informations</p>
                                <button  class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded" role="button" aria-label="show or hide">
                                    <img class="transform dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg" alt="dropdown">
                                    <img  class="transform dark:hidden rotate-180" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg" alt="dropdown">
                                </button>
                            </div>
                            <div class=" pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300" id="sect">
                                <p class="text-base leading-4 mt-2 text-gray-600 dark:text-gray-300">Stock initiale: {{form.stockInit}}</p>
                                <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Stock minimale: {{form.stockMin}}</p>
                                <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Total hors TVA: {{form.totalHTVA}}</p>
                                <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Unité: {{form.unite}}</p>
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
        article:Object,
        fournisseur:Object,
        urls:Array,
    },

    methods:{
destroy(id){
    if(confirm('Êtes-vous sûr?')){
        Inertia.delete(route('articles.destroy',id))
    }
},
    },
    setup(props) {

        const form = useForm({
            id: props.article.article_id,
            nom: props.article.nom,
            reference: props.article.reference,
            marque: props.article.marque,
            prixAchat: props.article.prixAchat,
            prixVente: props.article.prixVente,
            total: props.article.prixAchat * props.article.niveauStock,
            totalHTVA: (props.article.prixVente - props.article.prixAchat) * props.article.niveauStock,
            emplacement: props.article.emplacement,
            type: props.article.type,
            unite: props.article.unite,
            designation: props.article.designation,
            stockMin: props.article.stockMin,
            niveauStock: props.article.niveauStock,
        });
        return {form};
    },

    components: {Link, AppLayout},
}

</script>




