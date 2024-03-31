<template>
  <div>
    <Header/>
    <div class="signup-container">
      <router-view v-if="showSignup"/>
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
import SearchRide from './components/HomePage/SearchRide.vue'

export default {
  components: {
    Footer,
    Landing,
    Header,
    SearchRide
  },
  data() {
    return {
      showSignup: false
    };
  },
  beforeRouteEnter(to, from, next) {
    next(vm => {
      vm.showSignup = to.path == '/';
    });
  },
};
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
