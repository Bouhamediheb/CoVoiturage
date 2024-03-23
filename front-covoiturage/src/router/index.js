import { createRouter, createWebHistory } from "vue-router";
import Landing  from "../components/HomePage/Landing.vue";
import ListRides from "../components/Rides/ListRides.vue";


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
  {
    path: "/rides",
    name: "rides",
    component: ListRides,
  
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
