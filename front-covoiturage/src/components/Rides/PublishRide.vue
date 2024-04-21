<template>
 
  <section class="sec-1" style="height: 1000px;">

    <div class="container"style="height: 250px;">
      <div class="col6">
        <img src="../../assets/img/ride.png" class="taxi-img">
      </div>
      <div class="col6">
        <div class="blablacar-container">
          <div class="form-wrapper">
            <div class="card">
              <h2 class="blablacar-heading">Publish your Ride</h2>
              <div class="form-content">
                <form @submit.prevent="publishRide">
                  <div class="form-group">
                    <label for="origin">Origin:</label>
                    <input type="text" id="origin" v-model="origin" placeholder="Enter your starting location" class="form-control" @input="filterOrigin" required>
                    <div v-if="(originFiltered.length > 0) && originDropdownVisible" class="autocomplete" v-show="originDropdownVisible"> 
                      <ul>
                        <li v-for="(city, index) in originFiltered" :key="index" @click="selectOrigin(city)">{{ city }}</li>
                     
                      </ul>              
                    </div>   
                     </div>
                  <div class="form-group">
                    <label for="destination">Destination:</label>
                    <input type="text" id="destination" v-model="destination" placeholder="Enter your destination" class="form-control" @input="filterDestination" required>
                    <div v-if="(destinationFiltered.length > 0) &&  destinationDropdownVisible" class="autocomplete" v-show="destinationDropdownVisible">
                      <ul>
                        <li v-for="(city, index) in destinationFiltered" :key="index" @click="selectDestination(city)">{{ city }}</li>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group">
  <label for="car">Choose a Car:</label>
  <select id="car" v-model="selectedCar" class="form-control" :disabled="cars.length === 0">
    <option :value="null">{{ placeholderText }}</option>
    <template v-if="cars.length > 0">
      <option v-for="(car, index) in cars" :key="index" :value="car.id">{{ car.marque }} {{ car.modele }} {{ car.matricule }}</option>
    </template>
  </select>
</div>
                  <div class="form-group">
                    <label for="passengers">Number of Passengers:</label>
                    <input type="number" id="passengers" v-model.number="numPassengers" min="1" max="4" placeholder="Enter available seats" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="departureDate">Departure Date:</label>
                    <input type="date" id="departureDate" v-model="departureDate" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="departureDate"> Fee :</label>
                    <input type="number" id="fee" v-model="fee" class="form-control" placeholder="Enter the fee" required>
                  </div>

                  <div class="form-group">
                    <label for="departureDate"> Description :</label>
                    <textarea id="description" v-model="description" class="form-control" required></textarea>
                  </div>
                  
                  <button type="submit" class="btn save-change" style="height: 40px;" :disabled="isFormIncomplete">Publish Ride</button>
                  <OpValidNotif v-if="showNotification" :message="notificationMessage" />

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </section>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';
import OpValidNotif from '../Generic/OpValidNotif.vue';



export default {
  data() {
    return {
      origin: "",
      destination: "",
      // Add lists for filtered origin and destination
      originFiltered: [],
      destinationFiltered: [],
      numPassengers: 1,
      departureDate: null,
      governorates: [
        "Paris", "Marseille", "Lyon", "Toulouse", "Nice", "Nantes", "Strasbourg", "Montpellier", "Bordeaux", "Lille",
        "A","aaa","aze","azee","Rennes", "Reims", "Le Havre", "Saint-Étienne", "Toulon", "Grenoble", "Angers", "Dijon", "Brest", "Le Mans",
        "Nîmes", "Aix-en-Provence", "Clermont-Ferrand", "Tours", "Amiens", "Limoges", "Villeurbanne", "Metz", "Besançon",
        "Perpignan", "Orléans", "Caen", "Mulhouse", "Boulogne-Billancourt", "Rouen", "Nancy", "Argenteuil", "Montreuil",
        "Saint-Denis", "Roubaix", "Avignon", "Tourcoing", "Poitiers", "Nanterre", "Créteil", "Versailles", "Pau",
        "Courbevoie", "Vitry-sur-Seine", "Asnières-sur-Seine", "Colombes", "Aulnay-sous-Bois", "La Rochelle", "Rueil-Malmaison",
        "Antibes", "Saint-Maur-des-Fossés", "Calais", "Champigny-sur-Marne", "Aubervilliers", "Béziers", "Bourges", "Cannes",
        "Saint-Nazaire", "Dunkerque", "Quimper", "Valence", "Colmar", "Drancy", "Mérignac", "Ajaccio", "Levallois-Perret",
        "Troyes", "Neuilly-sur-Seine", "Issy-les-Moulineaux", "Villeneuve-d'Ascq", "Noisy-le-Grand", "Antony", "Niort", "Lorient",
        "Sarcelles", "Chambéry", "Saint-Quentin", "Pessac", "Vénissieux", "Cergy", "La Seyne-sur-Mer", "Clichy", "Beauvais",
        "Cholet", "Hyères", "Ivry-sur-Seine", "Montauban", "Vannes", "La Roche-sur-Yon", "Charleville-Mézières", "Pantin",
        "Laval", "Maisons-Alfort", "Bondy", "Évry"
      ],
      originDropdownVisible: false, // Track visibility of origin dropdown
      destinationDropdownVisible: false ,
      cars: [],
      selectedCar: null,
      fee: 0,
      description: "",
      idConducteur: null,
      idVoiture: null,
      showNotification: false,
    };
  },
  mounted() {
    document.addEventListener('click', this.closeDropdowns);
    console.log("hello");


    this.user_id = localStorage.getItem('user_id');

    axios.get('http://localhost:8000/api/voitures/driver/'+ this.user_id)
    .then(response => {
      console.log(response.data);
      this.cars = response.data;

    })



    

  },
  beforeDestroy() {
    // Remove the event listener when the component is destroyed
    document.removeEventListener('click', this.closeDropdowns);
  },
  methods: {
    handleClickOutside(event) {
      // Check if the click event target is not the origin input or dropdown
      if (!this.$refs.originInput.contains(event.target) && !this.$refs.originDropdown.contains(event.target)) {
        this.originDropdownVisible = false; // Close origin dropdown
      }
      // Check if the click event target is not the destination input or dropdown
      if (!this.$refs.destinationInput.contains(event.target) && !this.$refs.destinationDropdown.contains(event.target)) {
        this.destinationDropdownVisible = false; // Close destination dropdown
      }
    },
    closeDropdowns(event) {
      // Check if the clicked element is not inside the origin or destination dropdowns
      const originDropdown = document.getElementById('origin-dropdown');
      const destinationDropdown = document.getElementById('destination-dropdown');
      console.log("closing");
      
      if (originDropdown && !originDropdown.contains(event.target)) {
        this.originDropdownVisible = false; // Close origin dropdown
      }
      
      if (destinationDropdown && !destinationDropdown.contains(event.target)) {
        this.destinationDropdownVisible = false; // Close destination dropdown
      }
    },
    filterOrigin() {
      // Filter the origin list based on user input
      this.originFiltered = this.governorates
        .filter(city => city.toLowerCase().startsWith(this.origin.toLowerCase()))
        .slice(0, 5); // Limit to the first 5 items
      this.originDropdownVisible = true; // Show origin dropdown
    },
    filterDestination() {
      // Filter the destination list based on user input
      this.destinationFiltered = this.governorates
        .filter(city => city.toLowerCase().startsWith(this.destination.toLowerCase()))
        .slice(0, 5); // Limit to the first 5 items
      this.destinationDropdownVisible = true; // Show destination dropdown
    },
    selectOrigin(city) {
      this.origin = city;
      this.originDropdownVisible = false; // Close origin dropdown when city is selected
    },
    selectDestination(city) {
      this.destination = city;
      this.destinationDropdownVisible = false; // Close destination dropdown when city is selected
    },
    publishRide() {
      const ride = {
        pointDepart: this.origin,
        pointArrive: this.destination,
        nbPlaces: this.numPassengers,
        montant: this.fee,
        description: this.description,
        idConducteur: this.user_id,
        idVoiture: this.selectedCar,
        dateDepart: this.departureDate,
      };
      console.log(ride);
      axios.post('http://localhost:8000/api/trajets', ride)
      .then(response => {
        console.log(response.data);
        this.notificationMessage = 'Ride added successfully !';

        this.showNotification = true;
        setTimeout(() => {
          this.$router.push('/');
        }, 5000);
      })
      .catch(error => {
        console.log(error);
      });
    }
  

  },
  computed: {
    placeholderText() {
      return this.cars.length === 0 ? 'No cars available' : 'Select a car';
    },
    isFormIncomplete() {
      return !(this.origin && this.destination && this.selectedCar && this.numPassengers && this.departureDate);
    }
  },
  components: {
    OpValidNotif,
  },
}
</script>

<style scoped>
:root{
	--yellow:#EBB14D;
	--darkblue:#3A3C6C;
	--light:#cfd8ef;
	--white:#fff;
}
.sec-1 {
  padding-top: 100px; /* Adjusted padding top */
  display: block; /* Added flexbox for column ordering */
  flex-direction: column-reverse; /* Reverse order of child elements */
}
.col6 {
  width: 50%;
  float: left;
  margin-top: 500px;
  padding: 0 15px; /* Add padding to the columns */
}

.image-container {
  padding: 20px; /* Add padding to the image container */
}

.card {
  width: 100%; /* Ensure the card takes full width */
}

/* Adjustments for smaller screens */
@media (max-width: 768px) {
  .col6 {
    width: 100%; /* Change column width for smaller screens */
  }
}

.container {
  max-width: 1200px; /* Set a maximum width */
  margin: 0 auto; /* Center the container horizontally */
  display: flex; /* Use flexbox */
}
.container > .col6:nth-child(1) {
  order: 2; /* Move the first .col6 to the second position */
}
.col6 {
  width: 50%; /* Each column takes 50% of the container */
}

.taxi-img {
  width: 100%; /* Make the image responsive */
}


.publish-ride-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%; /* Fill the height of the container */
  padding: 20px;
  margin-top: -20px; /* Move the card up 5 pixels */
 /* Adjust padding as needed */
}

*{margin: 0px; padding: 0px; font-family: system-ui;}
.clearfix{clear: both;}
header{padding: 10px 0px 0px 0px;}
.container {
  max-width: 1200px; /* Set a maximum width */
  margin: 0 auto; /* Center the container horizontally */
  display: flex; /* Use flexbox */
  height: 100px;
  align-items: center;
  
}

.col2{width: 20%;float: left;}
.col3{width: 25%; float: left;}
.col4{width: 33.3%;float: left;}
.col6{width: 50%; float: left;}
.input-box{display: inline-block;padding: 10px 18px;border: 1px solid #ddd;
	margin-left:60px; width: 300px;}
.input-box input{border: none; padding-left: 15px;outline: none;width: 82%; }
.logo{display: block;float: left;}
.s-btn{height: 45px;width: 52px;margin: -11px;background: #3A3C6C;
    color: white; border: none; margin-right: -20px; cursor: pointer;
}
.s-btn:hover{background: #EBB14D; color: #3A3C6C;}
.topnav li{list-style: none; float: left; padding:15px 20px;}
.topnav li a{text-decoration: none; color: #3A3C6C;}
.btn-r{padding: 11px 25px;
    background: #3A3C6C;
    color: white;
    border: none;
    margin-top: -16px;
    font-size: 15px;
    cursor: pointer;
}
.btn-r:hover{background: #EBB14D; color: #3A3C6C;}
.topnav{float: right;}
.topnav li a:hover{
	color: #EBB14D;
}
.header-bottom{background: #3A3C6C;}
.bottomnav li{list-style: none; float: left; padding: 13px 30px;}
.bottomnav li a{text-decoration: none; color:#fff; font-weight: 200;}
.active{background:#EBB14D;}
.active a{color: #3A3C6C!important;}
.b-btn{    
	padding: 13px 25px;
    background: #EBB14D;
    color: white;
    border: none;
    font-size: 16px;
    float: right;
    margin-right: 20px;
    cursor: pointer;
}
.taxi-img{width: 100%;}
.sec-1{ padding: 50px 0px 0px 0px;  height: 280px;
 background: linear-gradient(#cfd8ef, #fff);}
.heading{font-size: 50px; color: #3A3C6C;}
.sec-2{margin-top: 3%; padding: 100px 0px;}
.heading-2{color: #3A3C6C; text-align: center;}
.border{text-align: center; margin-bottom: 50px;}
.box{width: 200px; text-align: center;}
.sec-4{padding: 100px 0px;}
.box h3{font-size: 15px; color: #3A3C6C; margin:15px 0px; font-weight: 500; }
.box p{font-size: 13px; letter-spacing: 1px; line-height: 20px;}
.icon-1{font-size: 30px;background: #ecb34c;border-radius: 33px;
    color: #3a3c6c;
	height: 60px;
    width: 60px;
    line-height: 60px;
}
.heading-3{color: #3A3C6C; }
.p3{font-size: 13px; letter-spacing: 1px; line-height: 20px; width: 500px;}
.p5{font-size: 13px; letter-spacing: 1px; line-height: 20px; color: #fff;}
.p5:after{
	content: '';
	position: absolute;
	top: 75%;
	right: 5%;
	width: 50px;
	height: 50px;
	background-size: 50px;
	transform: rotateZ(184deg);
}
.content{float: left;padding: 41px;}
.sec-5{background: #3A3C6C; padding: 100px 0px; position: relative; 
	height: 150px; margin-top: -100px;}
.footer-distributed {
  background-color: #3A3C6C;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
  box-sizing: border-box;
  width: 100%;
  text-align: left;
  font: normal 16px sans-serif;
  padding: 45px 50px;
}
.footer-distributed .footer-left p {color: #fff;font-size: 14px;margin: 0;}
.footer-distributed p.footer-links {
  font-size: 18px;
  font-weight: bold;
  color: #ffffff;
  margin: 0 0 10px;
  padding: 0;
  transition: ease .25s;
}
.footer-distributed p.footer-links a {
  display: inline-block;
  line-height: 1.8;
  text-decoration: none;
  color: inherit;
  transition: ease .25s;
}
.footer-distributed .footer-links a:before {
  content: "/";
  font-size: 10px;
  left: 0;
  color: #fff;
  display: inline-block;
  padding-right: 5px;
}
.footer-distributed .footer-links .link-1:before {content: none;}
.footer-distributed .footer-right {float: right;margin-top: 6px;max-width: 180px;}
.footer-distributed .footer-right a {
  display: inline-block;
  width: 35px;
  height: 35px;
  background-color: #EBB14D;
  border-radius: 2px;
  font-size: 20px;
  color: #3A3C6C;
  text-align: center;
  line-height: 35px;
  margin-left: 3px;
  transition:all .25s;
}
.footer-distributed .footer-right a:hover{transform:scale(1.1);}
.footer-distributed p.footer-links a:hover{text-decoration:underline;}
.blablacar-container {
    display: flex;
    height: 100vh;
    overflow: hidden;
  }
  
  .form-wrapper {
    flex: 1;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding-left: 20px; /* Adjust the padding to push the card to the left */
  }
  
  .card {
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 20px;
  }
  
  .blablacar-heading {
    font-family: 'Arial', sans-serif;
    color: #3A3C6C;
    font-size: 1.8em;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
  }
  
  
  .form-group {
    margin-bottom: 15px;
  }
  
  label {
    font-weight: bold;
  }
  
  .form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }
  
  button.btn-primary {
    background-color: #3A3C6C;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  
  button.btn-primary:hover {
    background-color: #0056b3;
  }
  
  button[disabled] {
    background-color: #ddd;
    cursor: not-allowed;
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
