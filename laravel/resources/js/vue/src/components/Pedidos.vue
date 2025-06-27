<template>
  <div>
    <NavBar :logo="logo_src"/>
    <h1>Gerenciar Pedidos:</h1>
    <Filter :burgers="burgers"/>
    <Dashboard :burgers="burgers"/>
    <Footer />
  </div>
</template>

<script>
import NavBar from "./NavBar.vue"
import Footer from "./Footer.vue"
import Dashboard from "./Dashboard.vue"
import Filter from "./Filter.vue"


export default {
  data(){
    return{
      logo_src: "/img/logo.png",
    }
  },
  components: {
    Dashboard,
    NavBar,
    Footer,
    Filter
  },
  props: {
    burgers: {
    type: Object,
    default: () => [] 
  }
  },
  mounted(){
  }
}
</script>

<style  scoped>
  #footer{
    position:relative;
    margin-top: 2%;
  }
  h1{
    margin-top: 2%;
  }
</style>
