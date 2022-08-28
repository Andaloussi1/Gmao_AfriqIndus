<template>

    <AppLayout title="Fournisseur">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier Fournisseur
            </h2>

        </template>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex items-center justify-center my-2">
            <FormKit
                type="form"
                submit-label="Ajouter"
                @submit="submitHandler"
            >
                <div class="mx-3 md:flex mb-6">
                    <div class="px-3">
                        <FormKit
                            type="text"
                            label="Nom"
                            :validation="[['required'], ['matches', /^[A-zÀ\s]+$/]]"
                            :validation-messages="{
                                matches: 'Nom ne doit pas contenir des chiffres',
                            }"                           
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.nom"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="text"
                            label="Telephone"
                            validation="required|number"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.tel"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="email"
                            label="Email"
                            validation="required|email"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.email"
                        />
                    </div>
                </div>
                <div class="mx-3 md:flex mb-6">
                    <div class="px-3 mb-6 md:mb-0">
                        <FormKit
                            type="number"
                            label="Taux TVA"
                            validation="required"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.tauxTVA"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="number"
                            label="Code"
                            validation="required"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.code"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="text"
                            label="Remarque"
                            validation="required"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.remarque"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="text"
                            label="Adresse"
                            validation="required"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.adresse"
                        />
                    </div>
                </div>

                <div class="mx-3 md:flex mb-6">
                    <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                        <FormKit
                            type="text"
                            label="Telephone Secondaire"
                            validation="required|number"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.telSec"
                        />
                    </div>
                    <div class="md:w-1/3 px-3">
                        <FormKit
                            type="number"
                            label="Numero TVA"
                            validation="required"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.numTVA"
                        />
                    </div>
                </div>
                <div class="mx-3 md:flex mb-6">
                    <div class="md:w-full px-3">
                        <FormKit
                            type="checkbox"
                            label="Actif"
                            help="Est-ce que cette fournisseur actif?"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.active"
                        />
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
        fournisseur: Object,

    },
    methods: {
        submitHandler(){
            console.log(this.form);
            Inertia.put(route('fournisseurs.update', this.$props.fournisseur.id), this.form);
        },
    },
    setup(props) {
        const form = useForm({
            nom: props.fournisseur.nom,
            tel: props.fournisseur.tel,
            email: props.fournisseur.email,
            tauxTVA: props.fournisseur.tauxTVA,
            code: props.fournisseur.code,
            total: props.fournisseur.total,
            remarque: props.fournisseur.remarque,
            adresse: props.fournisseur.adresse,
            telSec: props.fournisseur.telSec,
            numTVA: props.fournisseur.numTVA,
            active: props.fournisseur.active,
        });
        return {form};
    },
    components: {Link, AppLayout,FormKit},
}
</script>
