<template>
  <div>
    <Header/>
    <div class="signup-container">
      <Signup/>
  </div>
  <SearchRide/> 
  <div class="router-view">
    <RouterView/>
  </div>
    <Footer/>
  </div>
</template>

<script>
import Footer from './components/Generic/Footer.vue'
import Landing from './components/HomePage/Landing.vue'
import Header from './components/Generic/Header.vue'
import Signup from './components/HomePage/Signup.vue'
import SearchRide from './components/HomePage/SearchRide.vue'

export default {
  components: {
    Footer,
    Landing,
    Header,
    Signup,
    SearchRide
  }
}
</script>

<style scoped>
.signup-container {
  display: block;
  clear: both;
}

.router-view {
  display: block;
  clear: both;
  align-items: center;
}
</style>
