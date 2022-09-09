

<template>

    <AppLayout title="Outil">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 Acquérir un outil
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
                            type="select"
                            validation="required"
                            :options=outilsObj
                            label="Outil"
                            placeholder="Choisissez un outil"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.outil_id"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="checkbox"
                            label="Louer"
                            wrapper-class="mt-6"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.louer"
                        />
                    </div>
                    <div class="px-3" v-if=form.louer>
                        <FormKit
                            type="number"
                            label="Periode"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.periode"
                        />
                    </div>
                    <div class="px-3" v-if=form.louer>
                        <FormKit
                            type="select"
                            placeholder="Jours/Mois/Ans"
                            :options="{
                                mois: 'Mois',
                                jours: 'Jours',
                                ans: 'Ans',
                            }"
                            label="Periodicité"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.periodicite"
                        />
                    </div>
                </div>
                <div class="mx-3 md:flex mb-6">
                    <div class="px-3 mb-6 md:mb-0">
                        <FormKit
                            type="date"
                            label="Date"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.date"
                        />
                    </div>
                    <div class="px-3 mb-6 md:mb-0">
                        <FormKit
                            type="number"
                            label="Quantite"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.quantite"
                        />
                    </div>
                    <div class="px-3 mb-6 md:mb-0">
                        <FormKit
                            type="number"
                            label="Prix"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.prix"
                        />
                    </div>
                    <div class="px-3 mb-6 md:mb-0">
                        <FormKit
                            type="select"
                            label="Fournisseur"
                            validation="required"
                            placeholder="Choisissez un fournisseur"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            :options=fournisseursObj
                            v-model="form.fournisseur_id"
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
import {FormKit} from '@formkit/vue'
export default {
    methods: {
        submitHandler() {
            Inertia.post(route('acquisitionsoutils.store'), this.form);
        },
    },
    props: {
        fournisseurs:Object,
        outils:Object,
    },

    setup(props) {
        const form = useForm({
            outil_id: "",
            fournisseur_id: "",
            prix: "",
            louer: false,
            periode: "",
            periodicite: "",
            date: "",
            quantite: "",
        });
        const fournisseurArray = Object.values(props.fournisseurs);
        const fournisseursObj = fournisseurArray.reduce((previousObject, fournisseur) => ({ ...previousObject, [fournisseur.id]: fournisseur.nom}), {});
        const outilArray = Object.values(props.outils);
        const outilsObj = outilArray.reduce((previousObject, outil) => ({ ...previousObject, [outil.id]: outil.nom}), {});
        return {form, outilsObj, fournisseursObj};
    },
    components: {Link, AppLayout, FormKit},
}
</script>
