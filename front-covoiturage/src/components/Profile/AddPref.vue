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
      
      <div class="row justify-content-center">
        <div class="col-md-10">
          <fieldset class="rounded p-4 custom-border">
            <legend class="legend-label" >Personal Information</legend>
            <form @submit.prevent="submitForm">
              <div class="mb-3">
                <label for="firstName" class="form-label">First Name:</label>
                <input type="text" id="firstName" v-model="firstName" class="form-control" required >
              </div>
  
              <div class="mb-3">
                <label for="lastName" class="form-label">Last Name:</label>
                <input type="text" id="lastName" v-model="lastName" class="form-control" required>
              </div>
  
              <div class="mb-3">
                <label for="profilePicture" class="form-label">Profile Picture:</label>
                <input type="file" id="profilePicture" @change="handleFileUpload" accept="image/*" class="form-control">
              </div>
  
              <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" id="age" v-model="age" class="form-control" required>
              </div>
  
              <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number:</label>
                <input type="tel" id="phoneNumber" v-model="phoneNumber" class="form-control" required placeholder="ie : +21699999999">
              </div>
            </form>
          </fieldset>
        </div>
      </div>
  
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
                <input type="checkbox" id="wifi" v-model="carOptions.wifi" class="form-check-input">
                <!-- icon -->
                <i class="fas fa-wifi"></i>
                <span class="ml-2"> </span>

                <label for="wifi" class="form-check-label">WiFi available?</label>
              </div>
  
              <div class="form-check mb-3">
                <input type="checkbox" id="music" v-model="carOptions.music" class="form-check-input">
                <!-- icon -->
                <i class="fas fa-music"></i>
                <!-- space -->
                 <span class="ml-2"> </span>
                <label for="music" class="form-check-label">Music system?</label>
              </div>
            </form>
          </fieldset>
        </div>
      </div>
  
      <div class="row justify-content-center mt-4 mb-4">
        <div class="col-md-10 text-center">
            <button class="btn save-change" >Save</button>
        </div>
      </div>
    </div>
  </template>
  
  <script >

  export default {
    setup() {
      
    },
  
    
    data() {
      return {
        firstName: '',
        lastName: '',
        profilePicture: null,
        age: '',
        phoneNumber: '',
        carInfo: {
          name: '',
          manufacturer: '',
          matricule: '',
          year: ''
        },
        carOptions: {
          animals: false,
          smoking: false,
          wifi: false,
          music: false
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
          firstName: this.firstName,
          lastName: this.lastName,
          profilePicture: this.profilePicture,
          age: this.age,
          phoneNumber: this.phoneNumber,
          carInfo: this.carInfo,
          carOptions: this.carOptions
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