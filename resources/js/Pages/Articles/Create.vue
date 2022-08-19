<template>

    <AppLayout title="Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Créer Article
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
           </FormKit>
        </div>

    </AppLayout>
</template>
<script>
import {Inertia} from '@inertiajs/inertia'
import {useForm, Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import {FormKit} from '@formkit/vue'


export default {
    props:{
        fournisseurs:Object,
    },
    methods: {
        submitHandler() {
            Inertia.post(route('articles.store'), this.form);
        },

    },

    setup(props) {
        const form = useForm({
            nom: "",
            reference: "",
            marque: "",
            prixAchat: "",
            prixVente: "",
            emplacement: "",
            type: "",
            unite: "",
            designation: "",
            stockMin: "",
            niveauStock: "",
            fournisseur_id:"",
            images: []
        });

        const fournisseurArray = Object.values(props.fournisseurs);
        const fournisseursObj = fournisseurArray.reduce((previousObject, fournisseur) => ({ ...previousObject, [fournisseur.id]: fournisseur.nom}), {});

        return {form, fournisseursObj};
    },


    components: {Link, AppLayout, FormKit},
}
</script>




