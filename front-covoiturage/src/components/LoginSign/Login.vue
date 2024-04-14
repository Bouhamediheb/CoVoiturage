<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <fieldset class="rounded p-4 custom-border">
          <legend class="legend-label">Login</legend>
          <form @submit.prevent="submitForm">
            <div class="mb-3">
              <label for="emailAddress" class="form-label"
                >Mail Address :</label
              >
              <input
                type="email"
                id="emailAddress"
                v-model="user.email"
                class="form-control"
                required
              />
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password :</label>
              <input
                type="password"
                id="password"
                v-model="user.password"
                class="form-control"
                required
              />
            </div>
          </form>
        </fieldset>
      </div>
    </div>

    <div class="row justify-content-center mt-4 mb-4">
      <div class="col-md-10 text-center">
        <button class="btn save-change" @click="login">Login</button>
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