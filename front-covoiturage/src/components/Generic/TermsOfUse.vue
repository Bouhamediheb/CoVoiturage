<template>
    <nav>
    <div class="ribbon">
      <div class="container">
        <router-link to="/" class="nav-link">Home</router-link> 
        <span class="separator">/</span> 
        <router-link to="/terms" class="nav-link">Terms of use</router-link>
      </div>
    </div>
  </nav>

  <!-- terms of use page content-->

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
        <div class="col-md-11">
            <fieldset class="rounded p-4 custom-border">
            <legend class="legend-label">Terms of Use</legend>
            <p>
                Welcome to CoVoiturage!
                These terms and conditions outline the rules and regulations for the use of CoVoiturage's Website, located at www.covoiturage.com.
                By accessing this website we assume you accept these terms and conditions. Do not continue to use CoVoiturage if you do not agree to take all of the terms and conditions stated on this page.
                The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.
                Cookies
                We employ the use of cookies. By accessing CoVoiturage, you agreed to use cookies in agreement with the CoVoiturage's Privacy Policy.
                Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.
                License
                Unless otherwise stated, CoVoiturage and/or its licensors own the intellectual property rights for all material on CoVoiturage. All intellectual property rights are reserved. You may access this from CoVoiturage for your own personal use subjected to restrictions set in these terms and conditions.
                You must not:
                Republish material from CoVoiturage
                Sell, rent
                Sub-license
                Reproduce, duplicate or copy material from CoVoiturage
                Redistribute content from CoVoiturage
                This Agreement shall begin on the date hereof.

            </p>    
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




</script>