<template>

    <AppLayout title=" Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                informations du {{form.reference}} :
            </h2>

        </template>

        <div class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white w-5/6">
                <form >
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Reference:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   aria-describedby="emailHelp123">{{form.reference}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Nom:</label>
                            <div  class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124" > {{form.nom}}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Marque:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123">{{form.marque}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Type:</label>
                            <div class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{form.type}}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Prix d'achat:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123">{{form.prixAchat}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Prix de vente:</label>
                            <div class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{form.prixVente}}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Total:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123">{{form.total}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Total HTVA:</label>
                            <div  class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{form.totalHTVA}}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Emplacement:</label>
                            <div class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123">{{form.emplacement}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Designation:</label>
                            <div  class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{ form.designation }}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Unité:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123" >{{form.unite}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Niveau du stock:</label>
                            <div class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{ form.niveauStock }}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Stock initial:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123">{{form.stockInit}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Stock minimale:</label>
                            <div  class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{form.stockMin}}</div>
                        </div>
                    </div>


                </form>
            </div>

        </div>


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


    },
    setup(props) {
        const form = useForm({
            nom: props.article.nom,
            reference: props.article.reference,
            marque: props.article.marque,
            prixAchat: props.article.prixAchat,
            prixVente: props.article.prixVente,
            total: props.article.total,
            totalHTVA: props.article.totalHTVA,
            emplacement: props.article.emplacement,
            type: props.article.type,
            unite: props.article.unite,
            designation: props.article.designation,
            stockMin: props.article.stockMin,
            stockInit: props.article.stockInit,
            niveauStock: props.article.niveauStock,
        });
        return {form};
    },

    components: {Link, AppLayout},
}
</script>




