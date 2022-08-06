<template>

    <AppLayout title="Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Créer Article
            </h2>

        </template>

        <div class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h3  class="text-center text-gray-900 text-xl leading-tight font-medium mb-2">Ajouter un Article</h3><br>
                <form @submit.prevent="submit">
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
                            <label class="text-gray-900 text-base leading-tight mb-2">Niveau de stock:</label>
                            <input type="number" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.niveauStock"
                                   aria-describedby="emailHelp124" placeholder="Niveau de stock">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Stock initiale:</label>
                            <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.stockInit"
                                   aria-describedby="emailHelp123" placeholder="Stock initial">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Stock minimale:</label>
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

                    <file-input @input="uploadMedia"></file-input>
                    <div v-if="media.length">
                        <div class="relative flex flex-col items-center justify-center" v-for="(item, index) in media">
                            <button
                                type="button"
                                @click="removeMedia(index, item)"
                                class="m-1 absolute top-0 left-0 text-white bg-black bg-opacity-75 rounded-full cursor-pointer hover:bg-opacity-100"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                            <img :src="item.url" />
                            <div class="absolute bg-black bg-opacity-75 text-sm rounded px-2 text-white" v-if="item.loading">Loading...</div>
                        </div>
                    </div>

                    <button type="submit" class="w-full
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
import FileInput from '../../Components/FileInput.vue'


export default {
    props:{
        fournisseurs:Object,
    },
    data() {
        return{media: [],}
    },
    methods: {
        uploadMedia(files) {
            Array.from(files).forEach((media) => {
                let reader = new FileReader();
                reader.readAsDataURL(media);
                reader.onload = (e) => {
                    let item = {
                        url: e.target.result,
                        id: undefined,
                        loading: false,
                    }
                    let formData = new FormData();
                    formData.append('file', media)
                    axios.post(route('media.store'), formData)
                        .then(({data}) => {
                            item.id = data.id;
                        })
                        .finally(() => item.loading = false)
                    this.media.push(item)
                }
            });
        },
        removeMedia(index, item) {
            this.media.splice(index, 1);

            if(item.id) {
                axios.delete(route('media.destroy', item.id)).then((e) => {
                    console.log(e);
                })
            }
        },
        submit() {
            this.form.mediaIds = this.media.map(item => item.id);
            Inertia.post(route('articles.store'), this.form);
            console.log('test');
        },
    },

    setup() {
        const form = useForm({
            nom: "",
            reference: "",
            marque: "",
            prixAchat: "",
            prixVente: "",
            total: "",
            totalHTVA: "",
            emplacement: "",
            type: "",
            unite: "",
            designation: "",
            stockMin: "",
            stockInit: "",
            niveauStock: "",
            fournisseur_id:"",
            mediaIds: []
        });
        return {form};
    },


    components: {Link, AppLayout, FileInput},
}
</script>




