<template>
    <nav>
    <div class="ribbon">
      <div class="container">
        <router-link to="/" class="nav-link">Home</router-link> 
        <span class="separator">/</span> 
        <router-link to="/addpreferences" class="nav-link">Add Preferences</router-link>
      </div>
    </div>
  </nav>
  
    <div class="container mt-5">
      
    
     
  
      <div class="row justify-content-center mt-4">
        <div class="col-md-10">
          <fieldset class="rounded p-4 custom-border">
            <legend class="legend-label">Car Information</legend>
            <form>
              <div class="mb-3">
                <label for="carName" class="form-label">Car Photo:</label>
                <input type="file" id="carPhoto" class="form-control" required>

              </div>

              <div class="mb-3">
                <label for="carName" class="form-label">Car Name:</label>
                <input type="text" id="carName" v-model="carInfo.name" class="form-control" required placeholder="ie : C Class">
              </div>
  
              <div class="mb-3">
                <label for="carManufacturer" class="form-label">Car Manufacturer:</label>
                <input type="text" id="carManufacturer" v-model="carInfo.manufacturer" class="form-control" required placeholder="ie : Mercedes">
              </div>
  
              <div class="mb-3">
                <label for="carMatricule" class="form-label">Car License Plate:</label>
                <input type="text" id="carMatricule" v-model="carInfo.matricule" class="form-control" required placeholder="ie : 999 TUN 999">
              </div>
  
              <div class="mb-3">
                <label for="carYear" class="form-label">Car Year:</label>
                <input type="number" id="carYear" v-model="carInfo.year" class="form-control" required placeholder="ie : 2020">
              </div>

          


            </form>
          </fieldset>
        </div>
      </div>
  
      <div class="row justify-content-center mt-4">
        <div class="col-md-10">
          <fieldset class="rounded p-4 custom-border">
            <legend class="legend-label">Car Options</legend>
            <form>
              <div class="form-check mb-3">
                <input type="checkbox" id="animals" v-model="carOptions.animals" class="form-check-input">
                <!-- icon -->
                <i class="fas fa-dog
                "></i>
                <span class="ml-2"> </span>

                <label for="animals" class="form-check-label">Animals in car?</label>
              </div>
  
              <div class="form-check mb-3">
                                <!-- icon -->

                <input type="checkbox" id="smoking" v-model="carOptions.smoking" class="form-check-input">
                <i class="fas fa-smoking"></i> 
                <span class="ml-2"> </span>

                <label for="smoking" class="form-check-label">Smoking allowed?</label>
              </div>
  
           
  
              <div class="form-check mb-3">
                <input type="checkbox" id="baby" v-model="carOptions.bebe" class="form-check-input">
                <!-- icon -->
                <i class="fas fa-baby"></i>
                <!-- space -->
                 <span class="ml-2"> </span>
                <label for="baby" class="form-check-label">Baby seat?</label>
              </div>

              <div class="form-check mb-3">
                <input type="checkbox" id="luggage" v-model="carOptions.luggage" class="form-check-input">
                <!-- icon -->
                <i class="fas fa-suitcase"></i>
                <!-- space -->
                 <span class="ml-2"> </span>
                <label for="luggage" class="form-check-label">Heavy Luggage?</label>
              </div>

              <div class="form-check mb-3">
                <input type="checkbox" id="airC" v-model="carOptions.airC" class="form-check-input">
                <!-- icon -->
                <i class="fas fa-wind"></i>
                <!-- space -->
                 <span class="ml-2"> </span>
                <label for="airC" class="form-check-label">Air Conditionning?</label>
              </div>


            
            </form>
          </fieldset>
        </div>
      </div>
  
      <div class="row justify-content-center mt-4 mb-4">
        <div class="col-md-10 text-center">
            <button class="btn save-change" @click="submitForm()" >Save</button>
        </div>
      </div>
    </div>
  </template>
  
  <script >
import axios from 'axios';


  export default {
    setup() {
      
    },
  
    
    data() {
      return {
     
     
        carInfo: {
          name: '',
          manufacturer: '',
          matricule: '',
          year: ''
        },
        carOptions: {
          animals: false,
          smoking: false,
          luggage: false,
          bebe: false,
          airC: false
        },
        currentLocation: "Home / AddPreferences", // Set the default current location
      };

    },
    methods: {
      handleFileUpload(event) {
        this.profilePicture = event.target.files[0];
      },
      submitForm() {
        console.log({
          carName : this.carInfo.name,
          carManufacturer : this.carInfo.manufacturer,
          carMatricule : this.carInfo.matricule,
          carYear : this.carInfo.year,
          animals : this.carOptions.animals,
          smoking : this.carOptions.smoking,
          luggage : this.carOptions.luggage,
          bebe : this.carOptions.bebe,
          airC : this.carOptions.airC

        });
        //if true = 1, if false = 0
        if(this.carOptions.animals == true){
          this.carOptions.animals = 1;
        }
        else{
          this.carOptions.animals = 0;
        }

        if(this.carOptions.smoking == true){
          this.carOptions.smoking = 1;
        }
        else{
          this.carOptions.smoking = 0;
        }

        if(this.carOptions.luggage == true){
          this.carOptions.luggage = 1;
        }
        else{
          this.carOptions.luggage = 0;
        }

        if(this.carOptions.bebe == true){
          this.carOptions.bebe = 1;
        }
        else{
          this.carOptions.bebe = 0;
        }

        if(this.carOptions.airC == true){
          this.carOptions.airC = 1;
        }
        else{
          this.carOptions.airC = 0;
        }

        console.log({
          carName : this.carInfo.name,
          carManufacturer : this.carInfo.manufacturer,
          carMatricule : this.carInfo.matricule,
          carYear : this.carInfo.year,
          animals : this.carOptions.animals,
          smoking : this.carOptions.smoking,
          luggage : this.carOptions.luggage,
          bebe : this.carOptions.bebe,
          airC : this.carOptions.airC,
          idConducteur : localStorage.getItem('user_id'),

        });
        axios.post('http://localhost:8000/api/voitures', {
          modele : this.carInfo.name,
          marque : this.carInfo.manufacturer,
          matricule : this.carInfo.matricule,
          annee : this.carInfo.year,
          animaux : this.carOptions.animals,
          fumeur : this.carOptions.smoking,
          baggage : this.carOptions.luggage,
          bebe : this.carOptions.bebe,
          climatisation : this.carOptions.airC,
          idConducteur : localStorage.getItem('user_id'),
        })
          .then(response => {
            console.log(response);
          })
          .catch(error => {
            console.log(error);
          });
        
      },
   
    }
  };
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