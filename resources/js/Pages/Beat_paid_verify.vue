
<template>
    <Head>
        <title>gona</title>
    </Head>
    <div className="header2">
    </div>
    <div class="container verify">

        <p>Veuillez cliquez sur le bouton ci-dessous pour continuer. Vous serez redirigé vers la page de téléchargement du beat.    </p>
        <button style="background-color: rgb(39, 19, 85);" class="btn">Continuer</button>

        <form @submit.prevent="payer" id="payForm">

            <input hidden v-model="form.reference" type="text">

            <!-- <button btn btn-primary type="submit">Payer</button> -->


        </form>
    </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";




export default {
    components: {
        Head, Link
    }
}

</script>

<script setup>

const form = useForm({

    reference: "ref" + Date.now(),

})


const payer = () => {

    form.post(route("verify"), {
        onError: (errors) => {
            useSwalError(errors.errorMsg)
        }
    })
}


</script>
