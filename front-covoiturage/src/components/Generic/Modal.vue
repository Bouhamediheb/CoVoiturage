<template>
  <Transition name="modal">
    <div v-if="show" class="modal-mask">
      <div class="modal-container">
        <div class="modal-header">
          <slot name="header">default header</slot>
        </div>

        <div class="modal-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Departure</th>
                <th scope="col">Arrival</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="ride in rides" :key="ride.id">
                <td>{{ ride.dateDepart }}</td>
                <td>{{ ride.pointDepart }}</td>
                <td>{{ ride.pointArrive }}</td>
                <td>
                  <button @click="endTrip(ride.id)" class="btn btn-danger">
                    End Trip
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="modal-footer">
          <slot name="footer">
            <button class="b-btn" @click="$emit('close')">Close</button>
          </slot>
        </div>
      </div>
    </div>
  </Transition>
</template>

<script setup>
import axios from "axios";
import { ref } from "vue";

const props = defineProps({
  show: Boolean,
  rides: Array,
});

const showNotification = ref(false);
const notificationMessage = ref("");

const endTrip = (id) => {
  axios
    .put(`http://localhost:8000/api/updateEtatTrajet/${id}`, {
      etat: 1,
    })
    .then(() => {
      showNotification.value = true;
      notificationMessage.value = "Trip Ended";
      setTimeout(() => {
        //reload page
        location.reload();
      }, 1000);
    })
    .catch((error) => {
      console.error("Error deleting ride:", error);
    });
};
</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  transition: opacity 0.3s ease;
}

.modal-container {
  width: 600;
  margin: auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

.modal-enter-from {
  opacity: 0;
}

.modal-leave-to {
  opacity: 0;
}

.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>