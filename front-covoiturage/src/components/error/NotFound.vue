<template>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-10">
         

            <!-- 404 NOT ALLOWED MESSAGE -->

            <div class="card mt-2 mb-2">
              <div class="card-body">
                <h1 class="text-center">404</h1>
                <h3 class="text-center">Page Not Found</h3>
              </div>

            </div>
        </div>  
        </div>
        </div>
        </template>
    
  <script setup>
  import axios from "axios";
  import { useRouter } from "vue-router";
  const router = useRouter();
  
  const user = {
    email: "",
    password: "",
  };
  
  const login = () => {
    axios
      .post("http://localhost:8000/api/login", user)
      .then((response) => {
        localStorage.setItem("token", response.data.token);
        localStorage.setItem("nom", response.data.user.nom);
        localStorage.setItem("prenom", response.data.user.prenom);
        localStorage.setItem("email", response.data.user.email);
        localStorage.setItem("user_id", response.data.user.id);
        localStorage.setItem("isLoggedin", true);
  
        setTimeout(() => {
          router.push({ name: "Landing" });
        }, 1000);
      })
      .catch((error) => {
        console.log(error);
      });
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
  .save-change {
    background: #ebb14d;
    color: white;
    border: none;
    font-size: 16px;
    float: right;
    cursor: pointer;
    width: 200px;
  }
  </style>