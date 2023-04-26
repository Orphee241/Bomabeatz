<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { Head } from "@inertiajs/inertia-vue3";

export default {
    components: {
        InertiaLink,
        Head

    }

}

</script>


<template>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">

                <h3 style="color: rgb(39, 19, 85); font-weight: 800; letter-spacing: -2.8px;" class=""><i
                        style="color: rgb(39, 19, 85); margin-right: -3px;" class="bx bxs-speaker"></i>omabeatz</h3>
            </a>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center justify-content-between">

                <li class="nav-item dropdown pe-3">
                    <InertiaLink class="nav-link  d-flex align-items-center " :href="route('home')">Accueil</InertiaLink>
                </li>
                <li class="nav-item dropdown pe-3">
                    <InertiaLink class="nav-link  d-flex align-items-center " :href="route('beats')">Beats</InertiaLink>
                </li>
                <li class="nav-item dropdown pe-3">
                    <InertiaLink class="nav-link  d-flex align-items-center pe-0" :href="route('pricing')">Vendre un Beat
                    </InertiaLink>
                </li>
                <li class="nav-item pe-3">
                    <InertiaLink class="nav-link  d-flex align-items-center pe-0" :href="route('vip')">VIP</InertiaLink>
                </li>
                <li class="nav-item dropdown pe-3">
                    <InertiaLink class="nav-link  d-flex align-items-center pe-0" :href="route('sellbeat')">Formations
                    </InertiaLink>
                </li>
                <li class="nav-item pe-3">
                    <InertiaLink class="nav-link  d-flex align-items-center pe-0" :href="route('signup')">S'inscrire
                    </InertiaLink>
                </li>
                <li class="nav-item pe-3">
                    <InertiaLink class="nav-link  d-flex align-items-center pe-0" :href="route('login')">Se connecter
                    </InertiaLink>
                </li>
                <li class="nav-item pe-3">
                    <InertiaLink class="nav-link  d-flex align-items-center pe-0" :href="route('contact')">Contact
                    </InertiaLink>
                </li>
                <li class="nav-item pe-3">
                    <InertiaLink class="nav-link  d-flex align-items-center pe-0" :href="route('about')">A propos
                    </InertiaLink>
                </li>

            </ul>
        </nav>
    </header>
    <div>
        <slot />
    </div>
    <!-- ======= Footer ======= -->
    <div class="foot container-fluid d-flex justify-content-center">
        <footer id="foote" class="footer">
            <div class="copyright">
                Copyright &copy; <strong><span>Bomabeatz</span></strong>. Tous droits réservés.
            </div>
            <div class="credits">
                Conception by <a href="https://gona241.vercel.app/">GONA</a>
        </div>
    </footer><!-- End Footer -->
</div></template>