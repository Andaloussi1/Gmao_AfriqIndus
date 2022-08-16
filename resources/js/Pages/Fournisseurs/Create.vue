<template>

    <AppLayout title=" Fournisseur">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ajouter un Fournisseur
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
import {Inertia} from '@inertiajs/inertia'
import {useForm, Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
export default {
    methods: {
        submitHandler() {
            console.log(this.form)
            Inertia.post(route('fournisseurs.store'), this.form);
        },
        upload() {
            console.log($event.target.files);
        },
    },
    setup() {
        const form = useForm({
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
        return {form};
    },
    components: {Link, AppLayout},
}
</script>
