<template>
  <nav>
    <div class="ribbon">
      <div class="container">
        <router-link to="/" class="nav-link">Home</router-link>
        <span class="separator">/</span>
        <router-link to="/history" class="nav-link">Ride History</router-link>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row justify-content-center mt-4">
      <div class="col-md-10">
        <fieldset class="rounded p-4 custom-border mt-5 mb-2">
          <legend class="legend-label">Your active rides :</legend>
          <!-- table -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Departure</th>
                <th scope="col">Arrival</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody v-if="ridesAsDriver.length > 0">
              <tr v-for="ride in ridesAsDriver" :key="ride.id" v-if="rideMatchasDriver()">
                <td v-if="ride.etat == -1 || ride.etat == 0">{{ ride.dateDepart }}</td>
                <td v-if="ride.etat == -1 || ride.etat == 0">{{ ride.pointDepart }}</td>
                <td v-if="ride.etat == -1 || ride.etat == 0">{{ ride.pointArrive }}</td>
                <td v-if="ride.etat == -1 || ride.etat == 0">{{ ride.montant }} DT</td>
                <td v-if="ride.etat == -1 || ride.etat == 0">
                  <button @click="cancelRide(ride.id)" class="btn btn-danger">
                    Delete Ride
                  </button>
                </td>
              </tr>
              <tr v-else>
                <td colspan="6" class="text-center">No rides found</td>
              </tr>

            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="6" class="text-center">No rides found</td>
              </tr>
            </tbody>
          </table>
        </fieldset>

        <fieldset class="rounded p-4 custom-border mt-5 mb-2">
          <legend class="legend-label">Your active seats :</legend>
          <!-- table -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Departure</th>
                <th scope="col">Arrival</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody v-if="ridesAsPassenger.length > 0">
              <tr v-for=" ride  in  ridesAsPassenger " :key=" ride.id " v-if="rideMatchasPassenger()" >
              <td v-if="ride.etat == 0 ">
                {{ ride.dateDepart }}
                </td>
                <td v-if=" ride.etat == -1 || ride.etat == 0 ">
                  {{ ride.pointDepart }}
                </td>
                <td v-if=" ride.etat == -1 || ride.etat == 0 ">
                  {{ ride.pointArrive }}
                </td>
                <td v-if=" ride.etat == -1 || ride.etat == 0 ">
                  {{ ride.montant }} DT
                </td>
                <td v-if=" ride.etat == -1 || ride.etat == 0 ">
                  <button @click="cancelReservation(ride.id, userId)" class="btn btn-danger">
                    Cancel
                  </button>
                </td>
              </tr>
              <tr v-else>
                <td colspan="6" class="text-center">No rides found</td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="6" class="text-center">No rides found</td>
              </tr>
            </tbody>
          </table>
        </fieldset>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center mt-4">
      <div class="col-md-10">
        <fieldset class="rounded p-4 custom-border">
          <legend class="legend-label">Your rides history as driver :</legend>
          <!-- table -->

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Departure</th>
                <th scope="col">Arrival</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody v-if=" ridesAsDriver.length > 0 ">
              <tr v-for=" ride  in  ridesAsDriver " :key=" ride.id " v-if="rideMatchasDriverHistory()">
                <td v-if=" ride.etat == 1 ">{{ ride.dateDepart }}</td>
                <td v-if=" ride.etat == 1 ">{{ ride.pointDepart }}</td>
                <td v-if=" ride.etat == 1 ">{{ ride.pointArrive }}</td>
                  <td v-if=" ride.etat == 1 ">{{ ride.montant }} DT</td>
              </tr>
              <tr v-else>
                <td colspan="4" class="text-center">No rides found</td>
              </tr>
            </tbody>
            
            <tbody v-else>
              <tr>
                <td colspan="6" class="text-center">No rides found</td>
              </tr>
            </tbody>
          </table>
        </fieldset>

        <fieldset class="rounded p-4 custom-border mt-5 mb-2">
          <legend class="legend-label">
            Your rides history as passenger :
          </legend>
          <!-- table -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Departure</th>
                <th scope="col">Arrival</th>
                <th scope="col">Price</th>
                <th scope="col">Review</th>
              </tr>
            </thead>
            <tbody v-if=" ridesAsPassenger.length > 0 ">
              <tr v-for=" ride  in  ridesAsPassenger " :key=" ride.id ">
                <td v-if=" ride.etat == 1 ">{{ ride.dateDepart }}</td>
                <td v-if=" ride.etat == 1 ">{{ ride.pointDepart }}</td>
                <td v-if=" ride.etat == 1 ">{{ ride.pointArrive }}</td>
                <td v-if=" ride.etat == 1 ">{{ ride.montant }} DT</td>
                <td v-if=" ride.etat == 1 ">
                  <button
                    @click="reviewDriver(ride.id)"
                    class="btn-r"
                  >
                    Review
                  </button>
                  <div
                    :class="{ 'modal-open': showModal }"
                    class="modal-overlay"
                    @click="closeModal"
                    v-if="showModal"
                  >
                  <div class="modal-content" @click.stop>
                      <Avis :rideId="ride.idConducteur" />
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="6" class="text-center">No rides found</td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        <OpValidNotif v-if=" showNotification " :message=" notificationMessage " />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { onMounted } from "vue";
import OpValidNotif from "../Generic/OpValidNotif.vue";
import Avis from "../History/Avis.vue"; // Import your avis component

const rides = ref([]);
const ridesAsDriver = ref([]);
const ridesAsPassenger = ref([]);
const ridesIds = ref([]);

const userId = localStorage.getItem("user_id");

const showNotification = ref(false);
const notificationMessage = ref("");

const getRidesAsPassg = () => {
  axios
    .get(`http://localhost:8000/api/listePassager/${userId}`)
    .then((response) => {
      rides.value = response.data;
      console.log(rides.value);
      console.log("userid", userId);
      console.log(rides.value.length);

      for (var i = 0; i < rides.value.length; i++) {
        console.log("d5alt");
        console.log("i", i);

        axios
          .get(`http://localhost:8000/api/trajets/${rides.value[i].idTrajet}`)
          .then((response) => {
            ridesAsPassenger.value.push(response.data);
          });
      }
    });

  console.log("aaa", ridesAsPassenger);
};

const getRidesAsDriver = () => {
  axios
    .get(`http://localhost:8000/api/trajetsbydriver/${userId}`)
    .then((response) => {
      rides.value = response.data;
      console.log("sawe9", rides);
      ridesAsDriver.value = response.data;
    })
    .catch((error) => {
      console.error("Error retrieving driver rides:", error);
    });
};


onMounted(() => {
  getRidesAsPassg();
  getRidesAsDriver();

});

const cancelReservation = async (id, userId) => {
  try {
    const response = await axios.put(
      `http://localhost:8000/api/annulerReservation/${id}/${userId}`
    );
    // Check if the cancellation was successful
    if (response.status === 200) {
      showNotification.value = true;
      notificationMessage.value = "Reservation canceled successfully";

      // Remove the cancelled trajet_id from local storage array
      const trajet_id = localStorage.getItem('trajet_id');
      if (trajet_id) {
        const trajet_id_array = trajet_id.split(',');
        const index = trajet_id_array.indexOf(id.toString());
        if (index !== -1) {
          trajet_id_array.splice(index, 1);
          localStorage.setItem('trajet_id', trajet_id_array.join(','));
        }
      }

    } else {
      // Handle other status codes if needed
      console.error("Failed to cancel reservation:", response.statusText);
    }
  } catch (error) {
    console.error("Error canceling reservation:", error);
  }
};

const cancelRide = (id) => {
  axios
    .delete(`http://localhost:8000/api/deltrajet/${id}`)
    .then((response) => {
      showNotification.value = true;
      notificationMessage.value = "Ride deleted successfully";
      setTimeout(() => {
        //reload page
        location.reload();
      }, 3000);
    })
    .catch((error) => {
      console.error("Error deleting ride:", error);
    });
};

const rideMatchasDriver = () => {
  // if any ride has etat == -1 or 0
  return ridesAsDriver.value.some((ride) => ride.etat === -1 || ride.etat === 0);
};

const rideMatchasPassenger = () => {
  // if any ride has etat == -1 or 0
  return ridesAsPassenger.value.some((ride) => ride.etat === -1 || ride.etat === 0);
};

const rideMatchasDriverHistory = () => {

  return ridesAsDriver.value.some((ride) => ride.etat === 1);
};


const showModal = ref(false);
const selectedRideId = ref(null);

const reviewDriver = (id) => {
  selectedRideId.value = id;
  showModal.value = true;
  //set body css to overflow hidden
  document.body.style.overflow = "hidden";
};

const closeModal = () => {
  showModal.value = false;
  document.body.style.overflow = "auto";
};
</script>
<style scoped>
:root {
  --yellow: #ebb14d;
  --darkblue: #3a3c6c;
  --light: #cfd8ef;
  --white: #fff;
}

.custom-border {
  border: 1px solid #ced4da;
}

.legend-label {
  font-size: 1.2rem;
  color: var(--darkblue);
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

.save-change {
  background: #ebb14d;
  color: white;
  border: none;
  font-size: 16px;
  float: right;
  cursor: pointer;
  width: 200px;
}

nav {
  margin-left: 22%;
  margin-right: 22%;
  border-radius: 40%;
  border-color: 1px solid #ced4da;
}

.ribbon {
  color: white;
  padding: 10px 0;
  margin-top: 10px;
  border-radius: 10px;
  /* Add border radius */
  border: 1px solid #ced4da;
  /* Add border */
}

.ribbon .container {
  display: flex;
  justify-content: flex-start;
  /* Align links to the left */
}

.ribbon .container .nav-link {
  color: black;
  text-decoration: none;
  transition: color 0.3s ease;
  margin-right: 10px;
  /* Add space between links */
}

.ribbon .container .separator {
  margin-top: 5px;
  color: black;
  margin-right: 10px;
  /* Add space between links */
}

.ribbon .container .nav-link:hover {
  color: var(--darkblue);
}
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  background-color: white;
  padding: 2px;
  border-radius: 5px;
  width: auto;
}

.modal-open {
  display: flex;
}
</style>