<template>

    <AppLayout title=" Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier Article
            </h2>

        </template>

        <div class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Modifier Article</h5>
                <form @submit.prevent="form.put(route('articles.update',article.id))">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Reference:</label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.reference"
                                   aria-describedby="emailHelp123" placeholder="Reference">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Nom:</label>
                            <input type="text" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.nom"
                                   aria-describedby="emailHelp124" placeholder="Nom">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Marque:</label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.marque"
                                   aria-describedby="emailHelp123" placeholder="Marque">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Type:</label>
                            <input type="text" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.type"
                                   aria-describedby="emailHelp124" placeholder="Type">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Prix d'achat:</label>
                            <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.prixAchat"
                                   aria-describedby="emailHelp123" placeholder="Prix d'achat">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Prix de vente:</label>
                            <input type="number" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.prixVente"
                                   aria-describedby="emailHelp124" placeholder="Prix de vente">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Total:</label>
                            <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.total"
                                   aria-describedby="emailHelp123" placeholder="Total">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Total HTVA:</label>
                            <input type="number" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.totalHTVA"
                                   aria-describedby="emailHelp124" placeholder="Total hors TVA">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Emplacement:</label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.emplacement"
                                   aria-describedby="emailHelp123" placeholder="Emplacement">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Designation:</label>
                            <input type="text" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.designation"
                                   aria-describedby="emailHelp124" placeholder="Designation">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Unité:</label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.unite"
                                   aria-describedby="emailHelp123" placeholder="Unité">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Niveau Stock:</label>
                            <input type="number" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.niveauStock"
                                   aria-describedby="emailHelp124" placeholder="Niveau de stock">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Stock initial :</label>
                            <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.stockInit"
                                   aria-describedby="emailHelp123" placeholder="Stock initial">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Stock minimal:</label>
                            <input type="number" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.stockMin"
                                   aria-describedby="emailHelp124" placeholder="Stock minimal">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Fournisseurs :</label>
                            <select class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    v-model="form.fournisseur_id"
                                    aria-describedby="emailHelp124">
                                <option v-for="fournisseur in fournisseurs" :key="fournisseur.id" :value="fournisseur.id" >
                                    {{fournisseur.nom}}
                                </option>
                            </select>

                        </div>
                    </div>

                    <button type="submit"  class="w-full
                                                  px-6
                                                  py-2.5
                                                  bg-blue-600
                                                  text-white
                                                  font-medium
                                                  text-xs
                                                  leading-tight
                                                  uppercase
                                                  rounded
                                                  shadow-md
                                                  hover:bg-blue-700 hover:shadow-lg
                                                  focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                                  active:bg-blue-800 active:shadow-lg
                                                  transition
                                                  duration-150
                                                  ease-in-out">
                        Ajouter
                    </button>
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
        fournisseurs: Object,
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
            fournisseur_id: props.article.fournisseur_id,
        });
        return {form};
    },

    components: {Link, AppLayout},
}
</script>




