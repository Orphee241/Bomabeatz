<script setup>
  import Gona from "../Layouts/Gona.vue";

  import {InertiaLink} from "@inertiajs/inertia-vue3";

</script>

<script>
   export default{
    layout: Gona,

  }
</script>

<template>

<main>
    <div class="container">

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

              <div style="border: 1px solid rgb(39, 19, 85);" class="card mb-3">

                <div class="card-body">

                  <div class="py-2">
                   
                  </div>

                  <form class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label style="color: rgb(39, 19, 85);" for="yourName" class="form-label">Pseudo</label>
                      <input style="border: 1px solid rgb(39, 19, 85);" type="text" name="name" class="form-control" id="yourName" required>
                    </div>

                    <div class="col-12">
                      <label style="color: rgb(39, 19, 85);" for="yourEmail" class="form-label">Email</label>
                      <input style="border: 1px solid rgb(39, 19, 85);" type="email" name="email" class="form-control" id="yourEmail" required>
                    </div>

                    <div class="col-12">
                      <label style="color: rgb(39, 19, 85);" for="yourPassword" class="form-label">Mot de passe</label>
                      <input style="border: 1px solid rgb(39, 19, 85);" type="password" name="pass" class="form-control" id="yourPassword" required>
                    </div>

                    <div class="col-12">
                      <label style="color: rgb(39, 19, 85);" for="yourPassword" class="form-label">Confirmer le mot de passe</label>
                      <input style="border: 1px solid rgb(39, 19, 85);" type="password" name="confirmPass" class="form-control" id="yourPassword" required>
                    </div>

                    <div class="col-12">
                      <button style="background-color: rgb(39, 19, 85); border: none;" class="btn btn-primary w-100" type="submit">Je crée mon compte</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"><a style="color: rgb(39, 19, 85);" :href="route('login')">J'ai déja un compte</a></p>
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