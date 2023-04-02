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

    <!-- ======= Pricing Section ======= -->
    <section style="margin-top: 6em; margin-bottom: 6em; text-align: center;"   class="pricing sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2 style="color: rgb(39, 19, 85); font-weight: 800;">Tarifs</h2>
          <p>Nous vous donnons la possibilité de choisir parmi les packs suivants, celui qui vous correspond.</p>
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
              <div class="text-center"><a href="#" class="buy-btn">Je choisis ce pack</a></div>
            </div>
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
              <div class="text-center"><a href="#" class="buy-btn">Je choisis ce pack</a></div>
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