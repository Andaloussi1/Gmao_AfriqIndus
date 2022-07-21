<script setup>

import {Link, useForm} from '@inertiajs/inertia-vue3'

import AppLayout from '@/Layouts/AppLayout.vue';
import {Head} from "@inertiajs/inertia-vue3";
const form = useForm({
    ref: '',
    nom: '',
    prixAchat: '',
    prixVente: '',
    stockInit: '',
    founisseur: '',
    type: '',
    emplacement: '',
    terms: false,
});


const submit = () => {
    form.post(route('articles.store'));
};
</script>

<template>
    <AppLayout title=" Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Créer  Article
            </h2>

        </template>
        <div class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Ajouter Article</h5>
                <form @submit.prevent="submit" >
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <input v-model="form.ref" type="text" class="form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123"
                                   aria-describedby="emailHelp123" placeholder="Reference">
                        </div>
                        <div class="form-group mb-6">
                            <input v-model="form.nom" type="text" class="form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput124"
                                   aria-describedby="emailHelp124" placeholder="Nom">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <input  v-model="form.prixAchat" type="text" class="form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123"
                                   aria-describedby="emailHelp123" placeholder="Prix d'achat">
                        </div>
                        <div class="form-group mb-6">
                            <input v-model="form.prixVente" type="text" class="form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput124"
                                   aria-describedby="emailHelp124" placeholder="Prix de vente">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <input v-model="form.stockInit" type="text" class="form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123"
                                   aria-describedby="emailHelp123" placeholder="Stock Initial">
                        </div>
                        <div class="form-group mb-6">
                            <input v-model="form.founisseur" type="text" class="form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput124"
                                   aria-describedby="emailHelp124" placeholder="Fournisseur">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <input v-model="form.emplacement" type="text" class="form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123"
                                   aria-describedby="emailHelp123" placeholder="Emplacement">
                        </div>
                        <div class="form-group mb-6">
                            <input v-model="form.type" type="text" class="form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput124"
                                   aria-describedby="emailHelp124" placeholder="Type">
                        </div>
                    </div>

                    <button type="submit" class="
      w-full
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
      ease-in-out">Ajouter</button>
                </form>
            </div>
        </div>









    </AppLayout>
</template>


