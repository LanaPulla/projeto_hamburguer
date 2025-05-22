<template>
      <footer id="footer">
        <p>Make Your Burguer &copy; 2025</p>
        <!-- <router-link to="/">
            <img src="" id="logo">    
        </router-link> 
        <router-link to="/">Home</router-link> |
        <router-link to="/about">About</router-link> -->
    </footer >
</template>

<script>

export default {
    name: "Footer"
}
</script>

<style scooped>
    #footer{
        height: 100px;
        background-color:#222;
        border-top: 4px solid #111;
        color: #fcba03;
        display:flex;
        justify-content: center;
        align-items: center;
        position:relative;
        width:100%;
        bottom: 0;
        overflow-x: hidden;

    }

</style>
