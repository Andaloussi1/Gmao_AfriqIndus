<template>

    <AppLayout title=" fournisseur">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                informations du {{form.nom}} :
            </h2>

        </template>

        <body class="overflow-hidden dark:bg-gray-900">
        <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
            <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
                <img class="w-full" alt="image of a girl posing" src="https://media.istockphoto.com/photos/bearings-tool-picture-id512701554" />
                <img class="mt-6 w-full" alt="image of a girl posing" src=" https://media.istockphoto.com/photos/roller-and-ball-bearings-on-white-background-blank-for-creativity-picture-id1349662420" />
            </div>
            <div class="md:hidden">
                <img class="w-full" alt="image of a girl posing" src="https://i.ibb.co/QMdWfzX/component-image-one.png" />
                <div class="flex items-center justify-between mt-3 space-x-4 md:space-x-0">
                    <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/cYDrVGh/Rectangle-245.png" />
                    <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/f17NXrW/Rectangle-244.png" />
                    <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/cYDrVGh/Rectangle-245.png" />
                    <img alt="image-tag-one" class="md:w-48 md:h-48 w-full" src="https://i.ibb.co/f17NXrW/Rectangle-244.png" />
                </div>
            </div>
            <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                <div class="border-b border-gray-200 pb-6">
                    <p class="text-sm leading-none text-gray-600 dark:text-gray-300 ">Telephone: {{form.tel}}</p>
                    <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2"> Nom: {{form.nom}}</h1>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Email:</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.email}}</p>
                    </div>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Adresse:</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.adresse}}</p>
                    </div>
                </div>
                <div class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4  ">
                    Details du fournisseur :
                </div>
                <div><br>
                    <div class="border-b text-center font-bold text-xl mb-2">
                        <label >
                            Remarque:
                        </label>
                        <p class=" text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7" > {{form.remarque}}</p>
                    </div>
                    <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Numero TVA: {{form.numTVA}}</p>
                    <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Taux TVA: {{form.tauxTVA}}%</p>
                    <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Code: {{form.code}}</p>
                    <p class="md:w-96 text-base leading-normal text-gray-600 dark:text-gray-300 mt-4">Telephone Secd: {{form.telSec}}</p>
                </div>
                <div>
                    <div class="border-t border-b py-4 mt-7 border-gray-200">
                        <div @click="showList" data-menu class="flex justify-between items-center cursor-pointer">
                            <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Autres informations</p>
                            <button  class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded" role="button" aria-label="show or hide">
                                <img v-if="showData===false" class="transform dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg" alt="dropdown">
                                <img v-if="showData===true" class="transform dark:hidden rotate-180" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg" alt="dropdown">
                            </button>
                        </div>
                        <div v-if="showData" class=" pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300" id="sect">
                            <p v-if="form.active" class="text-base leading-4 mt-2 text-green-600 dark:text-gray-300">Actif</p>
                            <p v-if="form.active == 0" class="text-base leading-4 mt-2 text-red-600 dark:text-gray-300">Pas actif</p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        </body>


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
    data(){
        return{
            showData:false,
            showData1:false
        }
    },
    setup(props) {
        const form = useForm({
            nom: props.fournisseur.nom,
            tel: props.fournisseur.tele,
            email: props.fournisseur.email,
            tauxTVA: props.fournisseur.tauxTva,
            code: props.fournisseur.code,
            remarque: props.fournisseur.remarque,
            adresse: props.fournisseur.adresse,
            telSec: props.fournisseur.teleSecd,
            numTVA: props.fournisseur.numTva,
            active: props.fournisseur.estActif,
        });
        return {form};
    },
    methods:{
        showList(){
            if(this.showData===false){
                this.showData=true
            } else{
                this.showData=false
            }
        },
        showList1(){
            if(this.showData1===false){
                this.showData1=true
            } else{
                this.showData1=false
            }
        },
    },
    components: {Link, AppLayout},
}
</script>
