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
                            Total="text"
                            label="Titre"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.titre"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            Total="text"
                            label="Description"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.description"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            Total="text"
                            label="Adresse Livraisn"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.adresseLivraison"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            Total="date"
                            label="Date Commande"
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
                            Total="date"
                            label="Date Livraison"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.dateLivraison"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            Total="text"
                            label="Status"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.status"
                        />
                    </div>
                </div>

                <div class="mx-3 md:flex mb-6">
                    <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                        <FormKit
                            Total="number"
                            label="Total"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.total"
                        />
                    </div>
                    <div class="md:w-1/3 px-3">
                        <FormKit
                            Total="number"
                            label="Total HTVA"
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
                         placeholder="Choisissez une Article"
                         :options=articlesObj
                         v-model="form.article_id"
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
        commande:Object,
        articles:Object,
    },

    methods: {
        submitHandler(){
            console.log(this.form);
            Inertia.put(route('commandes.update', this.$props.commande.id), this.form);
        },
    },

    setup(props) {
        const form = useForm({
            titre: props.commande.titre,
            description: props.commande.description,
            adresseLivraison: props.commande.adresseLivraison,
            dateCommande: props.commande.dateCommande,
            dateLivraison: props.commande.dateLivraison,
            status: props.commande.status,
            total: props.commande.total,
            totalHTVA: props.commande.totalHTVA,
            article_id: props.commande.article_id,

        });
        const articleArray = Object.values(props.articles);
        const articlesObj = articleArray.reduce((previousObject, article) => ({
            ...previousObject,
            [article.id]: article.nom
         }), {});
        return {form,articlesObj};
    },

    components: {Link, AppLayout, FormKit},
}
</script>




