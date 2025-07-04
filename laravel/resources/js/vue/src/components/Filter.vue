<template>
    <form method="GET" action="/burger/pedidos">
      <div class="filter-box">
          <label>Cliente:</label>
          <input type="text" v-model="client" name="person_name">
          <label>Status:</label>
          <div class="checkbox-container" v-for="s in allStatus" :key="s.id">
              <input
                name="status_id[]"
                type="checkbox"
                v-model="statusSelected"
                :value="s.id"
              />
              <span>{{ s.value }}</span>
            </div>
          <button class="filter-btn" type="submit">Buscar</button>
      </div>
  </form>
</template>

<script>
export default {
    name: "Filter", 
    data(){
        return{
          allStatus:[],
          statusSelected: [],
          client:'',
        }
    },
    props: {
      burgers: {
      type: Object,
      required: true
    }
  }, 
    methods: {
        async getStatus() {
          const req = await fetch("/api/status");
          const data = await req.json();
          this.allStatus = data;
            console.log(this.statusSelected);
        },
    },
    watch: {
        statusSelected(newValue){
            console.log(newValue);
        }
    }, 
    mounted(){
        this.getStatus();
    }
}
</script>
<style>
    .filter-box{
        display: flex;
        justify-content: center;
        align-items: center;
        border-top: 2px solid #CCC;
        padding:30px;
        margin:auto;
        width: 100%;
    }
    .filter-box select {
        padding: 7px 6px;
        margin-right: 5px;
        margin-left: 5px;
        font-weight: bold; 
        padding: 12px 6px;

    }
    .filter-box label {
        font-weight: bold; 
        margin-right: 5px;
        margin-left: 5px;
    }
    .filter-box span {
       padding:5px;
       font-size: 18px;;
    }
    .filter-box input {
        margin:5px;
        padding: 12px 6px;
    }   
    .filter-btn {
    background-color: #222;
    color:#fcba03;
    font-weight: bold;
    border: 2px solid #222;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    transition: .5s;
    margin-right: 5px;
    margin-left: 5px;
  }
  .filter-btn:hover {
    background-color: transparent;
    color: #222;
  }
</style>