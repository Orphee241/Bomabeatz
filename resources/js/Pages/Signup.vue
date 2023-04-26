
<template>
  <main disabled>
    <div class="container">

      <Head title="Inscription" />
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="inscription col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-2">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">

                </a>
                <h2 style="color: rgb(39, 19, 85); font-weight: 800; margin-bottom: 0.4em;">Inscription</h2>
              </div><!-- End Logo -->

              <div style="border: 3px solid rgb(39, 19, 85);" class="card mb-3">

                <div class="card-body">

                  <div class="py-2">

                  </div>

                  <form @submit.prevent="submitForm" class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label style="color: rgb(39, 19, 85);" for="pseudo" class="form-label">Pseudo</label>
                      <input :class="{ 'is-invalid': psdError != '' }" v-model="psd" type="text" name="psd"
                        class="form-control" id="yourName" required>
                      <span style="line-height: 0px; margin: 0; padding: 0;" v-if="psdError != ''" class="text-danger">{{
                        psdError }}</span>
                    </div>

                    <div class="col-12">
                      <label style="color: rgb(39, 19, 85);" for="email" class="form-label">Email</label>
                      <input :class="{ 'is-invalid': mailError != '' }" v-model="mail" type="email" name="email"
                        class="form-control" id="yourEmail" required>
                      <span style="line-height: 0px; margin: 0; padding: 0;" v-if="mailError != ''" class="text-danger">{{
                        mailError }}</span>
                    </div>

                    <div class="col-sm-12">
                      <label style="color: rgb(39, 19, 85);" class=" col-form-label">Statut</label>
                      <select :class="{ 'is-invalid': statuError != '' }" v-model="statu" name="statut"
                        class="form-select" aria-label="Default select example">
                        <option selected disabled>Vous êtes...</option>
                        <option value="1">Artiste</option>
                        <option value="2">Beatmaker</option>
                      </select>
                      <span style="line-height: 0px; margin: 0; padding: 0;" v-if="statuError != ''"
                        class="text-danger">{{ statuError }}</span>
                    </div>

                    <div class="col-12">
                      <label style="color: rgb(39, 19, 85);" for="password" class="form-label">Mot de passe</label>
                      <input :class="{ 'is-invalid': passError != '' }" v-model="pass" type="password" name="password"
                        class="form-control" id="yourPassword" required>
                      <span style="line-height: 0px; margin: 0; padding: 0;" v-if="passError != ''" class="text-danger">{{
                        passError }}</span>
                    </div>

                    <div class="col-12">
                      <label style="color: rgb(39, 19, 85);" for="password_confirm" class="form-label">Confirmer le mot de
                        passe</label>
                      <input :class="{ 'is-invalid': pass_confirmError != '' }" v-model="pass_confirm" type="password"
                        name="password_confirm" class="form-control" id="" required>
                      <span style="line-height: 0px; margin: 0; padding: 0;" v-if="pass_confirmError != ''"
                        class="text-danger">{{ pass_confirmError }}</span>
                    </div>

                    <div class="col-12">
                      <button style="background-color: rgb(39, 19, 85); border: none;" class="btn btn-primary w-100"
                        type="submit">Je crée mon compte</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">
                        <Link style="color: rgb(39, 19, 85);" :href="route('login')">J'ai déja un compte</Link>
                      </p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Head, Link
  },

}
</script>

<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { useSwalSuccess, useSwalError } from "../Alerts/alert";

const psd = ref("")
const mail = ref("")
const statu = ref("")
const pass = ref("")
const pass_confirm = ref("")

const psdError = ref("")
const mailError = ref("")
const statuError = ref("")
const passError = ref("")
const pass_confirmError = ref("")

const submitForm = () => {
  const pseudo = psd.value
  const email = mail.value
  const statut = statu.value
  const password = pass.value
  const password_confirm = pass_confirm.value

  const url = route("user_signup")

  Inertia.post(url, {
    pseudo, email, statut, password, password_confirm
  },
    {
      onSuccess: (page) => {

        useSwalSuccess("Votre compte a été crée avec succès")

      },
      onError: (errors) => {
        //useSwalError("Une erreur s'est produite, veuillez réessayer")
        if (errors.pseudo != '' && errors.email != '' && errors.statut != '' && errors.password != '' && errors.password2 != '') {
          psdError.value = errors.pseudo
          mailError.value = errors.email
          statuError.value = errors.statut
          passError.value = errors.password
          pass_confirmError.value = errors.password_confirm

          useSwalError("Une erreur s'est produite")

        }

      }

    })
}


</script>
