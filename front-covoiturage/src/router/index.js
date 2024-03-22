import { createRouter, createWebHistory } from "vue-router";
import Landing  from "../components/HomePage/Landing.vue";


const routes = [
  
  {
    path: "/",
    name: "Landing",
    component: Landing,
  },
 
  {
    path: "/register",
    name: "register",
    component: function () {
      return import(/* webpackChunkName: "register" */ "../components//Register/RegisterView.vue");
    },
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
