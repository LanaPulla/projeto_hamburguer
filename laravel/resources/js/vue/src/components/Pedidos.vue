<template>
  <div>
    <NavBar :logo="logo_src"/>
    <h1>Gerenciar Pedidos:</h1>
    <Dashboard />
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
  }

}
</script>

<style  scoped>
  #footer{
    position:absolute;
  }
</style>
