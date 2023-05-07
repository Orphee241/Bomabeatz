

<template>
  <Head title="Connexion" />
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="connexion col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-2">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">

                </a>
                <h2 style="color: rgb(39, 19, 85); font-weight: 800; margin-bottom: 0.8em;">Connexion</h2>
              </div><!-- End Logo -->

              <div style="border: 3px solid rgb(39, 19, 85);" class="card mb-3">

                <div class="card-body">

                  <div class="pt-0 pb-0">
                    <h5 style="color: rgb(39, 19, 85);" class="card-title text-center pb-0 fs-4">Connectez-vous</h5>
                  </div>

                  <form @submit.prevent="validate" class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label style="color: rgb(39, 19, 85);" for="email" class="form-label">Email</label>
                      <input :class="{ 'is-invalid': form.errors.email }" v-model="form.email" type="email" name="email"
                        class="form-control" id="yourEmail" required>
                      <!--  -->
                    </div> 

                    <div class="col-12">
                      <label style="color: rgb(39, 19, 85);" for="password" class="form-label">Mot de passe</label>
                      <input :class="{ 'is-invalid': form.errors.password}" v-model="form.password" type="password"
                        name="password" class="form-control" id="yourPassword" required>
                      
                    </div>

                    <div class="col-12">
                      <button style="background-color: rgb(39, 19, 85); border: none;" class="btn btn-primary w-100"
                        type="submit">Je me connecte</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">
                        <Link style="color: rgb(39, 19, 85);" :href="route('signup')">Je n'ai pas encore de compte</Link>
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
import { Head } from "@inertiajs/inertia-vue3";


export default {
  components: {
    Head
  }

}
</script>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { useSwalError, useSwalSuccess } from "../Alerts/alert";

const form = useForm({
  email: "",
  password: "",
})

const validate = () => {
  form.post(route("authentikate"), {
    onSuccess: (page)=>{
      useSwalSuccess("Vous êtes connecté")
    },
    onError: (errors) => {
      if (errors.email) {
        useSwalError(errors.email)
      }
      else if(errors.password) {
        useSwalError(errors.password)
      }
      else if(errors.errorMsg) {
        useSwalError(errors.errorMsg)
      }

    }
  })
}

</script>
