import { createApp } from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import ToastService from 'primevue/toastservice';


createApp(App).use(store).use(router).use(ToastService).mount("#app");
