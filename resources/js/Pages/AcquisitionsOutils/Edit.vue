

<template>

    <AppLayout title="AcquisitionOutil">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier Acquisition Outils
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
                            type="date"
                            label="Date"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.date"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="number"
                            label="Prix"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.prix"
                        />
                    </div>
                </div>
                <div class="mx-3 md:flex mb-6">
                    <div class="px-3 mb-6 md:mb-0">
                        <FormKit
                            type="date"
                            label="Periode"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.periode"
                        />
                    </div>
                    <div class="px-3">
                        <FormKit
                            type="select"
                            :options="{
                                mois: 'Mois',
                                jours: 'Jours',
                                ans: 'Ans',
                            }"
                            label="Periodicite"
                            label-class="block mb-2 font-bold text-sm"
                            inner-class="max-w-md border border-gray-400 rounded-lg mb-3 overflow-hidden focus-within:border-blue-500"
                            input-class="w-full h-10 px-3 border-none text-base text-gray-700 placeholder-gray-400"
                            v-model="form.periodicite"
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
    props:{
        acquisitionsOutils:Object,
    },
    methods: {
        submitHandler() {
            Inertia.post(route('acquisitionsoutils.update'), this.form);
        },
    },
    setup(props) {
        const form = useForm({
            date: "",
            prix: "",
            periode: "",
            periodicite: "",
        });
        return {form};
    },
    components: {Link, AppLayout, FormKit},
}
</script>
