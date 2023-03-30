<script setup>
  import Gona from "../Layouts/Gona.vue";
  import {InertiaLink} from "@inertiajs/inertia-vue3";

  defineProps({
      beatmakers: Object,
    });

</script>

<script>
   export default {
    layout: Gona,
   

  }  
</script>

<template>
      <div className="banner container-fluid">
        <div className="bienvenu container">
          <h1 style="font-weight: 700;" className=" text-center">Bienvenue sur Bomabeatz</h1>
          <h3 className="text-center">La plateforme qui te permet d'acheter ou de vendre ton beat.</h3>
          <h5 className="text-center">Bomabeatz est une plateforme musicale africaine où il est possible de télécharger gratuitement, d'acheter ou de vendre ses productions musicales.</h5>
          <div className="callToAction">
          <InertiaLink :href="route('beats')" class="btn btn1">Je souhaite découvrir les beats</InertiaLink>
            <InertiaLink :href="route('sellbeat')" class="btn btn2">Je souhaite vendre des beats</InertiaLink>
          </div>
        </div>
      </div>
        <!-- Corps -->

        <div class="container section1">
          <h2 style="color: rgb(39, 19, 85); font-weight: 800;">Les beats du moments</h2>
          <div class="row">
        
          <div class="col-sm-3">
            <div class="beatCard">
              <div class="image">
                <img src="../../../public/btm.png" />
              </div>
              <div class="beatCard-inner">
                <div style="padding: 0px; margin: 0;" class="header">
                  <h3 >OKLM au Qwat</h3>
                </div>
                <div class="content">
                  <p>Licence : F</p>
                  <p>Prix : Gratuit</p>
                  <p>Beatmaker : GONA</p>
                  <p>Publié le : 15/01/2023</p>
                  <a href="#" class=" btn btn3">Ecouter</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="beatCard">
              <div class="image">
                <img src="../../../public/btm.png" />
              </div>
              <div class="beatCard-inner">
                <div style="padding: 0px; margin: 0;" class="header">
                  <h3>OKLM au Qwat</h3>
                </div>
                <div class="content">
                  <p>Licence : F</p>
                  <p>Prix : Gratuit</p>
                  <p>Beatmaker : GONA</p>
                  <p>Publié le : 15/01/2023</p>
                  <InertiaLink href="#" class=" btn btn3">Ecouter</InertiaLink>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="beatCard">
              <div class="image">
                <img src="../../../public/btm.png" />
              </div>
              <div class="beatCard-inner">
                <div style="padding: 0px; margin: 0;" class="header">
                  <h3>OKLM au Qwat</h3>
                </div>
                <div class="content">
                  <p>Licence : F</p>
                  <p>Prix : Gratuit</p>
                  <p>Beatmaker : GONA</p>
                  <p>Publié le : 15/01/2023</p>
                  <InertiaLink href="#" class=" btn btn3">Ecouter</InertiaLink>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="beatCard">
              <div class="image">
                <img src="../../../public/btm.png" />
              </div>
              <div class="beatCard-inner">
                <div style="padding: 0px; margin: 0;" class="header">
                  <h3>OKLM au Qwat</h3>
                </div>
                <div class="content">
                  <p>Licence : F</p>
                  <p>Prix : Gratuit</p>
                  <p>Beatmaker : GONA</p>
                  <p>Publié le : 15/01/2023</p>
                  <InertiaLink href="#" class=" btn btn3">Ecouter</InertiaLink>
                </div>
              </div>
            </div>
          </div>

        </div>
        </div>

        <!-- Section 2 -->

        <div class="container section2">
          <h2 style="color: rgb(39, 19, 85); font-weight: 800;">Nouveaux beats</h2>
          <div class="row">
        
        <div class="col-sm-3">
          <div class="beatCard">
            <div class="image">
              <img src="../../../public/btm.png" />
            </div>
            <div class="beatCard-inner">
              <div class="header">
                <h3>OKLM au Qwat</h3>
              </div>
              <div class="content">
                <p>Licence : F</p>
                <p>Prix : Gratuit</p>
                <p>Beatmaker : GONA</p>
                <p>Publié le : 15/01/2023</p>
                <InertiaLink href="#" class=" btn btn3">Ecouter</InertiaLink>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="beatCard">
            <div class="image">
              <img src="../../../public/btm.png" />
            </div>
            <div class="beatCard-inner">
              <div class="header">
                <h3>OKLM au Qwat</h3>
              </div>
              <div class="content">
                <p>Licence : F</p>
                <p>Prix : Gratuit</p>
                <p>Beatmaker : GONA</p>
                <p>Publié le : 15/01/2023</p>
                <InertiaLink href="#" class=" btn btn3">Ecouter</InertiaLink>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="beatCard">
            <div class="image">
              <img src="../../../public/btm.png" />
            </div>
            <div class="beatCard-inner">
              <div class="header">
                <h3>OKLM au Qwat</h3>
              </div>
              <div class="content">
                <p>Licence : F</p>
                <p>Prix : Gratuit</p>
                <p>Beatmaker : GONA</p>
                <p>Publié le : 15/01/2023</p>
                <InertiaLink href="#" class=" btn btn3">Ecouter</InertiaLink>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="beatCard">
            <div class="image">
              <img src="../../../public/btm.png" />
            </div>
            <div class="beatCard-inner">
              <div class="header">
                <h3>OKLM au Qwat</h3>
              </div>
              <div class="content">
                <p>Licence : F</p>
                <p>Prix : Gratuit</p>
                <p>Beatmaker : GONA</p>
                <p>Publié le : 15/01/2023</p>
                <InertiaLink href="#" class=" btn btn3">Ecouter</InertiaLink>
              </div>
            </div>
          </div>
        </div>

          </div>
        </div>

        <!-- Section 3 -->

        <div class="container section3">
          <div class="row">
            <h2 style="color: rgb(39, 19, 85); font-weight: 800;">Je suis beatmaker/producteur</h2>
            <div class="col-lg-8">
            <p><strong>Bomabeatz</strong> vous donne la possibilité de <strong>vendre vos beats</strong> (instrumentales). <br>
              Vous êtes un <strong> beatmaker, un producteur </strong> de musique ? <br> Sachez que vous êtes au
              bon endroit. <br> 
            </p>
            <p>
              Vous percevez jusqu'à <strong>90%</strong> de chacune de vos ventes. <br>
              En effet, Bomabeatz perçoit <strong>10%</strong> sur chacune de vos ventes et vous reverse le reste.
            </p>
            <p>Si vous êtes intéressé, rejoignez-nous.</p>
            <InertiaLink class="btn3" href="/beats">Je vend mes beats sur Bomabeatz</InertiaLink>
          </div>
          <div class="col-lg-4">
            <p>
              <img class="img rounded-3 " style="width: 300px;" src="../../../public/beatmaker.png" alt="">
            </p>
          </div>
          </div>
        </div>

        <!-- Section 4 -->

        <div className="container section4">
          <h2 style="color: rgb(39, 19, 85); font-weight: 800;">Devenir VIP</h2>
          <div className="row">
            <div class="col-lg-12">
            <p>Devenez VIP et :</p>
            <p> - bénéficiez d'une réduction de 15% sur tous vos achats</p>
            <p> - écoutez tous les beats en entier avant de les acheter ou télécharger</p>
            <p>Alors qu'attendez-vous ?</p>
            <InertiaLink className="btn btn3" href="/beats">Je deviens VIP</InertiaLink>
          </div>
          </div>
        </div>

        <!-- Section 5 -->

        <div className="container section5">
          <h2 style="color: rgb(39, 19, 85); font-weight: 800;">Top beatmakers</h2>
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

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>

              </div>
              <!-- End Slides with captions -->
              </div>
              <div class="col-lg-7 flex align-items-center">
                <p class="text-justify">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. At expedita accusantium porro enim corporis ab officia saepe laborum, necessitatibus molestiae exercitationem dicta ad repellendus vitae fuga, cupiditate debitis repudiandae!
                  Fuga libero dolor inventore atque perferendis consequuntur doloribus tempore accusantium amet perspiciatis, quasi, quaerat corporis quo consequatur dolores possimus dignissimos molestias nostrum, minus facilis quis? Eligendi sit aut dignissimos officiis.
                  
                </p>
              </div>
          </div>
          <!--------------- Contact ----------------->
          <div class="row">
            <h2 style="color: rgb(39, 19, 85); font-weight: 800;">Nous contacter</h2>
          <section class="section contact mb-5">
          <div class="row gy-4">
            <div class="col-lg-6" >
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
        <!-- Footer -->
</template>