<template>
    <div class="blablacar-container">
      <div class="form-wrapper">
        <div class="card">
          <h2 class="blablacar-heading">Publish a Ride</h2>
          <div class="form-content">
            <form @submit.prevent="publishRide">
              <div class="form-group">
                <label for="origin">Origin:</label>
                <input type="text" id="origin" v-model="origin" placeholder="Enter your starting location" class="form-control">
              </div>
              <div class="form-group">
                <label for="destination">Destination:</label>
                <input type="text" id="destination" v-model="destination" placeholder="Enter your destination" class="form-control">
              </div>
              <div class="form-group">
                <label for="passengers">Number of Passengers:</label>
                <input type="number" id="passengers" v-model.number="numPassengers" min="1" placeholder="Enter available seats" class="form-control">
              </div>
              <div class="form-group">
                <label for="departureDate">Departure Date:</label>
                <input type="date" id="departureDate" v-model="departureDate" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Publish Ride</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        origin: "",
        destination: "",
        numPassengers: 1,
        departureDate: null,
      };
    },
    methods: {
      publishRide() {
        alert(`Publishing ride from ${this.origin} to ${this.destination} for ${this.numPassengers} passengers on ${this.departureDate}.`);
      }
    }
  }
  </script>
  
  <style scoped>
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
    color: #05366b;
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
    background-color: #007bff;
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
  </style>
  