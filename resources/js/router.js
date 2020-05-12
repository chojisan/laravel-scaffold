import Vue from "vue";
import Router from "vue-router";

Vue.use(Router);

export default new Router({
    linkExactActiveClass: "active",
    mode: "history",
    routes: [{
        path: '/',
    }]
});
