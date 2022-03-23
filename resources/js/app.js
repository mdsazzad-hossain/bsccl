require("./bootstrap");

window.Vue = require("vue").default;

import routes from "./routes";

// vue router
import VueRouter from "vue-router";
Vue.use(VueRouter);

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

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

const router = new VueRouter({
    mode: "hash",
    routes,
});

new Vue({
    render: (h) => h("example-component"),
    router,
}).$mount("#app");
