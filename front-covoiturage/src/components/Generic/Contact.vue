<template>
    <nav>
    <div class="ribbon">
      <div class="container">
        <router-link to="/" class="nav-link">Home</router-link> 
        <span class="separator">/</span> 
        <router-link to="/contact" class="nav-link">Contact</router-link>
      </div>
    </div>
  </nav>

  <!-- contact page content-->

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
        <div class="col-md-11">
            <fieldset class="rounded p-4 custom-border">
            <legend class="legend-label">Contact Us</legend>
            <form @submit.prevent="submitForm">
                <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" v-model="name" class="form-control" required>
                </div>
    
                <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" v-model="email" class="form-control" required>
                </div>
    
                <div class="mb-3">
                <label for="subject" class="form-label">Subject:</label>
                <input type="text" id="subject" v-model="subject" class="form-control" required>
                </div>
    
                <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea id="message" v-model="message" class="form-control" required></textarea>
                </div>
    
                <button type="submit" class="btn save-change">Send</button>
            </form>
            </fieldset>
        
    </div>
    </div>
    </div>
  


  </template>

  
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

  <script>

    export default {
        data() {
        return {
            name: '',
            email: '',
            subject: '',
            message: ''
        }
        },
        methods: {
        submitForm() {
            console.log(this.name, this.email, this.subject, this.message)
        }
        }
    }



</script>