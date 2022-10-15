import "./bootstrap";
import "./dashboard";
import "../../node_modules/bootstrap/dist/js/bootstrap.min";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faUserSecret } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

import { fas } from "@fortawesome/free-solid-svg-icons";
import { far } from "@fortawesome/free-regular-svg-icons";
import { fab } from "@fortawesome/free-brands-svg-icons";

// import App from './App.vue';
import router from "./router";
// import { createApp } from 'vue'
import { createApp } from "vue/dist/vue.esm-bundler.js";
import { useToastr } from "./toastr";
import Pagination from "./components/partials/PaginationComponent.vue";
library.add(faUserSecret, fas, far, fab);

const app = createApp({});
// const app_home = createApp(App);
const toastr = useToastr();

app.component("pagination", Pagination);
app.component("font-awesome-icon", FontAwesomeIcon);
app.use(toastr);
app.use(router);

app.mount("#app");
