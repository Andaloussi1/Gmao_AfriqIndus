<template>

    <AppLayout title=" Commande">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Créer Commande
            </h2>

        </template>

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
                            validation="required | alpha"
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
                            validation="required|alphanumeric"
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
                            validation="required|alphanumeric"
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
                            validation="required"
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
                            validation="required"
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
                            validation="required|alphanumeric"
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
                            validation="required"
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
                            validation="required"
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
                            validation="required"
                            placeholder="Choisissez un article"
                            :options=articlesObj
                            v-model="form.article_id"
                        />
                    </div>
                    <button class="h-fit mt-6" type="button" @click="isHidden=!isHidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" h-8 w-8  rounded-r hover:bg-gray-300"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                    </button>
                </div>
            </FormKit>
            <div v-if="isHidden"
                 class=" h-fit w-fit h-fit absolute bg-gray-300 border-2 border-b-gray-400 shadow-md rounded mt-52 px-8 pt-6  mb-4 flex items-center justify-center my-2">
                <div>
                    <div class="hover:bg-gray-400 rounded-full pt-1.5 h-fit w-fit">
                        <button type="button" @click="isHidden=!isHidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                    </div>
                    <p class="font-semibold text-xl text-gray-800 leading-tight pl-72 mb-5 ">Ajouter un nouveau article</p>
                    <FormKit
                        type="form"
                        submit-label="Ajouter"
                        @submit="submitHandlere"
                    >
                        <div class="mx-3 md:flex mb-6">
                            <div class="px-3 mb-6 md:mb-0">
                                <FormKit
                                    type="text"
                                    label="Reference"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.reference"
                                />
                            </div>
                            <div class="px-3">
                                <FormKit
                                    type="text"
                                    label="Nom"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.nom"
                                />
                            </div>
                            <div class="px-3">
                                <FormKit
                                    type="text"
                                    label="Marque"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.marque"
                                />
                            </div>
                            <div class="px-3">
                                <FormKit
                                    type="text"
                                    label="Type"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.type"
                                />
                            </div>
                        </div>
                        <div class="mx-3 md:flex mb-6">
                            <div class="px-3 mb-6 md:mb-0">
                                <FormKit
                                    type="number"
                                    label="Prix d'achat"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.prixAchat"
                                />
                            </div>
                            <div class="px-3">
                                <FormKit
                                    type="number"
                                    label="Prix de vente"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.prixVente"
                                />
                            </div>
                        </div>

                        <div class="mx-3 md:flex mb-6">
                            <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                <FormKit
                                    type="text"
                                    label="Emplacement"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.emplacement"
                                />
                            </div>
                            <div class="md:w-1/3 px-3">
                                <FormKit
                                    type="text"
                                    label="Designation"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.designation"
                                />
                            </div>
                            <div class="md:w-1/3 px-3">
                                <FormKit
                                    type="text"
                                    label="Unité"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.unite"
                                />
                            </div>
                        </div>
                        <div class="mx-3 md:flex mb-6">
                            <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                <FormKit
                                    type="number"
                                    label="Stock initiale"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.niveauStock"
                                />
                            </div>
                            <div class="md:w-1/3 px-3">
                                <FormKit
                                    type="number"
                                    label="Stock minimal"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.stockMin"
                                />
                            </div>
                        </div>
                        <div class="mx-3 md:flex mb-6">
                            <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                <FormKit
                                    type="select"
                                    label="Fournisseur"
                                    placeholder="Choisissez un fournisseur"
                                    :options=fournisseursObj
                                    v-model="forme.fournisseur_id"
                                />
                            </div>

                            <div class=" px-3 pt-6">

                                <button type="button">
                                    <Link href="/fournisseurs/create">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class=" h-8 w-8  rounded-r hover:bg-gray-200" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                        </svg></Link>
                                </button>
                            </div>
                        </div>
                        <div class="mx-3 px-3 mb-6 md:mb-0">
                            <FormKit
                                type="file"
                                label="Image"
                                @change="forme.images = $event.target.files;"
                                multiple
                            />
                        </div>
                    </FormKit>
                </div>
            </div>
        </div>


    </AppLayout>
</template>
<script>
import {Inertia} from '@inertiajs/inertia'
import {useForm, Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import FileInput from '../../Components/FileInput.vue'
import {FormKit} from '@formkit/vue'


export default {
    data() {
        return {
            isHidden: false,
        };
    },
    props: {
        commande: Object,
        articles: Object,
        fournisseurs: Object,
    },
    methods: {
        submitHandler() {
            console.log(this.form)
            Inertia.post(route('commandes.store'), this.form);
        }, submitHandlere() {
            console.log(this.forme)
            Inertia.post(route('articles.store'), this.forme);
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
            stock: "",
            articles: "",
        });
        const forme = useForm({
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
            fournisseur_id: "",
            images: []
        });
        const fournisseurArray = Object.values(props.fournisseurs);
        const fournisseursObj = fournisseurArray.reduce((previousObject, fournisseur) => ({ ...previousObject, [fournisseur.id]: fournisseur.nom}), {});

        const articleArray = Object.values(props.articles);
        const articlesObj = articleArray.reduce((previousObject, article) => ({
            ...previousObject,
            [article.id]: article.nom
        }), {});


        console.log(articlesObj);

        return {form, forme, articlesObj,fournisseursObj};
    },
    components: {Link, AppLayout, FileInput, FormKit},
}
</script>
