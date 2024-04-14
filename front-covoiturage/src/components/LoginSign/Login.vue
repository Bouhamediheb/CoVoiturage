<template>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <fieldset class="rounded p-4 custom-border">
            <legend class="legend-label" >Login</legend>
            <form @submit.prevent="submitForm">
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
            <button class="btn save-change" @click="login">Login</button>
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
        login() {
            alert(`Login with ${this.emailAddress} and ${this.password}`);
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