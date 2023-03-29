<script setup>
  import Gona from "../Layouts/Gona.vue";

  import {InertiaLink} from "@inertiajs/inertia-vue3";

</script>

<script>
   export default{
    layout: Gona,
/*     props:{
      pageTitle: String
    } */
  }
</script>

<template>
    <div className="header2">
        <div className="container-fluid px-5">
        <h1 className="beats text-white">Beats</h1>
        </div>
        </div>
        <div className="container-fluid px-5">
        <h2 className="allbeats">Tous les beats</h2> 
        <div className="row">
            <div className="col-lg-3 col-md-4 col-sm-12 mt-4">
            <div className="col" key={article.id}>
              <div className="card border-0 p-0">
                <img src="" alt="">
                <div className="card-body p-0">
                  <p class="pt-2 my-0 fw-bold"></p>
                  <p class="p-0 my-0"></p>
                  <a href="#" class=" btn-primary"></a>
                </div>
              </div>
            </div>
            </div>
        </div>
      </div>
</template>