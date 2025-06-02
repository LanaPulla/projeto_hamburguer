<template>
  <div>
    <NavBar :logo="logo_src" :alt="app_name" /> 
    <Home  />
    <Footer />
  </div>
</template>

<script>
import NavBar from './components/NavBar.vue'
import Footer from './components/Footer.vue'
import Home from './views/Home.vue'


export default {
  name:"App",
  components: {
    NavBar,
    Footer,
    Home
  },
  data(){ 
    return{
      logo_src: " /img/logo.png",
      app_name: "Make your Burguer"
    }
  }
}
</script>
<style>
  *{
    font-family:  Helvetica;
    padding:0;
    margin:0;
    box-sizing: border-box;
  }
  .main-container{
    margin:50px;
    min-height: 250px;
  }
  h1{
    text-align: center;
    font-size: 42px;
    margin-bottom: 30px;
    color: #222;
  }
</style>
