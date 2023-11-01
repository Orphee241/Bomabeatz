<template>
  <div class="container mt-5">
    <div v-if="$page.props.flash.successMsg">
       <!--  {{ useSwalError(errors.errorMsg) }} -->
      </div>
      <div style="margin-top:6em" class="block">
          <p>Pour continuer, veuillez cliquer sur le bouton ci-dessous s'il vous-plait</p>
          <button type="submit" form="payForm" class="btn btn-primary">Continuer</button>
      </div>

      
      <form @submit.prevent="payer" id="payForm">
        <input hidden v-model="form.reference" type="text" />

        <!-- <button btn btn-primary type="submit">Payer</button> -->
    </form>
  </div>
</template>

<script setup>
import { useSwalError, useSwalSuccess } from "../Alerts/alert";
import { useForm } from "@inertiajs/inertia-vue3";
/* import Gona from "../Layouts/Gona.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3"; */


const props = defineProps({
    paiement: Object,
})


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