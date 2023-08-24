
<template>
  <Head title="Bienvenue sur notre plateforme" />
  <div className="banner container-fluid">
    <div className="bienvenu container">
      <div v-if="$page.props.flash.successMsg">
        {{ useSwalSuccess($page.props.flash.successMsg) }}
      </div>
      <h2 style="font-weight: 700;" className=" text-center">Bienvenue sur Gonabeatz</h2>
      <h3 className="text-center">La plateforme de l'heure.</h3>
      <h5 className="text-center">Gonabeatz est une plateforme musicale africaine où il est possible de télécharger
        gratuitement ou d'acheter des productions musicales de type instrumentale.</h5>
      <div className="callToAction">
        <Link :href="route('beats')" class="btn btn1">Je souhaite découvrir les beats</Link>
      </div>
    </div>
  </div>
  <!-- Corps -->

  <div class="container section1">
    <h2 style="color: rgb(39, 19, 85); font-weight: 800;"><i style="color: rgb(39, 19, 85)" class="bx bxs-speaker"></i>Les
      beats du moments</h2>
    <div class="row">

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

  <!-- Section 2 -->

  <div class="container section2">
    <h2 style="color: rgb(39, 19, 85); font-weight: 800;"><i style="color: rgb(39, 19, 85)"
        class="bx bxs-speaker"></i>Nouveaux beats</h2>
    <div class="row">

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

  <!-- Section 3 -->

  <!-- Section 4 -->

  <div className="container section4">
    <h2 style="color: rgb(39, 19, 85); font-weight: 800;"><i style="color: rgb(39, 19, 85)"
        class="bx bxs-crown"></i>Devenir VIP</h2>
    <div className="row">
      <div class="col-lg-12">
        <p>Devenez VIP et :</p>
        <p> - bénéficiez d'une réduction de 15% sur tous vos achats</p>
        <p> - écoutez tous les beats en entier avant de les acheter ou télécharger</p>
        <p>Alors qu'attendez-vous ?</p>
        <Link className="btn btn3" href="/beats">Je deviens VIP</Link>
      </div>
    </div>
  </div>

  <!-- Section 5 -->

  <div className="container section5">
    <h2 style="color: rgb(39, 19, 85); font-weight: 800;"><i style="color: rgb(39, 19, 85)" class="bx bxs-user"></i>Qui est GONA ?</h2>
    <div className="row">
      <p>Les beatmakers qui nous font confiance</p>
    </div>
    <div class="row">
      <div class="col-lg-5 mb-2">
        <!-- Slides with captions -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <!-- <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active rounded-3" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div> -->
          <div class="carousel-inner rounded-1">
            <div class="carousel-item active">
              <img src="../../../public/btm.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="" style="font-size: 16px; text-align: left;">GONA</h5>
                <p style="font-size: 12px; text-align: left; transform: translateY(-0.6em);">Beatmaker</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../../../public/btm.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5 style="font-size: 16px; text-align: left;">MAYCEDJ</h5>
                <p style="font-size: 12px; text-align: left; transform: translateY(-0.6em)">Beatmaker</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../../../public/btm.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5 style="font-size: 16px; text-align: left;">Dizy on track</h5>
                <p style="font-size: 12px; text-align: left; transform: translateY(-0.6em)">Beatmaker</p>
              </div>
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>

        </div>
        <!-- End Slides with captions -->
      </div>
      <div class="col-lg-7 flex align-items-center">
        <p class="text-justify">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. At expedita accusantium porro enim corporis ab officia
          saepe laborum, necessitatibus molestiae exercitationem dicta ad repellendus vitae fuga, cupiditate debitis
          repudiandae!
          Fuga libero dolor inventore atque perferendis consequuntur doloribus tempore accusantium amet perspiciatis,
          quasi, quaerat corporis quo consequatur dolores possimus dignissimos molestias nostrum, minus facilis quis?
          Eligendi sit aut dignissimos officiis.

        </p>
      </div>
    </div>
    <!--------------- Contact ----------------->
    <div class="row">
      <h2 style="color: rgb(39, 19, 85); font-weight: 800;"><i style="color: rgb(39, 19, 85)"
          class="bx bx-support"></i>Nous contacter</h2>
      <section class="section contact mb-5">
        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="info-box beatCard" style="width: 100%">
              <i class="bi bi-geo-alt"></i>
              <h3>Adresse</h3>
              <p>Essassa,<br>Ntoum, Estuaire</p>
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
  <!-- Footer -->
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
import { useSwalError, useSwalSuccess } from "../Alerts/alert";

defineProps({
  beats: Object,
})


</script>