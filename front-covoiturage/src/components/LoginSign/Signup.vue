<template>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <fieldset class="rounded p-4 custom-border">
            <legend class="legend-label" >Create your account</legend>
            <form @submit.prevent="submitForm">

            <div class="mb-3">
                <label for="firstName" class="form-label">First Name:</label>
                <input type="text" id="firstName" v-model="firstName" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name:</label>
                <input type="text" id="lastName" v-model="lastName" class="form-control" required>

            </div>

            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone number:</label>
                <input type="text" id="phoneNumber" v-model="phoneNumber" class="form-control" required>

            </div>

            

              <div class="mb-3">
                <label for="emailAddress" class="form-label">Mail Address :</label>
                <input type="email" id="emailAddress" v-model="emailAddress" class="form-control" required>


            </div>
  
                <div class="mb-3">
                    <label for="password" class="form-label">Password :</label>
                    <input type="password" id="password" v-model="password" class="form-control" required>
                </div>
             
  
             
  
             
  
            </form>
          </fieldset>
        </div>
      </div>
  
      
  
      <div class="row justify-content-center mt-4 mb-4">
        <div class="col-md-10 text-center">
            <button class="btn save-change" @click="register">Create Account</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>


  export default {
    setup() {
       
    },
  
    
    data() {
      return {
       
      };
    },
    methods: {
        register() {
            alert(`created with ${this.emailAddress} and ${this.password}`);
            }

        
      },
      



    
    
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
  </style>