<template>
    <Head>
        <title>{{ beat.nom }}</title>
    </Head>
    <div className="header2"></div>
    <div style="width: " className="container-fluid px-5">
        <h1 style="margin-left: 1.8em" className="allbeats">Beat</h1>
        <div style class="container section1">
            <h2 style="color: rgb(39, 19, 85); font-weight: 700">
                {{ user }} Informations sur le beat
            </h2>
            <div style="margin-bottom: 14em" class="row">
                <div class="col-sm-3">
                    <div class="beatCard">
                        <div class="image">
                            <img src="../../../public/btm.png" />
                        </div>
                    </div>
                </div>
                <div class="beatInfos col-lg-3 col-sm-12">
                    <h5 class="beatInfosItem1">{{ beat.nom }}</h5>
                    <p class="beatInfosItem">
                        <i style="color: rgb(39, 19, 85)" class="bx bx-user"></i
                        >Beatmaker: {{ beat.beatmaker }}
                    </p>
                    <p class="beatInfosItem">
                        <i
                            style="color: rgb(39, 19, 85)"
                            class="bx bx-calendar"
                        ></i
                        >Publié: {{ beat.date }}
                    </p>
                    <p class="beatInfosItem">
                        <i style="color: rgb(39, 19, 85)" class="bx bx-euro"></i
                        >Prix: {{ beat.prix }} XAF
                    </p>
                    <p class="beatInfosItem">
                        <i style="color: rgb(39, 19, 85)" class="bx bx-file"></i
                        >Licence: {{ beat.licence }}
                    </p>

                    <div class="row">
                        <div
                            style="width: 122px"
                            class="col-lg-2 d-flex justify-content-between"
                        >
                            <div class="icon">
                                <i
                                    style="
                                        color: rgb(39, 19, 85);
                                        font-size: 24px;
                                    "
                                    class="bx bxs-heart"
                                    >5</i
                                >
                            </div>
                            <div class="icon ml-5">
                                <i
                                    style="
                                        color: rgb(39, 19, 85);
                                        font-size: 21px;
                                    "
                                    class="bx bxs-comment"
                                    >15</i
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ipsum odio excepturi fuga dolorem reprehenderit in totam
                        illum accusamus sed ipsa, aspernatur assumenda nulla?
                        Esse eveniet similique ducimus. Non, quo quae. Esse
                        eveniet similique ducimus. Non, quo quae. Esse eveniet
                        similique ducimus. Non, quo quae. Esse eveniet similique
                        ducimus. Non, quo quae.
                    </p>
                </div>
                <div style="width: 50%" class="row">
                    <div class="buttonSection col-lg-7">
 
                        <p>
                            <i
                                style="font-size: 50px"
                                class="play bx bx-play-circle"
                            ></i>
                        </p>
                    </div>
                    <!-- <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay
                        src="https://google.com">
                    </iframe> -->
                    <div v-if="beat.prix != 0" class="col-lg-4">
                        <button
                            type="submit"
                            :disabled="form.processing"
                            form="payForm"
                            style="
                                padding: 4px 15px;
                                background-color: rgb(39, 19, 85);
                                color: rgb(255, 255, 255);
                            "
                            class="btn btn-sm"
                        >
                            Acheter le beat
                        </button>
                    </div>
                    <div v-else class="col-lg-4">
                        <button
                            style="
                                padding: 4px 15px;
                                background-color: rgb(39, 19, 85);
                                color: rgb(255, 255, 255);
                            "
                            class="btn btn-sm"
                        >
                            Télécharger le beat
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form @submit.prevent="payer" id="payForm">
        <input hidden v-model="form.amount" type="text" />
        <input hidden v-model="form.reference" type="text" />
        <input hidden v-model="form.portfeuille" type="text" />
        <input hidden v-model="form.disbursement" type="text" />
        <input hidden v-model="form.id" type="text" />
        <input hidden v-model="form.name_user" type="text" />
        <input hidden v-model="form.beat_name" type="text" />
        <input hidden v-model="form.redirect_success" type="text" />
        <input hidden v-model="form.redirect_error" type="text" />
        <input hidden v-model="form.beat_id" type="text" />
        <input hidden v-model="form.utilisateur_id" type="text" />
        <!-- <button btn btn-primary type="submit">Payer</button> -->
    </form>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Head,
        Link,
    },
};
</script>

<script setup>
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
    redirect_success: route("verify"),
    redirect_error: "http://gonabeatz.test/notification",
    name_user: user,
    beat_name: props.beat.nom,
    beat_id: props.beat.id,
    utilisateur_id: props.beat.id_utilisateur
})


const payer = () => {

    form.post(route("payment"), {
        onError: (errors) => {
            useSwalError(errors.errorMsg)
        }
    })
}
</script>
