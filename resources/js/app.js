import './bootstrap';
import "../css/app.css";


import '../assets/css/style.css';
import '../assets/js/main.js';
import '../assets/vendor/bootstrap/css/bootstrap.min.css';
import '../assets/vendor/bootstrap-icons/bootstrap-icons.css';
import '../assets/vendor/boxicons/css/boxicons.min.css';
/* import '../assets/vendor/quill/quill.snow.css';
import '../assets/vendor/quill.bubble.css'; */
import '../assets/vendor/remixicon/remixicon.css';
import '../assets/vendor/simple-datatables/style.css';
import '../assets/vendor/simple-datatables/style.css';

    /*Assets 2*/
import '../assets2/vendor/bootstrap/css/bootstrap.min.css';
import '../assets2/vendor/bootstrap-icons/bootstrap-icons.css';

import '../assets2/vendor/glightbox/css/glightbox.min.css';
import '../assets2/vendor/swiper/swiper-bundle.min.css';
import '../assets2/css/main.css';


import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import { InertiaProgress } from "@inertiajs/progress";
import Gona from "./Layouts/Gona.vue"

createInertiaApp({
  title: (title) => `${title} - Bomabeatz`,
  resolve: name => {

    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || Gona
    return page

  },
  setup({ el, app, props, plugin }) {
    return createApp({ render: () => h(app, props) })
      .use(plugin)
      .use(ZiggyVue, Ziggy)
      .mount(el);
  },
});

InertiaProgress.init({ color: "rgb(81, 0, 255)",   });