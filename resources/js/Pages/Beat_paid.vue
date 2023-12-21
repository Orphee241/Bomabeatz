
<template>
    <Head>
        <title>{{ beat.nom }}</title>
    </Head>
    <div className="header2">
    </div>
    <div style="width:" className="container-fluid px-5">
        <h6 v-if="!(paiement.montant == null)" class="alert alert-success">Paiement effectué avec succès. {{ user }}, Vous pouver maintenant télécharger
            le beat
        </h6>
        <h6 v-else class="alert alert-danger">
            {{ user }} Vous n'avez pas encore effectué le paiement
        </h6>
        <h1 style="margin-left: 1.8em;" className="allbeats">Beat</h1>
        <div style class="container section1">
            <h2 style="color: rgb(39, 19, 85); font-weight: 700;">Informations sur le beat</h2>
            <div style="margin-bottom: 8em;" class="row">
                <div class="col-sm-3">
                    <div class="beatCard">
                        <div class="image">
                            <img src="../../../public/btm.png" />
                        </div>
                    </div>
                </div>
                <div class="beatInfos col-lg-3 col-sm-12">
                    <p class="beatInfosItem">Titre: {{ beat.nom }}</p>
                    <p class="beatInfosItem"><i style="color: rgb(39, 19, 85)" class="bx bx-user"></i>Beatmaker: {{
                        beat.beatmaker }}</p>
                    <p class="beatInfosItem"><i style="color: rgb(39, 19, 85)" class="bx bx-calendar"></i>Publié: {{
                        beat.date }}</p>
                    <p class="beatInfosItem"><i style="color: rgb(39, 19, 85)" class="bx bx-euro"></i>Prix: {{ beat.prix }}
                        XAF</p>
                    <p class="beatInfosItem"><i style="color: rgb(39, 19, 85)" class="bx bx-file"></i>Licence: {{
                        beat.licence }}</p>

                    <div class="row">
                        <div style="width: 122px;" class="col-lg-2 d-flex justify-content-between">
                            <div class="icon ">
                                <i style="color: rgb(39, 19, 85); font-size:24px" class="bx bxs-heart">5</i>
                            </div>
                            <div class="icon ml-5">
                                <i style="color: rgb(39, 19, 85); font-size:21px" class="bx bxs-comment">15</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="width: 75%;" class="row">
                    <!-- Si le beat est payant -->
                    <div v-if="beat.prix != 0" class="col-lg-12">
                        <!-- Si le paiement n'a pas été effectué -->
                        <div class="col-lg-5" v-if="paiement.montant == null">
                            <button disabled
                                style="background-color: rgb(174, 0, 0); color: white;" class="btn btn-small">
                                <i style="color: rgb(255, 255, 255);" class="bx bxs-lock">
                                 Payez pour télécharger le beat
                                </i>
                            </button>
                        </div>
                        <!-- S'il a été effectué -->
                        <div class="col-lg-5" v-else>
                            <a href="https://www.dropbox.com/scl/fi/w3ygdxrs2ea3codivdia8/formations_AGCOM_modif4.jpg?rlkey=3ujb62mwizm2zt1h7aed6vwn2&dl=0" 
                                style="background-color: rgb(39, 19, 85); color: white;" class="btn btn-small">Télécharger
                                le
                                beat au format mp3
                        </a>
                        </div>
                    </div>
                    <!-- Si le beat n'est pas payant -->
                    <div v-else class="col-lg-4">
                        <a class="btn btn-small"
                            style="padding: 4px 15px;background-color: rgb(39, 19, 85); color: rgb(255, 255, 255);" download
                            href="Eight.mp3">Télécharger le beat au format mp3 yes</a>

                    </div>
                </div>
                <form @submit.prevent="paiementInfos" id="payForm">
                    <input hidden v-model="form.amount" type="text">
                    <input hidden v-model="form.id_user" type="text">
                    <input hidden v-model="form.beat_name" type="text">
                    <!-- <button btn btn-primary type="submit">Payer</button> -->
                </form>
            </div>

        </div>
    </div>
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
<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import { useSwalError, useSwalSuccess } from "../Alerts/alert";

const props = defineProps({
    beat: Object,
    paiement: Object
})

const page = usePage();

const user = computed(() => {
    return page.props.value.flash.userLogged
})



const downloadFile = () => {
    const fileUrl = "Eight.mp3"
    const link = document.createElement("a")
    link.href = fileUrl
    link.download = "Eight.mp3"
    link.target = "_blank"
    link.click();
}


const form = useForm({
    amount: "100",
    reference: "ref" + Date.now(),
    name_user: user.pseudo,
    beat_name: props.beat.nom
})



const paiementInfos = () => {
    form.post(route("infos_payment", { id: props.beat.id }), {
        onError: (errors) => {
            useSwalError(errors.msg)
        }
    })

}


</script>
