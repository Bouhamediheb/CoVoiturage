import { createRouter, createWebHistory } from "vue-router";
import Landing  from "../components/HomePage/Landing.vue";
import ListRides from "../components/Rides/ListRides.vue";
import AddPref from "../components/Profile/AddPref.vue";
import Login from "../components/LoginSign/Login.vue";
import Signup from "../components/LoginSign/Signup.vue";
import Contact from "../components/Generic/Contact.vue";
import Terms from "../components/Generic/TermsOfUse.vue";
import About from "../components/Generic/About.vue"

const isAuthenticated = () => {
  if (localStorage.getItem("token")) {
    return true;
  } else {
    return false;
  }
}


const routes = [ 
  {
    path: "/",
    name: "Landing",
    component: Landing,
    
    
  },
  {
    path: "/register",
    name: "register",
    component: Signup,
    //block if user is authenticated
    beforeEnter: (to, from, next) => {
      if (isAuthenticated()) {
        next({ name: "Landing" });
      } else {
        next();
      }
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
        beforeEnter: (to, from, next) => {
          if (isAuthenticated()) {
            next();
          } else {
            next({ name: "login" });
          }
        },


  },
  {
    path: "/login",
    name: "login",
    component: Login,
    beforeEnter: (to, from, next) => {
      if (isAuthenticated()) {
        next({ name: "Landing" });
      } else {
        next();
      }
    },
  },
  {
    path: "/signup",
    name: "signup",
    component: Signup,
    beforeEnter: (to, from, next) => {
      if (isAuthenticated()) {
        next({ name: "Landing" });
      } else {
        next();
      }
    },
  },
  {
    path: "/contact",
    name: "contact",
    component: Contact,
  },
  {
    path: "/terms",
    name: "terms",
    component: Terms,
  },
  {
    path: "/about",
    name: "about",
    component: About,
  },
  {
    path: "/:pathMatch(.*)*",
    redirect: "/",
  },

  

];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
