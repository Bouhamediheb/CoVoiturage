<template>
  <div class="container-fluid">
    <div class="d-flex justify-content-center spaced">
      <div class="row mt-2 px-3">
        <template v-for="ride in rides" :key="ride.id">
          <div v-if="ride.nbPlaces > 0" class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
              <img src="https://sf1.autoplus.fr/wp-content/uploads/autoplus/2021/12/27715_1630853_k2_k1_3760701-750x410.jpg"
                class="card-img-top" width="100%" alt="Card image" />
              <div class="card-body pt-0 px-2">
                <div class="card">
                  <div class="card-body pt-0 px-2">
                    <div class="d-flex flex-row justify-content-between mb-0 pl-3 pr-3 mt-1">
                      <div class="d-flex flex-column">
                        <small class="text-muted mb-1">Chauffeur</small> {{ nom[ride.id-1] }} , {{ prenom[ride.id-1] }}
                      </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between pl-3 pr-3 mid">
                      <div class="d-flex flex-column">
                        <small class="text-muted mb-1">Téléphone</small> {{ telephone[ride.id-1] }}
                      </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between px-3 pb-1">
                      <div class="d-flex flex-column">
                        <span class="text-muted mb-1">Véhicule</span> {{ marque[ride.id-1] }} , {{ modele[ride.id-1] }}
                      </div>
                      <div class="d-flex flex-column">
                        <span class="text-muted mb-1">Série</span> {{ matricule[ride.id-1] }}
                      </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between pl-3 pr-3 mid">
                      <div class="d-flex flex-column">
                        <small class="text-muted mb-1">Date</small>
                        <h6>{{ ride.dateDepart }}</h6>
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
                    </div>
                    <hr class="mt-1 mx-1" />
                    <div class="d-flex flex-col justify-content-between pl-3 pr-3 pb-1">
                      <div class="d-flex flex-column mid">
                        <span v-if="climatisation[ride.id - 1] === 1">Climatisation</span>
                        <span v-if="animaux[ride.id - 1] === 1">Animaux</span>
                        <span v-if="fumeur[ride.id - 1] === 1">Fumeur</span>
                        <span v-if="baggage[ride.id - 1] === 1">Baggage</span>
                        <span v-if="bebe[ride.id - 1] === 1">Bébé</span>
                      </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between pl-3 pr-3 pt-2">
                      <div class="d-flex flex-column">
                        <small class="text-muted mb-1">Montant</small>
                        <h6>{{ ride.montant }} EUR</h6>
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
      </div>
    </div>
  </div>
</template>



  <script setup>
  import { ref, onMounted, computed } from 'vue';
  import axios from 'axios';
  const matricule = ref([]);
  const nom = ref([]);
  const prenom = ref([]);
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
    const response = await axios.get('http://localhost:8000/api/trajets');
    rides.value = response.data;
    

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
    }
    ridesLoaded.value = true;
  } catch (error) {
    console.error(error);
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
    const voiture = await getVoitures(ride.id);
    return { ...rides, ...voiture };
};

const fetchRideInfoUsers = async (ride) => {
    const user = await getUsers(ride.id);
    return { ...rides, ...user };
};


  </script>

  <style scoped>
  @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap");

  body {
    background: #f5f1ee;
    font-family: "Roboto", sans-serif;
  }

  .row {
    display: flex;
    flex-wrap: wrap;
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
    width: 250px;
    border-radius: 10px;
    margin-bottom: 20px;
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
