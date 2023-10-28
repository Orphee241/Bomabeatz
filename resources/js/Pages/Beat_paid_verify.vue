

<template>
    <div class="container-fluid ">
      <div class="container contact">
  
        <Head title="Contactez-nous" />
        <h2 style="font-weight: 700; color: rgb(39, 19, 85); margin-top: 1em;"><i style="color: rgb(39, 19, 85)"
            class="bx bx-support"></i>Contactez-nous</h2>
        <!--------------- Contact ----------------->
        <div class="row ">
          <section class="section mb-5">
            <div class="row gy-4">
              <div class="col-lg-6">
                <div class="info-box beatCard" style="width: 100%">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Adresse</h3>
                  <p>Essassa,<br>Ntoum, Estauaire</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info-box beatCard" style="width: 100%">
                  <i class="bi bi-telephone"></i>
                  <h3>Appel</h3>
                  <p>+24177187894<br>+24162102805</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info-box beatCard" style="width: 100%">
                  <i class="bi bi-envelope"></i>
                  <h3>Email</h3>
                  <p><a href="mailto:contact@Bomabeatz.com">Envoyez-nous un email</a></p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info-box beatCard" style="width: 100%">
                  <i class="bi bi-whatsapp"></i>
                  <h3>Whatsapp</h3>
                  <p style="color: #4154f1"><a href="https://wa.me/+24177187894">Rejoignez-nous sur Whatsapp</a></p>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import Gona from "../Layouts/Gona.vue";
  import { Head } from "@inertiajs/inertia-vue3";
  import { Link } from "@inertiajs/inertia-vue3";
  
  
  export default {
    props: {
      beatmakers: Object,
    },
    layout: Gona,
    components: {
      Head, Link
    }
  }
  
  </script>