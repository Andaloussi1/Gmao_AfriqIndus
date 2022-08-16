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
                <form @submit.prevent="submitHandler">
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
                    <div class="grid gap-2">
                        <div class="relative" v-for="img in currentMedia">
                            <button @click="removeImage(img.id)" type="button" class="absolute top-0 left-0 text-white bg-opacity-75 rounded-full cursor-pointer hover:bg-opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <img :src="img.url" class="rounded-xl object-cover h-48">
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
        media: Object,
    },
    data(props) {
      return {
          deletedMedia: [],
          currentMedia: props.media,
      }
    },
    methods: {
      removeImage(id) {
          this.deletedMedia.splice(this.media.length, 0, id);
          this.currentMedia = this.currentMedia.filter(image => image.id != id);
      },
      submitHandler(){
          this.form.deleted_media = this.deletedMedia;
          Inertia.put(route('articles.update', this.$props.article), this.form);
      },
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
            deleted_media: [],
        });
        return {form};
    },

    components: {Link, AppLayout},
}
</script>




