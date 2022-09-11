<template>

    <AppLayout title=" Commande">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Créer Commande
            </h2>

        </template>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex items-center justify-center my-2">
            <FormKit type="form" submit-label="Ajouter" @submit="submitHandler">
                <div class="mx-3 md:flex mb-6">
                    <div class="px-3 mb-6 md:mb-0">
                        <FormKit type="text" label="Titre" validation="required | alpha"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.titre" />
                    </div>
                    <div class="px-3">
                        <FormKit type="text" label="Description" validation="required|alphanumeric"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.description" />
                    </div>
                    <div class="px-3">
                        <FormKit type="text" label="Adresse Livraison" validation="required|alphanumeric"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.adresseLivraison" />
                    </div>
                    <div class="px-3">
                        <FormKit type="date" label="Date Commande" validation="required"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.dateCommande" />
                    </div>
                </div>
                <div class="mx-3 md:flex mb-6">
                    <div class="px-3 mb-6 md:mb-0">
                        <FormKit type="date" label="Date Livraison" validation="required"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.dateLivraison" />
                    </div>
                    <div class="px-3">
                        <FormKit type="text" label="status" validation="required|alphanumeric"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.status" />
                    </div>
                    <div class="px-3">
                        <FormKit type="number" label="Total" validation="required"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.total" />
                    </div>
                </div>

                <div class="mx-3 md:flex mb-6">
                    <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                        <FormKit type="number" label="Total HTVA" validation="required"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.totalHTVA" />
                    </div>
                    <div class="mx-3 px-3 mb-6 md:mb-0">
                        <FormKit type="select" label="Article" validation="required" placeholder="Choisissez un article"
                            :options=articlesObj v-model="form.article_id" />
                    </div>
                </div>
            </FormKit>
        </div>


    </AppLayout>
</template>
<script>
import { Inertia } from '@inertiajs/inertia'
import { useForm, Link } from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import FileInput from '../../Components/FileInput.vue'
import { FormKit } from '@formkit/vue'


export default {
    props: {
        commande: Object,
        articles: Object,
        fournisseurs: Object,
    },
    methods: {
        submitHandler() {
            console.log(this.form)
            Inertia.post(route('commandes.store'), this.form);
        }

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
        const fournisseurArray = Object.values(props.fournisseurs);
        const fournisseursObj = fournisseurArray.reduce((previousObject, fournisseur) => ({ ...previousObject, [fournisseur.id]: fournisseur.nom }), {});

        const articleArray = Object.values(props.articles);
        const articlesObj = articleArray.reduce((previousObject, article) => ({
            ...previousObject,
            [article.id]: article.nom
        }), {});

        return { form, articlesObj, fournisseursObj };
    },
    components: { Link, AppLayout, FileInput, FormKit },
}
</script>
