require("./bootstrap");

window.Vue = require("vue").default;

import routes from "./routes";

// vue router
import VueRouter from "vue-router";
Vue.use(VueRouter);

Vue.component("app-component", require("./components/App.vue").default);

//sweetalert2
import Swal from "sweetalert2";
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

window.Swal = Swal;
window.Toast = Toast;

//vee-validator
import { ValidationProvider } from "vee-validate/dist/vee-validate.full.esm";
import { ValidationObserver } from "vee-validate";

Vue.component("ValidationProvider", ValidationProvider);
Vue.component("ValidationObserver", ValidationObserver);

const router = new VueRouter({
    mode: "history",
    routes,
});
new Vue({
    render: (h) => h("app-component"),
    router,
}).$mount("#app");
