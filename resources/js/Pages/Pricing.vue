
<template>
  <!-- ======= Pricing Section ======= -->
  <h1 v-if="isLoding" style="margin-top:5em">Chargement...</h1>
  <section v-else style="margin-top: 6em; margin-bottom: 6em; text-align: center;" class="pricing sections-bg">
    <div class="container" data-aos="fade-up">

      <Head title="Tarifs" />
      <div class="section-header">
        <h1></h1>
        <h2 style="color: rgb(39, 19, 85); font-weight: 800;">Tarifs</h2>
        <p>Nous vous donnons la possibilité de choisir parmi les packs suivants, celui qui vous convient.</p>
      </div>

      <div class="row g-4 py-lg-3" data-aos="zoom-out" data-aos-delay="100">

        <div class="col-lg-4">
          <div class="pricing-item">
            <h3 style="color: rgb(39, 19, 85); font-weight: 800;">Pack Libre</h3>
            <div class="icon">
              <i class="bi bi-box"></i>
            </div>
            <h4 style="color: rgb(39, 19, 85);">0<sup>XAF</sup><span> / mois</span></h4>
            <div class="ul">
              <li><i class="bi bi-check"></i> Vous pouvez uploader jusqu'à 15 beats</li>
              <li><i class="bi bi-check"></i> Bomabeatz perçoit 30% de comissions sur chaque beat vendu</li>
            </div>
            <div style="" class="text-center">
              <btn href="#" class="buy-btn " data-bs-toggle="modal" data-bs-target="#clozModal">Je choisis ce pack</btn>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="clozModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Veuillez confirmer le choix de ce pack</h5>
                  <button @click="closeModal" type="button" class="close">
                    <span class="bg-danger text-white px-2 pb-1 fw-bold rounded-1" aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formPacks" @submit.prevent="submitForm">
                    <div class="form-group mb-2">
                      <input v-model="pseudo" :required="true" :disabled="true" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                      <input v-model="pack" :disabled="true" class="form-control" type="text">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button @click="closeModal" type="button" class="btn btn-danger btn-sm "
                    data-dismiss="moda">fermer</button>
                  <button form="formPacks" type="submit" class="btn btn-success btn-sm">Je choisis ce pack</button>
                </div>
              </div>
            </div>
          </div>

          <!-- End Basic Modal-->

        </div><!-- End Pricing Item -->

        <div class="col-lg-4">
          <div class="pricing-item">
            <h3 style="color: rgb(39, 19, 85); font-weight: 800;">Pack Intermédiaire</h3>
            <div class="icon">
              <i class="bx bx-check-square"></i>
            </div>

            <h4 style="color: rgb(39, 19, 85);">5 000<sup>XAF</sup><span> / mois</span></h4>
            <div class="ul">
              <li><i class="bi bi-check"></i> Vous pouvez uploader jusqu'à 40 beats</li>
              <li><i class="bi bi-check"></i> Bomabeatz perçoit 20% de comissions sur chaque beat vendu</li>
            </div>
            <form @submit.prevent="payer">
              <input hidden v-model="form.amount" type="text">
              <input hidden v-model="form.reference" type="text">
              <input hidden v-model="form.portfeuille" type="text">
              <input hidden v-model="form.disbursement" type="text">
              <input hidden v-model="form.id" type="text">
              <input hidden v-model="form.redirect_success" type="text">
              <input hidden v-model="form.redirect_error" type="text">
              <button btn btn-primary type="submit">Payer</button>
            </form>
            <div class="text-center"><a href="https://gateway.singpay.ga/ext/v1/payment/141025315" class="buy-btn">Je
                choisis ce pack</a></div>
          </div>
        </div><!-- End Pricing Item -->

        <div class="col-lg-4">
          <div class="pricing-item">
            <h3 style="color: rgb(39, 19, 85); font-weight: 800;">Pack Pro</h3>
            <div class="icon">
              <i class="bi bi-send"></i>
            </div>
            <h4 style="color: rgb(39, 19, 85);">10 000<sup>XAF</sup><span> / mois</span></h4>
            <div class="ul">
              <li><i class="bi bi-check"></i> Vous pouvez uploader vos beats en illimité</li>
              <li><i class="bi bi-check"></i> Bomabeatz perçoit 10% de comissions sur chaque beat vendu</li>
            </div>
            <div class="text-center"><a href="#" class="buy-btn">Je choisis ce pack</a></div>
          </div>
        </div><!-- End Pricing Item -->

      </div>

    </div>
  </section>
  <!-- End Pricing Section -->
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
import { useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";
import { useSwalError } from "../Alerts/alert.js"
//import { usePage } from "@inertiajs/inertia-vue3";


const isLoading = ref(false);

/* const startLoading= ()=>{
  isLoading.value = true;
};

const stoptLoading= ()=>{
  isLoading.value = false;
};

const {Inertia} = usePage();

Inertia.on("start", startLoading);
Inertia.on("finish", stoptLoading);
Inertia.on("error", stoptLoading); */



const closeModal = () => {
  $("#clozModal").modal("hide");
  $(".modal-backdrop").hide();

}

defineProps({
  utilisateur: Object,
})

const form = useForm({
  amount: "50",
  portfeuille: "ng2666",
  reference: "ref" + Date.now(),
  disbursement: "64493cdca2980dcf7b3f5567",
  id: "5",
  redirect_success: "https://gona241.vercel.app",
  redirect_error: "http://bomabeatzz.test/notification"
})

const payer = () => {

  form.post(route("payment"), {
    onError: (errors) => {
      useSwalError(errors.msg)
    }
  })


}



</script>