<template>

  <div class="container-fluid d-flex justify-content-center spaced ml-5">
    <div class="row mt-2 px-3">
      <div v-for="(card, index) in cards" :key="index" class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card" style="width: 15rem;">
              <img
            src="https://png.pngtree.com/png-vector/20190701/ourmid/pngtree-route-icon-in-trendy-style-isolated-background-png-image_1524893.jpg"
            class="card-img-top" width="100%">
          <div class="card-body pt-0 px-2">
            <div class="d-flex flex-row justify-content-between mb-0 pl-3 pr-3 mt-1">
              <div class="d-flex flex-column"><small class="text-muted mb-1">Chauffeur</small>
                <h6>Foulen Ben Foulen</h6>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between pl-3 pr-3 mid">
              <div class="d-flex flex-column"><small class="text-muted mb-1">Téléphone</small>
                <h6>22 222 222</h6>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between px-3 pb-1">
              <div class="d-flex flex-column"><span class="text-muted mb-1">Véhicule</span>
                <h6>Beskla</h6>
              </div>
              <div class="d-flex flex-column"><span class="text-muted mb-1">Série</span>
                <h6>999</h6>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between pl-3 pr-3 mid">
              <div class="d-flex flex-column"><small class="text-muted mb-1">Date</small>
                <h6>12/12/2021</h6>
              </div>
              <div class="d-flex flex-column"><small class="text-muted mb-1">Heure</small>
                <h6>12:00</h6>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between pl-3 pr-3 mid">
              <div class="d-flex flex-column"><small class="text-muted mb-1">Départ</small>
                <h6>Tunis</h6>
              </div>
              <div class="d-flex flex-column"><small class="text-muted mb-1">Arrivée</small>
                <h6>Sousse</h6>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between pl-3 pr-3 mid">
              <div class="d-flex flex-column"><small class="text-muted mb-1">Nombre de places</small>
                <h6>3</h6>
              </div>
              <div class="d-flex flex-column"><small class="text-muted mb-1">Places restantes</small>
                <h6>2</h6>
              </div>
            </div>
            <hr class="mt-1 mx-1">
            <div class="d-flex flex-col justify-content-between pl-3 pr-3 pb-1">
              <div class="d-flex flex-column mid">
                <span class="text-muted">Options :</span>
                <div class="d-flex flex-column mt-2 ">
                  <div class="d-flex flex-row align-items-center"><i class="fas fa-snowflake mr-2"></i>
                    <h5 class="mb-0">Climatisation activée </h5>
                  </div>
                  <div class="d-flex flex-row align-items-center"><i class="fas fa-smoking mr-2"></i>
                    <h5 class="mb-0">Accepte les fumeurs</h5>
                  </div>
                  <div class="d-flex flex-row align-items-center"><i class="fas fa-paw mr-2"></i>
                    <h5 class="mb-0">Accepte les animaux</h5>
                  </div>
                  <div class="d-flex flex-row align-items-center"><i class="fas fa-suitcase mr-2"></i>
                    <h5 class="mb-0">Baggage leger</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between pl-3 pr-3 pt-2">
              <div class="d-flex flex-column"><small class="text-muted mb-1">Montant</small>
                <h6>35,000 TND</h6>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <button class="btn reserve">Réserver votre place!</button>
          </div>
        </div>
        </div>


       
    </div>
    
  </div>
</template>



<script>

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');

body {
  background: #F5F1EE;
  font-family: 'Roboto', sans-serif;
}

.card {
  width: 250px;
  border-radius: 10px;
}

.card-img-top {
  border-top-right-radius: 10px;
  border-top-left-radius: 10px;
}

span.text-muted {
  font-size: 12px;
}

small.text-muted {
  font-size: 10px;
}

h5.mb-0 {
  font-size: 1rem;
}

small.ghj {
  font-size: 9px;
}

.mid {
  background: #ECEDF1;
}

h6.ml-1 {
  font-size: 13px;
}

small.key {
  text-decoration: underline;
  font-size: 9px;
  cursor: pointer;
}

.btn-danger {
  color: #FFCBD2;
}

.btn-danger:focus {
  box-shadow: none;
}

small.justify-content-center {
  font-size: 9px;
  cursor: pointer;
  text-decoration: underline;

}

.spaced {
  padding: 20px;
}



.reserve {
  background: #EBB14D;
  color: white;
  border: none;
  font-size: 16px;
  float: right;
  cursor: pointer;
}


.spaced>* {
  margin: 5px;
}

@media screen and (max-width:600px) {
  .col-sm-4 {
    margin-bottom: 50px;
  }
}
</style>

<script>
export default {
  data() {
    return {
      cards: [
        { id: 1, title: 'Card 1' },
        { id: 2, title: 'Card 2' },
        { id: 3, title: 'Card 3' },
        { id: 4, title: 'Card 4' },
        { id: 5, title: 'Card 5' },
        { id: 6, title: 'Card 6' },
        { id: 7, title: 'Card 7' },
        { id: 8, title: 'Card 8' },
        { id: 9, title: 'Card 9' },
        { id: 10, title: 'Card 10' },
       
      ],
    };
  },
  computed: {
    limitedCards() {
      return this.cards.slice(0, 3);
    },
  },
};
</script>