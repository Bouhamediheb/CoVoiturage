import { createRouter, createWebHistory } from "vue-router";
import Landing  from "../components/HomePage/Landing.vue";
import ListRides from "../components/Rides/ListRides.vue";
import AddPref from "../components/Profile/AddPref.vue";
import Login from "../components/LoginSign/Login.vue";
import Signup from "../components/LoginSign/Signup.vue";

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
      return import("../components//Register/RegisterView.vue");
    },
  },
  {
    path: "/rides",
    name: "rides",
    component: ListRides,
  },
  {
    path: "/addpref",
    name: "addpref",
    component: AddPref,
  },
  {
    path: "/login",
    name: "login",
    component: Login,
  },
  {
    path: "/signup",
    name: "signup",
    component: Signup,
  }

];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
