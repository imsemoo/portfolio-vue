import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

// استيراد Bootstrap CSS
import "bootstrap/dist/css/bootstrap.min.css";

// استيراد Bootstrap JavaScript
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import "@/assets/css/style.css";

createApp(App).use(store).use(router).mount("#app");
