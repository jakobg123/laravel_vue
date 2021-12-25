import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes";
import App from "./components/Home";

Vue.use(VueRouter);

const app = new Vue({
    el: "#app",
    // components: {App}
    router: new VueRouter(routes)
})