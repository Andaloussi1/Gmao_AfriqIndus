<template>

    <AppLayout title=" Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                informations du {{form.reference}} :
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
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300 "> Reference: {{form.reference}}</p>
                        <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2">{{form.nom}}</h1>
                    </div>
                    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Prix de vente:</p>
                        <div class="flex items-center justify-center">
                            <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.prixVente}}</p>
                        </div>
                    </div>
                    <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Stock:</p>
                        <div class="flex items-center justify-center">
                            <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{form.niveauStock}}</p>
                             </div>
                    </div>
                    <div class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4  ">
                        Details d'article :
                    </div>
                    <div><br>
                        <div class="border-b text-center font-bold text-xl mb-2">
                        <label >
                            designation:
                        </label>
                        <p class=" text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7" > {{form.designation}}</p>
                        </div>
                        <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Marque: {{form.marque}}</p>
                        <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Type: {{form.type}}</p>
                        <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Emplacement: {{form.emplacement}}</p>
                        <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Total: {{form.total}}</p>
                        <p class="md:w-96 text-base leading-normal text-gray-600 dark:text-gray-300 mt-4">Prix d'achat: {{form.prixAchat}}</p>
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
                                <p class="text-base leading-4 mt-2 text-gray-600 dark:text-gray-300">Stock initiale: {{form.stockInit}}</p>
                                <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Stock minimale: {{form.stockMin}}</p>
                                <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Total hors TVA: {{form.totalHtva}}</p>
                                <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Unité: {{form.unite}}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            </body>

     <!--   <div class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white w-5/6">
                <form >
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Reference:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                   aria-describedby="emailHelp123">{{form.reference}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Nom:</label>
                            <div  class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124" > {{form.nom}}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Marque:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123">{{form.marque}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Type:</label>
                            <div class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{form.type}}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Prix d'achat:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123">{{form.prixAchat}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Prix de vente:</label>
                            <div class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{form.prixVente}}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Total:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123">{{form.total}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Total HTVA:</label>
                            <div  class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{form.totalHtva}}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Emplacement:</label>
                            <div class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123">{{form.emplacement}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Designation:</label>
                            <div  class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{ form.designation }}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Unité:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123" >{{form.unite}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Niveau du stock:</label>
                            <div class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{ form.niveauStock }}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Stock initial:</label>
                            <div  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput123"
                                 aria-describedby="emailHelp123">{{form.stockInit}}</div>
                        </div>
                        <div class="form-group mb-6">
                            <label class="text-gray-900 text-xl leading-tight font-medium mb-2">Stock minimale:</label>
                            <div  class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="exampleInput124"
                                 aria-describedby="emailHelp124">{{form.stockMin}}</div>
                        </div>
                    </div>


                </form>
            </div>

        </div> -->


    </AppLayout>
</template>
<script>
import {reactive} from 'vue'
import {Inertia} from '@inertiajs/inertia'
import {useForm, Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'


export default {
    props:{
        article:Object,


    },
    data(){
        return{
            showData:false,
            showData1:false
        }
    },
    setup(props) {
        const form = useForm({
            nom: props.article.nom,
            reference: props.article.reference,
            marque: props.article.marque,
            prixAchat: props.article.prixAchat,
            prixVente: props.article.prixVente,
            total: props.article.total,
            totalHtva: props.article.totalHtva,
            emplacement: props.article.emplacement,
            type: props.article.type,
            unite: props.article.unite,
            designation: props.article.designation,
            stockMin: props.article.stockMin,
            stockInit: props.article.stockInit,
            niveauStock: props.article.niveauStock,
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

