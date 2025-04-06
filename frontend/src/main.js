import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

// Import Bootstrap, jQuery, dan AdminLTE
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import "admin-lte/dist/css/adminlte.min.css";
import "admin-lte/dist/js/adminlte.min.js";
import "jquery/dist/jquery.min.js";

const app = createApp(App);

app.use(router);

app.mount("#app");
