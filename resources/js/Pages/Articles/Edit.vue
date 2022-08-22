<template>

    <AppLayout title=" Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier Article
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
                            label="Reference"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.reference"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="text"
                            label="Nom"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.nom"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="text"
                            label="Marque"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.marque"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="text"
                            label="Type"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.type"
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
                            v-model="form.prixAchat"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="number"
                            label="Prix de vente"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.prixVente"
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
                            v-model="form.emplacement"
                        />
                    </div>
                    <div class="md:w-1/3 px-3">
                        <FormKit
                            type="text"
                            label="Designation"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.designation"
                        />
                    </div>
                    <div class="md:w-1/3 px-3">
                        <FormKit
                            type="text"
                            label="Unité"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.unite"
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
                            v-model="form.niveauStock"
                        />
                    </div>
                    <div class="md:w-1/3 px-3">
                        <FormKit
                            type="number"
                            label="Stock minimal"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.stockMin"
                        />
                    </div>
                </div>
                <div class="mx-3 px-3 mb-6 md:mb-0">
                    <FormKit
                        type="select"
                        label="Fournisseur"
                        placeholder="Choisissez un fournisseur"
                        :options=fournisseursObj
                        v-model="form.fournisseur_id"
                    />
                </div>
                <div class="mx-3 px-3 mb-6 md:mb-0">
                    <FormKit
                        type="file"
                        label="Image"
                        @change="form.images = $event.target.files;"
                        multiple
                    />
                </div>
                <div class="md:flex gap-2 px-3">
                    <div class="relative my-3" v-for="img in currentMedia">
                        <button @click="removeImage(img.id)" type="button" class="absolute top-0 left-0 text-white bg-opacity-75 rounded-full cursor-pointer hover:bg-opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <img :src="img.url" class="rounded-xl object-cover h-48">
                    </div>
                </div>
            </FormKit>
        </div>

    </AppLayout>
</template>
<script>
import {FormKit} from '@formkit/vue'
import {Inertia} from '@inertiajs/inertia'
import {useForm, Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'


export default {
    props:{
        article:Object,
        fournisseurs: Object,
        media: Object,
    },

    methods: {
        removeImage(id) {
            this.deletedMedia.splice(this.media.length, 0, id);
            this.currentMedia = this.currentMedia.filter(image => image.id !== id);
        },
        submitHandler(){
            this.form.deleted_media = this.deletedMedia;
            console.log(this.form);
            Inertia.post(route('articles.update', this.$props.article.id), this.form);
        },
    },

    data(props) {
      return {
          deletedMedia: [],
          currentMedia: props.media,
      }
    },

    setup(props) {
        const form = useForm({
            nom: props.article.nom,
            reference: props.article.reference,
            marque: props.article.marque,
            prixAchat: props.article.prixAchat,
            prixVente: props.article.prixVente,
            emplacement: props.article.emplacement,
            type: props.article.type,
            unite: props.article.unite,
            designation: props.article.designation,
            stockMin: props.article.stockMin,
            niveauStock: props.article.niveauStock,
            fournisseur_id: props.article.fournisseur_id,
            images: [],
            deleted_media: []
        });
        const fournisseurArray = Object.values(props.fournisseurs);
        const fournisseursObj = fournisseurArray.reduce((previousObject, fournisseur) => ({ ...previousObject, [fournisseur.id]: fournisseur.nom}), {});
        return {form, fournisseursObj};
    },

    components: {Link, AppLayout, FormKit},
}
</script>




