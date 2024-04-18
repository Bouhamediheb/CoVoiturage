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
            <legend class="legend-label">Your pending rides : </legend>
            <!-- table -->
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Departure</th>
                  <th scope="col">Arrival</th>
                  <th scope="col">Number of places</th>
                  <th scope="col">Price</th>
                  <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody v-if = "ridesAsPassenger.length > 0">
                    <tr v-for="ride in ridesAsPassenger" :key="ride.id" >
                    <td v-if="ride.etat==-1">{{ ride.dateDepart }}</td>
                    <td v-if="ride.etat==-1">{{ ride.pointDepart }}</td>
                    <td v-if="ride.etat==-1">{{ ride.pointArrive }}</td>
                    <td v-if="ride.etat==-1">{{ ride.nbPlaces }}</td>
                    <td v-if="ride.etat==-1">{{ ride.montant }} DT</td>
                    <td v-if="ride.etat==-1"> 
                        <button @click="cancelReservation(ride.id)" class="btn btn-danger" > Cancel </button>
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
            </div>
            </div>
            </div>
  
    <div class="container mt-5">
        <div class="row justify-content-center mt-4">
        <div class="col-md-10">
          <fieldset class="rounded p-4 custom-border">
            <legend class="legend-label">Your rides history as driver : </legend>
            <!-- table -->
            
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Departure</th>
                  <th scope="col">Arrival</th>
                  <th scope="col">Number of places</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
                <tbody v-if = "ridesAsDriver.length > 0">
                    <tr v-for="ride in ridesAsDriver" :key="ride.id">
                    <td>{{ ride.dateDepart }}</td>
                    <td>{{ ride.pointDepart }}</td>
                    <td>{{ ride.pointArrive }}</td>
                    <td>{{ ride.nbPlaces }}</td>
                    <td>{{ ride.montant }} DT</td>
                  
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
            <legend class="legend-label">Your rides history as passenger : </legend>
            <!-- table -->
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Departure</th>
                  <th scope="col">Arrival</th>
                  <th scope="col">Number of places</th>
                  <th scope="col">Price</th>
                  <th scope="col">Review</th>

                </tr>
                </thead>
                <tbody v-if = "ridesAsPassenger.length > 0">
                    <tr v-for="ride in ridesAsPassenger" :key="ride.id">
                    <td>{{ ride.dateDepart }}</td>
                    <td>{{ ride.pointDepart }}</td>
                    <td>{{ ride.pointArrive }}</td>
                    <td>{{ ride.nbPlaces }}</td>
                    <td>{{ ride.montant }} DT</td>
                    <td> 
                        <button @click="reviewDriver(ride.id)" class="btn btn-primary" > Review </button>
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
            

          



            </div>
            </div>


      </div>

      </template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { onMounted } from 'vue';

const rides =ref([]);
const ridesAsDriver = ref([]);
const ridesAsPassenger = ref([]);
const ridesIds = ref([]);

const userId = localStorage.getItem('user_id');


const getRidesAsPassg = () => {
    
    axios.get(`http://localhost:8000/api/listePassager/${userId}`).then(response => {
        rides.value = response.data;
        console.log(rides.value); 
        console.log("userid",userId); 
        console.log(rides.value.length); 

        for(var i = 0; i<rides.value.length;i++)
        {
            console.log("d5alt"); 
            console.log("i",i);

            axios.get(`http://localhost:8000/api/trajets/${rides.value[i].idTrajet}`).then(response => {
                ridesAsPassenger.value.push(response.data);

}
    )}
})

console.log("aaa",ridesAsPassenger);
    
    
};

const getRidesAsDriver = () => {
    axios.get(`http://localhost:8000/api/trajetsbydriver/${userId}`).then(response => {
        rides.value = response.data;
        console.log("sawe9",rides);
        ridesAsDriver.value=response.data
    }).catch(error => {
        console.error('Error retrieving driver rides:', error);
    });
};




onMounted(() => {
    getRidesAsPassg();
   getRidesAsDriver();    

});

const cancelReservation = (id) =>
{
    axios.delete(`http://localhost:8000/api/trajets/${id}`);
}

const reviewDriver = (id) =>
{
    //show modal component
    
    
}

</script>
<style scoped>
:root{
  --yellow:#EBB14D;
  --darkblue:#3A3C6C;
  --light:#cfd8ef;
  --white:#fff;
}
.custom-border {
  border: 1px solid #ced4da;
}
.legend-label {
  font-size: 1.2rem;
  color: var(--darkblue);
}
.save-change {
background: #EBB14D;
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
border-radius: 10px; /* Add border radius */
border: 1px solid #ced4da; /* Add border */


}

.ribbon .container {
display: flex;
justify-content: flex-start; /* Align links to the left */
}

.ribbon .container .nav-link {
color: black;
text-decoration: none;
transition: color 0.3s ease;
margin-right: 10px; /* Add space between links */
}

.ribbon .container .separator {
margin-top: 5px;
color: black;
margin-right: 10px; /* Add space between links */
}

.ribbon .container .nav-link:hover {
color: var(--darkblue)
}
</style>