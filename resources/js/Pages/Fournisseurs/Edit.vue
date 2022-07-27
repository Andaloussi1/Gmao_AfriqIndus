<template>

    <AppLayout title="Fournisseur">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier Fournisseur
            </h2>

        </template>

        <div class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Modifier.fournisseur</h5>
                <form @submit.prevent="form.put(route('fournisseurs.update',fournisseur.id))">
                    <div class="grid grid-cols-2 gap-4">

                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Nom:</label>
                            <input type="text" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.nom"
                                   aria-describedby="emailHelp124" placeholder="Nom">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Tel:</label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.tel"
                                   aria-describedby="emailHelp123" placeholder="tel">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Email:</label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.email"
                                   aria-describedby="emailHelp123" placeholder="Email">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Taux Tva:</label>
                            <input type="text" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.tauxTVA"
                                   aria-describedby="emailHelp124" placeholder="Taux TVA">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Prix d'achat:</label>
                            <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.prixAchat"
                                   aria-describedby="emailHelp123" placeholder="Prix d'achat">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Code :</label>
                            <input type="number" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.code"
                                   aria-describedby="emailHelp124" placeholder="Code">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Remarque:</label>
                            <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.remarque"
                                   aria-describedby="emailHelp123" placeholder="Remarque">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Adresse:</label>
                            <input type="number" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.adresse"
                                   aria-describedby="emailHelp124" placeholder="Adresse">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Tel secondaire:</label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.telSec"
                                   aria-describedby="emailHelp123" placeholder="Telephone Secondaire">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Num TVA:</label>
                            <input type="text" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.numTVA"
                                   aria-describedby="emailHelp124" placeholder="NUMERO TVA">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Active:</label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.active"
                                   aria-describedby="emailHelp123" placeholder="EST ACTIVE ">
                        </div>
                    </div>

                    <button type="submit"  class="w-full
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
                                                  ease-in-out">
                        Ajouter
                    </button>
                </form>
            </div>

        </div>


    </AppLayout>
</template>
<script>
import {reactive} from 'vue'
import {Inertia} from '@inertiajs/inertia'
import {useForm, Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
export default {
    props:{
        fournisseur:Object,
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
    components: {Link, AppLayout},
}
</script>
