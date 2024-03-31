<template>
  <div class="container-fluid d-flex justify-content-center spaced ml-5">
    <div class="row mt-2 px-3">
      <div
        v-for="ride in rides.value"
        :key="ride.id"
        class="col-sm-6 col-md-4 col-lg-3 mb-3"
      >
        <div class="card" style="width: 15rem">
          <img
            src="https://png.pngtree.com/png-vector/20190701/ourmid/pngtree-route-icon-in-trendy-style-isolated-background-png-image_1524893.jpg"
            class="card-img-top"
            width="100%"
          />
          <div class="card-body pt-0 px-2">
            <div
              class="d-flex flex-row justify-content-between mb-0 pl-3 pr-3 mt-1"
            >
              <div class="d-flex flex-column">
                <small class="text-muted mb-1">Chauffeur</small>
                <h6>
                  {{ getDriver(ride.idConducteur).nom }}
                  {{ getDriver(ride.idConducteur).prenom }}
                </h6>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between pl-3 pr-3 mid">
              <div class="d-flex flex-column">
                <small class="text-muted mb-1">Téléphone</small>
                <h6>{{ getDriver(ride.idConducteur).telephone }}</h6>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between px-3 pb-1">
              <div class="d-flex flex-column">
                <span class="text-muted mb-1">Véhicule</span>
                <h6>
                  {{ getVehicle(ride.idVoiture).marque }}
                  {{ getVehicle(ride.idVoiture).modele }}
                </h6>
              </div>
              <div class="d-flex flex-column">
                <span class="text-muted mb-1">Série</span>
                <h6>{{ getVehicle(ride.idVoiture).matricule }}</h6>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between pl-3 pr-3 mid">
              <div class="d-flex flex-column">
                <small class="text-muted mb-1">Date</small>
                <h6>{{ ride.dateDepart }}</h6>
              </div>
              <div class="d-flex flex-column">
                <small class="text-muted mb-1">Heure</small>
                <h6>12:00</h6>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between pl-3 pr-3 mid">
              <div class="d-flex flex-column">
                <small class="text-muted mb-1">Départ</small>
                <h6>{{ ride.pointDepart }}</h6>
              </div>
              <div class="d-flex flex-column">
                <small class="text-muted mb-1">Arrivée</small>
                <h6>{{ ride.pointArrive }}</h6>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between pl-3 pr-3 mid">
              <div class="d-flex flex-column">
                <small class="text-muted mb-1">Nombre de places</small>
                <h6>{{ ride.nbPlaces }}</h6>
              </div>
              <div class="d-flex flex-column">
                <small class="text-muted mb-1">Places restantes</small>
                <h6>2</h6>
              </div>
            </div>
            <hr class="mt-1 mx-1" />
            <div class="d-flex flex-col justify-content-between pl-3 pr-3 pb-1">
              <div class="d-flex flex-column mid">
                <span class="text-muted">Options :</span>
                <div class="d-flex flex-column mt-2">
                  <div
                    v-if="getVoitures(ride.idVoiture).climatisation == 1"
                    class="d-flex flex-row align-items-center"
                  >
                    <i class="fas fa-snowflake mr-2"></i>
                    <h5 class="mb-0">Climatisation activée</h5>
                  </div>
                  <div
                    v-if="getVoitures(ride.idVoiture).fumeur == 1"
                    class="d-flex flex-row align-items-center"
                  >
                    <i class="fas fa-smoking mr-2"></i>
                    <h5 class="mb-0">Accepte les fumeurs</h5>
                  </div>
                  <div
                    v-if="getVoitures(ride.idVoiture).animaux == 1"
                    class="d-flex flex-row align-items-center"
                  >
                    <i class="fas fa-paw mr-2"></i>
                    <h5 class="mb-0">Accepte les animaux</h5>
                  </div>
                  <div
                    v-if="getVoitures(ride.idVoiture).bagage == 0"
                    class="d-flex flex-row align-items-center"
                  >
                    <i class="fas fa-suitcase mr-2"></i>
                    <h5 class="mb-0">Baggage leger</h5>
                  </div>
                  <div v-else class="d-flex flex-row align-items-center">
                    <i class="fas fa-suitcase mr-2"></i>
                    <h5 class="mb-0">Baggage lourd</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between pl-3 pr-3 pt-2">
              <div class="d-flex flex-column">
                <small class="text-muted mb-1">Montant</small>
                <h6>{{ ride.montant }} TND</h6>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <button class="btn reserve">Réserver votre place!</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const rides = ref([]);

onMounted(() => {
  fetchRides();
});

const fetchRides = () => {
  axios
    .get("http://localhost:8000/api/trajets")
    .then((response) => {
      rides.value = response.data;
      console.log(rides.value);
    })
    .catch((error) => {
      console.error(error);
    });
};

const getVoitures = (id) => {
  axios
    .get(`http://localhost:8000/api/voitures/${id}`)
    .then((response) => {
      console.log(response.data);
      return response.data;
    })
    .catch((error) => {
      console.error(error);
    });
};

const getConducteur = (id) => {
  axios
    .get(`http://localhost:8000/api/users/${id}`)
    .then((response) => {
      console.log(response.data);
      return response.data;
    })
    .catch((error) => {
      console.error(error);
    });
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap");

body {
  background: #f5f1ee;
  font-family: "Roboto", sans-serif;
}

.card {
  width: 250px;
  border-radius: 10px;
}

.card-img-top {
  border-top-right-radius: 10px;
  border-top-left-radius: 10px;
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

@media screen and (max-width: 600px) {
  .col-sm-4 {
    margin-bottom: 50px;
  }
}
</style>
