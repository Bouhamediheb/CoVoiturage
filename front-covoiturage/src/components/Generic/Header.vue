<template>
  <head>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <header>
    <div class="container">
      <div class="col6">
        <a href="#" class="logo">
          <img
            src="../../assets/img/logo.jpeg"
            alt="CoVoiturage"
            style="width: 70px; height: 80px"
            class="pt-3"
          />
        </a>
      </div>

      <div class="col6">
        <ul class="topnav mt-2">
          <li v-if="!isLogged">
            <router-link to="/login">
              <button class="btn-r">Sign In</button>
            </router-link>

            <span class="ml-4"></span>
            <router-link to="/register">
              <button class="btn-r">Ride With Us</button>
            </router-link>
          </li>

          <li v-else>
            <div class="row">
              <div class="dropdown">
                <a
                  class="dropdown-toggle"
                  id="dropdownMenuButton"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="ml-4">Hello , {{ nom }} {{ prenom }}</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <router-link to="/addpref" class="dropdown-item"
                    >Add preferences</router-link
                  >
                  <router-link to="/history" class="dropdown-item"
                    >History</router-link
                  >
                  <router-link
                    to="/logout"
                    class="dropdown-item"
                    @click="logout"
                    >Logout</router-link
                  >
                </div>
              </div>
              <span class="mx-2"></span>
              <!-- Button -->
              <div v-if="activeRides.length !== 0">
                <button
                  class="car-button"
                  :class="{
                    'blink-red': blinkingRed,
                    'blink-grey': blinkingGrey,
                  }"
                  @click="showModal = true"
                  style="background: none; border: none; cursor: pointer"
                >
                  <i class="fa fa-taxi"></i>
                </button>
                <Teleport to="body">
                  <!-- use the modal component, pass in the prop -->
                  <modal
                    :show="showModal"
                    :rides="activeRides"
                    @close="showModal = false"
                  >
                    <template #header>
                      <h3>Pending Rides</h3>
                    </template>
                  </modal>
                </Teleport>
              </div>
            </div>
          </li>
        </ul>
      </div>

      <div class="clearfix"></div>
    </div>

    <div class="header-bottom">
      <div class="container">
        <ul class="bottomnav">
          <router-link to="/">
            <li class="active">
              <a href="#"><i class="fa fa-home"></i> Home</a>
            </li>
          </router-link>
          <router-link to="/terms">
            <li>
              <a href="#"><i class="fa fa-gear"></i> Our Terms of use</a>
            </li>
          </router-link>
          <router-link to="/contact">
            <li>
              <a href="#"><i class="fa fa-map-marker"></i> Contact</a>
            </li>
          </router-link>
          <router-link to="/about">
            <li>
              <a href="#"><i class="fa fa-exclamation-circle"></i> About</a>
            </li>
          </router-link>
        </ul>
        <router-link to="/publish">
          <button class="b-btn">Become a Driver</button>
        </router-link>
        <div class="clearfix"></div>
      </div>
    </div>
  </header>
</template>



<style>
.car-button {
  font-size: 18px;
  position: relative;
}

.blink-red {
  color: red;
}

.blink-grey {
  color: grey;
}

.blink-red,
.blink-grey {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}

.modal {
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.4);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  background-color: #fefefe;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

:root {
  --yellow: #ebb14d;
  --darkblue: #3a3c6c;
  --light: #cfd8ef;
  --white: #fff;
}

* {
  margin: 0px;
  padding: 0px;
  font-family: system-ui;
}

.clearfix {
  clear: both;
}

header {
  padding: 10px 0px 0px 0px;
}

.container {
  width: 1200px;
  max-width: 100%;
  margin: 0 auto;
}

.col2 {
  width: 20%;
  float: left;
}

.col3 {
  width: 25%;
  float: left;
}

.col4 {
  width: 33.3%;
  float: left;
}

.col6 {
  width: 50%;
  float: left;
}

.input-box {
  display: inline-block;
  padding: 10px 18px;
  border: 1px solid #ddd;
  margin-left: 60px;
  width: 300px;
}

.input-box input {
  border: none;
  padding-left: 15px;
  outline: none;
  width: 82%;
}

.logo {
  display: block;
  float: left;
}

.s-btn {
  height: 45px;
  width: 52px;
  margin: -11px;
  background: #3a3c6c;
  color: white;
  border: none;
  margin-right: -20px;
  cursor: pointer;
}

.s-btn:hover {
  background: #ebb14d;
  color: #3a3c6c;
}

.topnav li {
  list-style: none;
  float: left;
  padding: 15px 20px;
}

.topnav li a {
  text-decoration: none;
  color: #3a3c6c;
}

.btn-r {
  padding: 11px 25px;
  background: #3a3c6c;
  color: white;
  border: none;
  margin-top: -16px;
  font-size: 15px;
  cursor: pointer;
}

.btn-r:hover {
  background: #ebb14d;
  color: #3a3c6c;
}

.topnav {
  float: right;
}

.topnav li a:hover {
  color: #ebb14d;
}

.header-bottom {
  background: #3a3c6c;
}

.bottomnav li {
  list-style: none;
  float: left;
  padding: 13px 30px;
}

.bottomnav li a {
  text-decoration: none;
  color: #fff;
  font-weight: 200;
}

.active {
  background: #ebb14d;
}

.active a {
  color: #3a3c6c !important;
}

.b-btn {
  padding: 13px 25px;
  background: #ebb14d;
  color: white;
  border: none;
  font-size: 16px;
  float: right;
  margin-right: 20px;
  cursor: pointer;
}

.taxi-img {
  width: 100%;
}

.sec-1 {
  padding: 50px 0px 0px 0px;
  height: 280px;
  background: linear-gradient(#cfd8ef, #fff);
}

.heading {
  font-size: 50px;
  color: #3a3c6c;
}

.sec-2 {
  margin-top: 3%;
  padding: 100px 0px;
}

.heading-2 {
  color: #3a3c6c;
  text-align: center;
}

.border {
  text-align: center;
  margin-bottom: 50px;
}

.box {
  width: 200px;
  text-align: center;
}

.sec-4 {
  padding: 100px 0px;
}

.box h3 {
  font-size: 15px;
  color: #3a3c6c;
  margin: 15px 0px;
  font-weight: 500;
}

.box p {
  font-size: 13px;
  letter-spacing: 1px;
  line-height: 20px;
}

.icon-1 {
  font-size: 30px;
  background: #ecb34c;
  border-radius: 33px;
  color: #3a3c6c;
  height: 60px;
  width: 60px;
  line-height: 60px;
}

.heading-3 {
  color: #3a3c6c;
}

.p3 {
  font-size: 13px;
  letter-spacing: 1px;
  line-height: 20px;
  width: 500px;
}

.p5 {
  font-size: 13px;
  letter-spacing: 1px;
  line-height: 20px;
  color: #fff;
}

.p5:after {
  content: "";
  position: absolute;
  top: 75%;
  right: 5%;
  width: 50px;
  height: 50px;
  background-size: 50px;
  transform: rotateZ(184deg);
}

.content {
  float: left;
  padding: 41px;
}

.sec-5 {
  background: #3a3c6c;
  padding: 100px 0px;
  position: relative;
  height: 150px;
  margin-top: -100px;
}

.footer-distributed {
  background-color: #3a3c6c;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
  box-sizing: border-box;
  width: 100%;
  text-align: left;
  font: normal 16px sans-serif;
  padding: 45px 50px;
}

.footer-distributed .footer-left p {
  color: #fff;
  font-size: 14px;
  margin: 0;
}

.footer-distributed p.footer-links {
  font-size: 18px;
  font-weight: bold;
  color: #ffffff;
  margin: 0 0 10px;
  padding: 0;
  transition: ease 0.25s;
}

.footer-distributed p.footer-links a {
  display: inline-block;
  line-height: 1.8;
  text-decoration: none;
  color: inherit;
  transition: ease 0.25s;
}

.footer-distributed .footer-links a:before {
  content: "/";
  font-size: 10px;
  left: 0;
  color: #fff;
  display: inline-block;
  padding-right: 5px;
}

.footer-distributed .footer-links .link-1:before {
  content: none;
}

.footer-distributed .footer-right {
  float: right;
  margin-top: 6px;
  max-width: 180px;
}

.footer-distributed .footer-right a {
  display: inline-block;
  width: 35px;
  height: 35px;
  background-color: #ebb14d;
  border-radius: 2px;
  font-size: 20px;
  color: #3a3c6c;
  text-align: center;
  line-height: 35px;
  margin-left: 3px;
  transition: all 0.25s;
}

.footer-distributed .footer-right a:hover {
  transform: scale(1.1);
}

.footer-distributed p.footer-links a:hover {
  text-decoration: underline;
}
</style>

<script setup>
import { ref, onBeforeUnmount, onMounted } from "vue";
import Modal from "./Modal.vue";
import axios from "axios";

const blinkingRed = ref(true);
const blinkingGrey = ref(false);

const intervalId = setInterval(() => {
  blinkingRed.value = !blinkingRed.value;
  blinkingGrey.value = !blinkingGrey.value;
}, 500); // Change blinking speed as needed

onBeforeUnmount(() => {
  clearInterval(intervalId);
});

const showModal = ref(false);
const activeRides = ref([]);
const userId = localStorage.getItem("user_id");

const checkActiveRide = () => {
  if (localStorage.getItem("user_id")) {
    const response = axios
      .get(`http://localhost:8000/api/checkActiveRide/${userId}`)
      .then((response) => {
        activeRides.value = response.data;
        console.log(activeRides.value);
      });
  }
};

onMounted(() => {
  checkActiveRide();
});

//change active class on click
document.addEventListener("DOMContentLoaded", function () {
  const links = document.querySelectorAll(".bottomnav li");
  links.forEach((link) => {
    link.addEventListener("click", function () {
      links.forEach((link) => link.classList.remove("active"));
      this.classList.add("active");
    });
  });
});

const nom = localStorage.getItem("nom");
const prenom = localStorage.getItem("prenom");

const isLogged = ref(localStorage.getItem("isLoggedin"));

const logout = () => {
  isLogged.value = false;
  localStorage.removeItem("nom");
  localStorage.removeItem("prenom");
  localStorage.removeItem("isLoggedin");
  localStorage.removeItem("token");
  localStorage.removeItem("user_id");
  localStorage.removeItem("trajet_id");

  window.location.href = "/";
  console.log("logout");
  console.log(isLogged.value);
};
</script>