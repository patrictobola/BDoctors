import { createApp } from "vue";
import chart from "./js/chart";
import "bootstrap/dist/css/bootstrap.min.css";
import { createRouter, createWebHistory } from "vue-router";
import App from "./App.vue";

import Main from "./components/Main.vue";
import ProfilePage from "./pages/ProfilePage.vue";

import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faStar as faSolidStar } from "@fortawesome/free-solid-svg-icons";
import { faStar as faRegularStar } from "@fortawesome/free-regular-svg-icons";
library.add(faSolidStar);
library.add(faRegularStar);

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: "/", name: "main", component: Main },
    { path: "/ginecologo", name: "ginecologo", component: Main },
    { path: "/ortopedico", name: "ortopedico", component: Main },
    { path: "/dermatologo", name: "dermatologo", component: Main },
    { path: "/nutrizionista", name: "nutrizionista", component: Main },
    { path: "/psicologo", name: "psicologo", component: Main },
    { path: "/oculista", name: "oculista", component: Main },
    { path: "/urologo", name: "urologo", component: Main },
    { path: "/otorino", name: "otorino", component: Main },
    { path: "/cardiologo", name: "cardiologo", component: Main },
    { path: "/dentista", name: "dentista", component: Main },
    { path: "/profiles/:id", name: "profile", component: ProfilePage },

    // { path: '/about', component: About },
  ], //provides routes options in an array
});

createApp(App)
  .use(router)
  .component("font-awesome-icon", FontAwesomeIcon)
  .mount("#app");
