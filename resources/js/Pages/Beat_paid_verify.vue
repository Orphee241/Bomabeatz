
<template>
    <Head>
        <title>{{ beat.nom }}</title>
    </Head>
    <div className="header2">
    </div>
    <div class="container">
        <h1>Hello</h1>
    </div>
    <form @submit.prevent="payer" id="payForm">
        <input hidden v-model="form.amount" type="text">
        <input hidden v-model="form.reference" type="text">
        <input hidden v-model="form.portfeuille" type="text">
        <input hidden v-model="form.disbursement" type="text">
        <input hidden v-model="form.id" type="text">
        <input hidden v-model="form.name_user" type="text">
        <input hidden v-model="form.beat_name" type="text">
        <input hidden v-model="form.redirect_success" type="text">
        <input hidden v-model="form.redirect_error" type="text">
        <input hidden v-model="form.id_user" type="text">
        <!-- <button btn btn-primary type="submit">Payer</button> -->
    </form>
</template>
  
<script>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Head, Link
    }
}

</script>

<!-- <script setup>
import { computed } from "vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { useSwalError } from "../Alerts/alert";

const props = defineProps({
    beat: Object,
})


const page = usePage();

const user = computed(() => page.props.value.flash.userLogged
)

const form = useForm({
    amount: "100",
    portfeuille: "ng2666",
    reference: "ref" + Date.now(),
    disbursement: "64493cdca2980dcf7b3f5567",
    id: "5",
    redirect_success: route("beat_paid", { id: props.beat.id }),
    redirect_error: "http://gonabeatz.test/notification",
    name_user: user,
    beat_name: props.beat.nom,
    id_user: props.beat.id
})


const payer = () => {

    form.post(route("payment"), {
        onError: (errors) => {
            useSwalError(errors.errorMsg)
        }
    })
}

</script> -->
