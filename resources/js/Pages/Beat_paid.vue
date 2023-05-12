
<template>
    <Head>
        <title>{{ beat.nom }}</title>
    </Head>
    <div className="header2">
    </div>
    <div style="width:" className="container-fluid px-5">
        <h6 class="alert alert-success">Paiement effectué avec succès. Vous pouver maintenant télécharger le beat</h6>
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
                    <div v-if="beat.prix != 0" class="col-lg-5">
                        <button @click="downloadFile" style="background-color: rgb(39, 19, 85); color: white;" class="btn btn-small">Télécharger le beat au format mp3</button>
                    </div>
                    <div v-else class="col-lg-4">
                        <a class="btn btn-small"
                            style="padding: 4px 15px;background-color: rgb(39, 19, 85); color: rgb(255, 255, 255);" download
                            href="../../../public/Eight.mp3">Télécharger le beat au format mp3</a>

                    </div>
                </div>
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

defineProps({
    beat: Object,
})


const downloadFile = () => {
    const fileUrl = "/public/btm.png"
    const link = document.createElement("a")
    link.href = fileUrl
    link.download = "btm.png"
    link.target = "_blank"
    link.click();
}


</script>
