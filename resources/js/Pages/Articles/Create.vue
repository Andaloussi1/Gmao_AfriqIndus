<template>

    <AppLayout title="Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Créer Article
            </h2>

        </template>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex items-center justify-center my-2"/>
            <FormKit
                type="form"
                submit-label="Ajouter"
                @submit="submitHandler"
                :config="{validationVisibility: 'submit'}"
            />
                <div class="mx-3 md:flex mb-6">
                    <div class="px-3 mb-6 md:mb-0">
                        <FormKit
                            type="text"
                            label="Reference"
                            validation="required|alphanumeric"
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
                            validation="required|alphanumeric"
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
                            validation="required|alphanumeric"
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
                            validation="required|alpha"
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
                            validation="required"
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
                            validation="required"
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
                            :validation="[['required'], ['matches', /^[A-zÀ-ú0-9\s]+$/]]"
                            :validation-messages="{
                                matches: 'L\'emplacement ne doit contenir que des lettres et des chiffres',
                            }"
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
                            validation="required|alphanumeric"
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
                            validation="required|alphanumeric"
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
                            validation="required"
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
                            validation="required"
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
                        validation="required"
                        placeholder="Choisissez un fournisseur"
                        :options=fournisseursObj
                        v-model="form.fournisseur_id"
                    />
                <div class="mx-3 md:flex mb-6">
                    <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                        <FormKit
                            type="select"
                            label="Fournisseur"
                            placeholder="Choisissez un fournisseur"
                            :options=fournisseursObj
                            v-model="form.fournisseur_id"
                        />
                    </div>

                    <div class=" px-3 pt-6">

                        <button type="button" @click="isHidden=!isHidden">
                            <svg  xmlns="http://www.w3.org/2000/svg" class=" h-8 w-8  rounded-r hover:bg-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mx-3 px-3 mb-6 md:mb-0">
                    <FormKit
                        type="file"
                        label="Image"
                        @change="form.images = $event.target.files;"
                        multiple
                    />
                </div>qq
            <div v-if="isHidden" class=" h-fit w-fit mb-52 h-fit absolute bg-gray-300 border-2 border-b-gray-400 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex items-center justify-center my-2">
                <div class="hover:bg-gray-300 mb-96 rounded">
                    <button  type="button" @click="isHidden=!isHidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                </div>
                <div>
                    <p class="font-semibold text-xl text-gray-800 leading-tight pl-72 mb-5">Ajouter un nouveau fournisseur</p>
                    <FormKit
                        type="form"
                        submit-label="Ajouter"
                        @submit="submitHandlere"
                    >
                        <div class="mx-3 md:flex mb-6">
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
                                    label="Telephone"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.tel"
                                />
                            </div>
                            <div class="px-3">
                                <FormKit
                                    type="email"
                                    label="Email"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.email"
                                />
                            </div>
                        </div>
                        <div class="mx-3 md:flex mb-6">
                            <div class="px-3 mb-6 md:mb-0">
                                <FormKit
                                    type="number"
                                    label="Taux TVA"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.tauxTVA"
                                />
                            </div>
                            <div class="px-3">
                                <FormKit
                                    type="number"
                                    label="Code"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.code"
                                />
                            </div>
                            <div class="px-3">
                                <FormKit
                                    type="text"
                                    label="Remarque"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.remarque"
                                />
                            </div>
                            <div class="px-3">
                                <FormKit
                                    type="text"
                                    label="Adresse"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.adresse"
                                />
                            </div>
                        </div>

                        <div class="mx-3 md:flex mb-6">
                            <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                                <FormKit
                                    type="text"
                                    label="Telephone Secondaire"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.telSec"
                                />
                            </div>
                            <div class="md:w-1/3 px-3">
                                <FormKit
                                    type="number"
                                    label="Numero TVA"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.numTVA"
                                />
                            </div>
                        </div>
                        <div class="mx-3 md:flex mb-6">
                            <div class="md:w-full px-3">
                                <FormKit
                                    type="checkbox"
                                    label="Actif"
                                    help="Est-ce que ce fournisseur actif?"
                                    label-class="block mb-2 font-bold text-sm"
                                    inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                                    input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                                    v-model="forme.active"
                                />
                            </div>
                        </div>

                    </FormKit>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
<script>
import {reactive} from 'vue';
import {Inertia} from '@inertiajs/inertia'
import {useForm, Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import FileInput from '../../Components/FileInput.vue'
import {FormKit} from '@formkit/vue'

export default {
    data(){
        return{
            isHidden:false,
        };
    },
    props:{
        fournisseurs:Object,
        vis:false
    }
    ,
    methods: {
        submitHandler() {
            Inertia.post(route('articles.store'), this.form);
        },submitHandlere() {
            console.log(this.forme)
            Inertia.visit(route('fournisseurs.store'),{ method: 'post',data:{
                    nom:this.forme.nom,
                    tel:this.forme.tel,
                    telSec:this.forme.telSec,
                    remarque:this.forme.remarque,
                    adresse:this.forme.adresse,
                    email:this.forme.email,
                    numTVA:this.forme.numTVA,
                    active:this.forme.active,
                    code:this.forme.code,
                    tauxTVA:this.forme.tauxTVA,
                }},)
            //Inertia.post(route('fournisseurs.store'), this.forme);
        },
        upload() {
            console.log($event.target.files);
        },
    },

    setup(props) {
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
            images: []
        });
        const forme = useForm({
            nom: "",
            tel: "",
            email: "",
            tauxTVA: "",
            code: "",
            remarque: "",
            adresse: "",
            telSec: "",
            numTVA: "",
            active: false,
        });

        const fournisseurArray = Object.values(props.fournisseurs);
        const fournisseursObj = fournisseurArray.reduce((previousObject, fournisseur) => ({ ...previousObject, [fournisseur.id]: fournisseur.nom}), {});

        return {form,forme, fournisseursObj};
    },


    components: {Link, AppLayout, FileInput, FormKit},
}
</script>




