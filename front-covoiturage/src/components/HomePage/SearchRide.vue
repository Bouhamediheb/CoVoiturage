<template>
  <div>
    <br />
    <span class="mt-5"> </span>

    <div
      class="ride-picker"
      style="width: 1400px; max-width: 100%; margin: 0 auto"
    >
      <div class="ride-picker-title">
        <h2 class="heading-2">Pick your ride from where you are</h2>
        <span class="mt-2"> </span>

        <br />

        <div class="ride-picker">
          <div class="input-box">
            <i class="fa fa-map-marker"></i>
            <input
              type="text"
              placeholder="Starting Point"
              v-model="startPoint"
              @input="filterStartPoint"
              class="ride-picker__input"
            />
            <div v-if="startPointFiltered.length > 0" class="autocomplete">
              <ul>
                <li
                  v-for="(city, index) in startPointSlider"
                  :key="index"
                  @click="selectStartPoint(city)"
                >
                  {{ city }}
                </li>
              </ul>
            </div>
          </div>
          <br />
          <div class="input-box">
            <i class="fa fa-map-marker"></i>
            <input
              type="text"
              placeholder="Destination"
              v-model="endPoint"
              @input="filterEndPoint"
              class="ride-picker__input"
            />
            <div v-if="endPointFiltered.length > 0" class="autocomplete">
              <ul>
                <li
                  v-for="(city, index) in endPointSlider"
                  :key="index"
                  @click="selectEndPoint(city)"
                >
                  {{ city }}
                </li>
              </ul>
            </div>
          </div>

          <span class="ml-2"> </span>

          <div class="input-box">
            <i class="fa fa-calendar"></i>
            <input
              type="date"
              data-date-format="DD MMMM YYYY"
              v-model="selectedDate"
              class="ride-picker__input"
            />
          </div>

          <span class="ml-5"> </span>

          <button @click="search" class="b-btn">
            Search
            <i class="fa fa-long-arrow-right"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import { useRouter } from "vue-router";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

const router = useRouter();

const governorates = ref([
  "Paris",
  "Marseille",
  "Lyon",
  "Toulouse",
  "Nice",
  "Nantes",
  "Strasbourg",
  "Montpellier",
  "Bordeaux",
  "Lille",
  "A",
  "aaa",
  "aze",
  "azee",
  "Rennes",
  "Reims",
  "Le Havre",
  "Saint-Étienne",
  "Toulon",
  "Grenoble",
  "Angers",
  "Dijon",
  "Brest",
  "Le Mans",
  "Nîmes",
  "Aix-en-Provence",
  "Clermont-Ferrand",
  "Tours",
  "Amiens",
  "Limoges",
  "Villeurbanne",
  "Metz",
  "Besançon",
  "Perpignan",
  "Orléans",
  "Caen",
  "Mulhouse",
  "Boulogne-Billancourt",
  "Rouen",
  "Nancy",
  "Argenteuil",
  "Montreuil",
  "Saint-Denis",
  "Roubaix",
  "Avignon",
  "Tourcoing",
  "Poitiers",
  "Nanterre",
  "Créteil",
  "Versailles",
  "Pau",
  "Courbevoie",
  "Vitry-sur-Seine",
  "Asnières-sur-Seine",
  "Colombes",
  "Aulnay-sous-Bois",
  "La Rochelle",
  "Rueil-Malmaison",
  "Antibes",
  "Saint-Maur-des-Fossés",
  "Calais",
  "Champigny-sur-Marne",
  "Aubervilliers",
  "Béziers",
  "Bourges",
  "Cannes",
  "Saint-Nazaire",
  "Dunkerque",
  "Quimper",
  "Valence",
  "Colmar",
  "Drancy",
  "Mérignac",
  "Ajaccio",
  "Levallois-Perret",
  "Troyes",
  "Neuilly-sur-Seine",
  "Issy-les-Moulineaux",
  "Villeneuve-d'Ascq",
  "Noisy-le-Grand",
  "Antony",
  "Niort",
  "Lorient",
  "Sarcelles",
  "Chambéry",
  "Saint-Quentin",
  "Pessac",
  "Vénissieux",
  "Cergy",
  "La Seyne-sur-Mer",
  "Clichy",
  "Beauvais",
  "Cholet",
  "Hyères",
  "Ivry-sur-Seine",
  "Montauban",
  "Vannes",
  "La Roche-sur-Yon",
  "Charleville-Mézières",
  "Pantin",
  "Laval",
  "Maisons-Alfort",
  "Bondy",
  "Évry",
]);

const selectedDate = ref(new Date().toISOString().substr(0, 10));
const startPoint = ref("");
const endPoint = ref("");
const startPointFiltered = ref([]);
const endPointFiltered = ref([]);
const startPointSliderValue = ref(5);
const endPointSliderValue = ref(5);

const startPointSlider = computed(() =>
  startPointFiltered.value.slice(0, startPointSliderValue.value)
);
const endPointSlider = computed(() =>
  endPointFiltered.value.slice(0, endPointSliderValue.value)
);

const search = () => {
  console.log("Start Point:", startPoint.value);
  console.log("End Point:", endPoint.value);
  console.log("Selected Date:", selectedDate.value);
  router.push({
    name: "rides",
    query: {
      startPoint: startPoint.value,
      endPoint: endPoint.value,
      date: selectedDate.value,
    },
  });
};

const filterStartPoint = () => {
  startPointFiltered.value = governorates.value.filter((city) =>
    city.toLowerCase().startsWith(startPoint.value.toLowerCase())
  );
};

const filterEndPoint = () => {
  endPointFiltered.value = governorates.value.filter((city) =>
    city.toLowerCase().startsWith(endPoint.value.toLowerCase())
  );
};

const selectStartPoint = (city) => {
  startPoint.value = city;
  startPointFiltered.value = [];
};

const selectEndPoint = (city) => {
  endPoint.value = city;
  endPointFiltered.value = [];
};

onMounted(() => {});
</script>

<style scoped>
.autocomplete {
  position: relative;
}

.autocomplete ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
  position: absolute;
  background-color: #f1f1f1;
  width: 100%;
  z-index: 1;
}

.autocomplete li {
  padding: 10px;
  cursor: pointer;
}

.autocomplete li:hover {
  background-color: #ddd;
}
</style>

<style scoped>
.ride-picker-title {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.ride-picker {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
}

.ride-picker__point {
  margin: 10px;
}

.ride-picker__point label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.ride-picker__select {
  width: 250px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  background-color: #f9f9f9;
  color: #333;
}

.ride-picker__select option {
  background-color: white;
  color: #333;
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
