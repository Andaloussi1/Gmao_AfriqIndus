<template>
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet" />

    <AppLayout title=" Commande">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Créer Commande
            </h2>

        </template>
<!-- 
        <div class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h3 class="text-center text-gray-900 text-xl leading-tight font-medium mb-2">Ajouter une Commande</h3>
                <br>
                <form @submit.prevent="form.post(route('commandes.store'))">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Titre:</label>
                            <input type="text"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleInput124" v-model="form.titre" aria-describedby="emailHelp124"
                                placeholder="Titre">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Description:</label>
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleInput123" v-model="form.description" aria-describedby="emailHelp123"
                                placeholder="Description">
                        </div>
                    </div>


                    <div class="grid gap-4">

                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Adresse de Livraison:</label>
                            <input type="text"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleInput124" v-model="form.adresseLivraison" aria-describedby="emailHelp124"
                                placeholder="Adresse de Livraison">
                        </div>
                    </div>
                    <div class="grid gap-4">

                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Stock:</label>
                            <input type="text"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleInput124" v-model="form.stock" aria-describedby="emailHelp124"
                                placeholder="quantité">
                        </div>
                    </div>





                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Date de Commande:</label>
                            <input type="date"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleInput123" v-model="form.dateCommande" aria-describedby="emailHelp123"
                                placeholder="Date de Commande">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Date de livraison:</label>
                            <input type="date"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleInput124" v-model="form.dateLivraison" aria-describedby="emailHelp124"
                                placeholder="Date de livraison">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Total :</label>
                            <input type="number"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleInput124" v-model="form.total" aria-describedby="emailHelp124"
                                placeholder="Total">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Total HTVA:</label>
                            <input type="number"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleInput124" v-model="form.totalHTVA" aria-describedby="emailHelp124"
                                placeholder="Total hors TVA">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Statut:</label>
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleInput123" v-model="form.status" aria-describedby="emailHelp123"
                                placeholder="Statut">
                        </div>
                        <div class="form-group mb-6">
                            <label class="block text-left" style="max-width: 300px">
                                <span class="text-gray-700">Articles</span>
                                <select class="form-multiselect block w-full mt-1" v-model="form.articles" multiple>
                                    <option v-for="article in articles" :key="article.id" :value="article.id">
                                        {{article.nom}}</option>
                                </select>
                            </label>

                        </div>
                    </div>

                    <button type="submit" class="
      w-full
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
      ease-in-out">Ajouter
                    </button>
                </form>
            </div>
        </div> -->
 <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex items-center justify-center my-2">
            <FormKit
                type="form"
                submit-label="Ajouter"
                @submit="submitHandler"
            >
                <div class="mx-3 md:flex mb-6">
                    <div class="px-3 mb-6 md:mb-0">
                        <FormKit
                            type="text"
                            label="Titre"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.titre"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="text"
                            label="Description"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.description"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="text"
                            label="Adresse Livraison"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.adresseLivraison"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="date"
                            label="Date Commande"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.dateCommande"
                        />
                    </div>
                </div>
                <div class="mx-3 md:flex mb-6">
                    <div class="px-3 mb-6 md:mb-0">
                        <FormKit
                            type="date"
                            label="Date Livraison"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.dateLivraison"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="text"
                            label="status"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.status"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="number"
                            label="Total"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.total"
                        />
                    </div>
                </div>

                <div class="mx-3 md:flex mb-6">
                    <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                        <FormKit
                            type="number"
                            label="Total HTVA"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.totalHTVA"
                        />
                    </div>
                <div class="mx-3 px-3 mb-6 md:mb-0">
                    <FormKit
                        type="select"
                        label="Article"
                        placeholder="Choisissez un fournisseur"
                        :options=articlesObj
                        v-model="form.article_id"
                    />
                </div>
                </div>
           </FormKit>
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
        commande:Object,
        articles:Object,
    },
    methods: {
        submitHandler() {
            console.log(this.form)
            Inertia.post(route('commandes.store'), this.form);
        },
        upload() {
            console.log($event.target.files);
        },
    },
    setup(props) {
        const form = useForm({
            id: "",
            titre: "",
            description: "",
            adresseLivraison: "",
            dateCommande: "",
            dateLivraison: "",
            status: "",
            total: "",
            totalHTVA: "",
            stock:"",
            articles:"",
        });

        const articleArray = Object.values(props.articles);
        const articlesObj = articleArray.reduce((previousObject, article) => ({ ...previousObject, [article.id]: article.nom}), {});
        console.log(articlesObj);

        return {form, articlesObj};
    },
    components: {Link, AppLayout},
}
</script>
