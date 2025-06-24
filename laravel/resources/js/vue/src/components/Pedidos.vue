<template>
  <div>
    <NavBar :logo="logo_src"/>
    <h1>Gerenciar Pedidos:</h1>
    <Dashboard :burgers="burgers"/>
    <Footer />
  </div>
</template>

<script>
import NavBar from './NavBar.vue'
import Footer from './Footer.vue'
import Dashboard from "./Dashboard.vue"

export default {
  data(){
    return{
      logo_src: "/img/logo.png",
    }
  },
  components: {
    Dashboard,
    NavBar,
    Footer
  },
  props: {
    burgers: {
    type: Array,
    default: () => [] 
  }
  },
  mounted(){
    console.log("pedidos aqui:",this.burgers);

  }
}
</script>

<style  scoped>
  #footer{
    position:relative;
  }
</style>
