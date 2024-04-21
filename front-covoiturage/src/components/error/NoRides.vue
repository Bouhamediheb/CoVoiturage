<template>

    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-10 mb-5 mt-5">
         


            <div class="card mt-5 mb-5">
              <div class="card-body">
                <h3 class="text-center">No rides are available for the moment</h3>
              </div>

            </div>
        </div>  
        </div>
        </div>
        </template>
    
  <script setup>
  
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