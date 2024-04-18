<template>
  <div>
    <Header/>
    <div v-if="showSignup" class="signup-container">
      <Signup/>
    </div>
    <div v-if="showSearchRide" class="search-ride-container">
      <SearchRide/>
    </div>
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
import RideHistory from './components/History/RideHistory.vue'

export default {
  components: {
    Footer,
    Landing,
    Header,
    Signup,
    SearchRide,
    RideHistory
  },
  computed: {
    showSignup() {
      return this.$route.path === '/home' || this.$route.path === '/';
    },
    showSearchRide() {
      return this.$route.path === '/home' || this.$route.path === '/';
    }
  }
}
</script>

<style scoped>
.signup-container,
.search-ride-container {
  display: block;
  clear: both;
}

.router-view {
  display: block;
  clear: both;
  align-items: center;
}
</style>
