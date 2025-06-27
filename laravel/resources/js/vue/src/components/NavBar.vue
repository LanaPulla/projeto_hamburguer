<template>
      <div id="nav">
        <a id="logo-url">
            <img :src="logo" :alt="alt" id="logo">    
        </a> 
        <a :href="routes.home">Home</a> 
        <a :href="routes.pedidos">Pedidos</a>
    </div >
</template>

<script>

export default {
    name: "NavBar",
    props: ["logo", "alt"],

    data(){
        return{
            routes: [],
        }
    },

    methods: {
        async getRoute() {
        const req = await fetch("/api/rotas");
        const data = await req.json();
        this.routes = data;
        }
    },
    mounted(){
        this.getRoute();
    }
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
        font-weight: bold;
    }
</style>
