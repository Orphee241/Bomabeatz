
<template>
  <Head title="Tous les beats" />
  <div className="header2">
  </div>
  <div className="container-fluid px-5">
    <h1 className="allbeats">Tous les beats</h1>
    <div style class="container section1">
      <h2 style="color: rgb(39, 19, 85); font-weight: 800;">Les beats du moments</h2>
      <div style="margin-bottom: 1.5em;" class="row">

        <div v-for="beat in beats" :key="beat.id" class="col-sm-3">
          <div class="beatCard">
            <div class="image">
              <img :src="`${beat.image}`" />
            </div>
            <div class="beatCard-in">
              <div style="padding: 0px; margin: 0;" class="head">
                <h3>{{ beat.nom }}</h3>
              </div>
              <div class="infos">
                <p><i style="color: rgb(39, 19, 85)" class="bx bx-euro"></i>Prix : <span style="font-weight: 700;">{{
                  beat.prix }} XAF</span></p>
                <div class="row">
                </div>
                <a href="#" ></a>
                
                <Link class="btn btn3" :href="route('beat_detail', {id : beat.id})">
                  <i style="color: rgb(39, 19, 85); font-size: 50px; transform: translateY(-6px); " class="bx bx-play-circle"></i></Link>
              </div>
            </div>
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
  beats: Object,
})

</script>