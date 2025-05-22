<template>
      <div id="nav">
        <router-link to="/" id="logo-url">
            <img :src="logo" :alt="alt" id="logo">    
        </router-link> 
        <router-link to="/">Home</router-link> 
        <router-link to="/pedidos">Pedidos</router-link>
    </div >
</template>

<script>

export default {
    name: "NavBar",
    props: ["logo", "alt"]
}
</script>

<style scoped>
    
    #nav {
        background-color: #222;
        border-bottom: 4px solid #111; 
        padding: 15px 35px;
        display: flex;
        align-items: center;
    }
 
     #nav #logo-url { /*para nao pegar o css dos outros componentes bota os dois*/
        margin: auto; 
        margin-left: 0;
    }

    #logo {
        width: 50px;
        height: 50px;
    }

    #nav a {
        color: #fcba03;
        text-decoration: none;
        margin: 12px;
    }
</style>
