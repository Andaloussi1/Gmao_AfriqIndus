<template>

    <AppLayout title=" Fournisseur">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ajouter un Fournisseur
            </h2>

        </template>

        <!-- <div class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h3  class="text-center text-gray-900 text-xl leading-tight font-medium mb-2">Ajouter un Fournisseur</h3><br>
                <form @submit.prevent="form.post(route('fournisseurs.store'))">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Nom:</label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.nom"
                                   aria-describedby="emailHelp123" placeholder="Nom">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Email:</label>
                            <input type="email" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.email"
                                   aria-describedby="emailHelp124" placeholder="Email">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Adresse:</label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.adresse"
                                   aria-describedby="emailHelp123" placeholder="Adresse">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Code:</label>
                            <input type="number" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.code"
                                   aria-describedby="emailHelp124" placeholder="Type">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Telephone:</label>
                            <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.tel"
                                   aria-describedby="emailHelp123" placeholder="Telephone">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Telephone Secd:</label>
                            <input type="text" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.telSec"
                                   aria-describedby="emailHelp124" placeholder="Telephone Secd">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Numero Tva:</label>
                            <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.numTVA"
                                   aria-describedby="emailHelp123" placeholder="Numero TVA">
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Taux TVA:</label>
                            <input type="number" class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                   v-model="form.tauxTVA"
                                   aria-describedby="emailHelp124" placeholder="Taux TVA en %:">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Activité</label>
                            <input type="number" max="1" min="0" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   v-model="form.active"
                                   aria-describedby="emailHelp123" placeholder="Actif ou Inactif">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-base leading-tight mb-2">Remarque:</label>
                            <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                      id="exampleInput123"
                                      v-model="form.remarque"
                                      aria-describedby="emailHelp123" placeholder="Remarque"

                            >

                            </textarea>


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
        </div> -->

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
                    <div class="md:w-1/3 px-3">
                        <FormKit
                            type="number"
                            max="1" 
                            min="0"
                            label="Actif"
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
import {reactive} from 'vue'
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
            active: "",
        });
        return {form};
    },
    components: {Link, AppLayout},
}
</script>
