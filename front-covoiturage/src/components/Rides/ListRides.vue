<template>
  <div class="container-fluid">
    <div class="d-flex justify-content-center spaced">
      <!--  " class="col-sm-6 col-md-4 col-lg-3 mb-3"> Center the cards -->
      <div
        v-if="rides.length > 0"
        class="row mt-2 d-flex justify-content-center spaced"
      >
        <div v-for="(ride, index) in rides" :key="ride.id">
          <!-- show rides that user didn't reserve from localStorage-->
          <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
              <img
                :src="carImages[index]"
                class="card-img-top"
                alt="Car image"
              />
              <div class="card-body pt-0 px-1">
                <div
                  class="d-flex flex-row justify-content-between mb-0 pl-3 pr-3 mt-1"
                >
                  <div class="d-flex flex-column">
                    <small class="text-muted mb-1">Chauffeur</small>
                    <div>{{ nom[index] }} {{ prenom[index] }}</div>
                  </div>
                  <div class="d-flex flex-column">
                    <div class="star-rating mt-3">
                      <span v-for="index in avis[index]" :key="index">
                        <i :class="{ 'fas fa-star': index }"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-row justify-content-between pl-3 pr-3">
                  <div class="d-flex flex-column">
                    <small class="text-muted mb-1">Téléphone</small>
                    {{ telephone[index] }}
                  </div>
                </div>
                <div class="d-flex flex-row justify-content-between px-3 pb-1">
                  <div class="d-flex flex-column">
                    <span class="text-muted mb-1">Véhicule</span>
                    {{ marque[index] }} , {{ modele[index] }}
                  </div>
                  <div class="d-flex flex-column">
                    <span class="text-muted mb-1">Série</span>
                    {{ matricule[index] }}
                  </div>
                </div>
                <div class="d-flex flex-row justify-content-between pl-3 pr-3">
                  <div class="d-flex flex-column">
                    <small class="text-muted mb-1">Date</small>
                    <h6>{{ ride.dateDepart }}</h6>
                  </div>
                </div>
                <div class="d-flex flex-row justify-content-between pl-3 pr-3">
                  <div class="d-flex flex-column">
                    <small class="text-muted mb-1">Départ</small>
                    <h6>{{ ride.pointDepart }}</h6>
                  </div>
                  <div class="d-flex flex-column">
                    <small class="text-muted mb-1">Arrivée</small>
                    <h6>{{ ride.pointArrive }}</h6>
                  </div>
                </div>
                <div class="d-flex flex-row justify-content-between pl-3 pr-3">
                  <div class="d-flex flex-column">
                    <small class="text-muted mb-1">Nombre de places</small>
                    <h6>{{ ride.nbPlaces }}</h6>
                  </div>
                </div>
                <hr class="mt-1 mx-1" />
                <div
                  class="d-flex flex-col justify-content-between pl-3 pr-3 pb-1"
                >
                  <div class="d-flex flex-column">
                    <span v-if="climatisation[index] === 1">
                      <i class="fas fa-wind"></i> Climatisation</span
                    >
                    <span v-if="animaux[index] === 1">
                      <i class="fas fa-dog"></i> Animaux</span
                    >
                    <span v-if="fumeur[index] === 1">
                      <i class="fas fa-smoking"></i>Fumeur</span
                    >
                    <span v-if="baggage[index] === 1">
                      <i class="fas fa-suitcase"></i> Baggage</span
                    >
                    <span v-if="bebe[index] === 1">
                      <i class="fas fa-baby"></i> Bébé</span
                    >
                  </div>
                </div>
                <div
                  class="d-flex flex-row justify-content-between pl-3 pr-3 pt-2"
                >
                  <div class="d-flex flex-column">
                    <small class="text-muted mb-1">Montant</small>
                    <h6>{{ ride.montant }} TND</h6>
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-center">
                <button @click="reserver(ride.id)" class="btn reserve">
                  Réserver votre place!
                </button>
              </div>
            </div>
          </div>
          <OpValidNotif
            v-if="showNotification"
            :message="notificationMessage"
          />
        </div>
      </div>
      <div v-else>
        <NoRides />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";
const route = useRoute();
const accessKey = "q-vVbg13r4TvpkLVJiV6YvDvo9RF2dZ5gAjRWIFbZYk";
const carImages = ref([]);
import OpValidNotif from "../Generic/OpValidNotif.vue";
import NoRides from "../error/NoRides.vue";

const showNotification = ref(false);
const notificationMessage = ref("");

import axios from "axios";
const pointDepart = route.query.startPoint;
const pointArrive = route.query.endPoint;
const dateDepart = route.query.date;

const matricule = ref([]);
const nom = ref([]);
const prenom = ref([]);
const avis = ref([]);
const modele = ref([]);
const climatisation = ref([]);
const animaux = ref([]);
const fumeur = ref([]);
const baggage = ref([]);
const bebe = ref([]);
const telephone = ref([]);
const marque = ref([]);
const usersinfo = ref([]);
const rides = ref([]);
const ridesLoaded = ref(false);

onMounted(async () => {
  try {
    if (Object.keys(route.query).length === 0) {
      const response = await axios.get("http://localhost:8000/api/trajets");
      rides.value = response.data;
    } else {
      const response = await axios.get(
        "http://localhost:8000/api/rechercheTrajet",
        {
          params: {
            pointDepart: pointDepart,
            pointArrive: pointArrive,
            dateDepart: dateDepart,
          },
        }
      );
      rides.value = response.data;

      console.log("im here", rides.value);
    }

    for (const ride of rides.value) {
      const voiture = await fetchRideInfoVoitures(ride);
      const allow = voiture.matricule;
      const modele1 = voiture.modele;
      const marque1 = voiture.marque;
      const climatisation1 = voiture.climatisation;
      const animaux1 = voiture.animaux;
      const fumeur1 = voiture.fumeur;
      const baggage1 = voiture.baggage;
      const bebe1 = voiture.bebe;
      const user = await fetchRideInfoUsers(ride);
      const nom1 = user.nom;
      const prenom1 = user.prenom;
      const telephone1 = user.telephone;
      const avis1 = user.avis;

      climatisation.value.push(climatisation1);
      animaux.value.push(animaux1);
      fumeur.value.push(fumeur1);
      bebe.value.push(bebe1);
      baggage.value.push(baggage1);
      matricule.value.push(allow);
      modele.value.push(modele1);
      marque.value.push(marque1);

      nom.value.push(nom1);
      prenom.value.push(prenom1);
      telephone.value.push(telephone1);
      avis.value.push(parseInt(avis1));
    }
    ridesLoaded.value = true;
    console.log("rides", rides.value);
  } catch (error) {
    console.error(error);
  }

  for (const [ride, index] of rides.value.entries()) {
    console.log("RIDE NO", ride);
    console.log(marque.value[ride]);
    const modelName = `${marque.value[ride]} ${modele.value[ride]}`;
    console.log("modelnmae", modelName);
    const images = await fetchCarImages(modelName);
    // Push the fetched image URL to the carImages array
    carImages.value.push(images.length > 0 ? images[0] : "");
  }
});

const getVoitures = async (id) => {
  const response = await axios.get(`http://localhost:8000/api/voitures/${id}`);
  return response.data;
};

const getUsers = async (id) => {
  const response = await axios.get(`http://localhost:8000/api/users/${id}`);
  return response.data;
};
const fetchRideInfoVoitures = async (ride) => {
  const voiture = await getVoitures(ride.idVoiture);
  return { ...rides, ...voiture };
};

const fetchRideInfoUsers = async (ride) => {
  const user = await getUsers(ride.idConducteur);
  return { ...rides, ...user };
};

const reserver = (id) => {
  axios.put(`http://localhost:8000/api/updatePlacesTrajet/${id}`);
  const userId = localStorage.getItem("user_id");
  axios.post(`http://localhost:8000/api/reserver`, {
    idTrajet: id,
    idPassager: userId,
  });
  console.log("9bal", showNotification.value);

  showNotification.value = true;
  // print driver name and car model and date
  notificationMessage.value =
    "You've taken a seat in this ride! Check your profile if you want to cancel.";
  console.log("Ba3d", showNotification.value);

  const trajet_id = localStorage.getItem("trajet_id");
  if (trajet_id) {
    const trajet_id_array = trajet_id.split(",");
    if (!trajet_id_array.includes(id.toString())) {
      trajet_id_array.push(id);
      localStorage.setItem("trajet_id", trajet_id_array.join(","));
    }
  } else {
    localStorage.setItem("trajet_id", id);
  }
};

// Fetch car images from Unsplash API
const fetchCarImages = async (modelName) => {
  try {
    const response = await fetch(
      `https://api.unsplash.com/search/photos?query=${modelName}&client_id=${accessKey}`
    );
    const data = await response.json();
    return data.results.map((result) => result.urls.regular);
  } catch (error) {
    console.error("Error fetching car images:", error);
    return [];
  }
};

const shouldDisplayRide = (ride) => {
  const trajet_id = localStorage.getItem("trajet_id");

  // Check if trajet_id is null
  if (trajet_id === null) {
    // If no trajet_id is found, assume that the ride can be displayed
    return ride.nbPlaces > 0;
  }

  // Otherwise, split the trajet_id and check if the ride's id is in the list
  const trajet_id_array = trajet_id.split(",");

  return ride.nbPlaces > 0 && !trajet_id_array.includes(ride.id.toString());
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap");

body {
  background: #f5f1ee;
  font-family: "Roboto", sans-serif;
}

.star-rating {
  font-size: 18px;
  color: #ffdd44;
  cursor: pointer;
}

.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.col-sm-6 {
  flex: 0 0 50%;
  max-width: 50%;
}

.col-md-4 {
  flex: 0 0 33.333%;
  max-width: 33.333%;
}

.col-lg-3 {
  flex: 0 0 25%;
  max-width: 25%;
}

.card {
  width: 350px; /* Fixed width for the card */
  height: 400px; /* Fixed height for the card */
  border-radius: 10px;
  margin-bottom: 20px;
  display: flex; /* Use flexbox to ensure consistent sizing */
  flex-direction: column; /* Stack card content vertically */
}

.card-img-top {
  width: 100%;
  height: 200px; /* Adjust the height as needed */
  object-fit: cover; /* Ensure the image covers the entire space */
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

span.text-muted {
  font-size: 12px;
}

small.text-muted {
  font-size: 10px;
}

h5.mb-0 {
  font-size: 1rem;
}

small.ghj {
  font-size: 9px;
}

.mid {
  background: #ecedf1;
}

h6.ml-1 {
  font-size: 13px;
}

small.key {
  text-decoration: underline;
  font-size: 9px;
  cursor: pointer;
}

.btn-danger {
  color: #ffcbd2;
}

.btn-danger:focus {
  box-shadow: none;
}

small.justify-content-center {
  font-size: 9px;
  cursor: pointer;
  text-decoration: underline;
}

.spaced {
  padding: 20px;
}

.reserve {
  background: #ebb14d;
  color: white;
  border: none;
  font-size: 16px;
  float: right;
  cursor: pointer;
}

.spaced > * {
  margin: 5px;
}

.card-body {
  height: calc(
    100% - 50px
  ); /* Set height for card body, subtract height of footer */
  padding: 10px;
  overflow-y: auto; /* Make card body scrollable vertically */
}

@media screen and (max-width: 600px) {
  .col-sm-4 {
    margin-bottom: 50px;
  }
}

.card-footer {
  padding: 10px;
}
</style>
