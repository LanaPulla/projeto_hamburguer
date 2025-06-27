<template>
    <div id="burger-table">
        <Message :msg="msg" v-show="msg" />
        <div>
            <div id="burger-table-heading">
                <div class="order-id">#:</div>
                <div>Cliente:</div>
                <div>Pão:</div>
                <div>Carne:</div>
                <div>Opcionais:</div>
                <div>Ações:</div>
            </div>
        </div>
        <div id="burger-table-rows">
            <div class="burger-table-row" v-for="burger in burgers" :key="burger.id">
                <div class="order-number">{{ burger.id }}</div>
                <div>{{ burger.person_name }}</div>
                <div>{{ burger.bread_name }} </div>
                <div>{{ burger.meat_name }}</div>
                <div>
                    <ul>
                        <li v-for="(opcional, index) in burger.optional_name" :key="index">{{ opcional }}</li>
                    </ul>
                </div>
                <div>
                    <select name="status" class="status" @change="updateStatus($event, burger.id)">
                        <option value="">Selecione</option>
                          <option v-for="status in allStatus" :key="status.id" :value="status.id" :selected="status.id === burger.status_id">{{ status.value}}</option>
                    </select>
                    <button class="delete-btn"  @click="deleteBurger(burger.id)">Cancelar Pedido</button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import Message from "./Message.vue"

export default {
    name: "Dashboard", 
    props: {
      burgers: {
      type: Object,
      required: true
    }
  }, 
    data(){
        return{
          allStatus:[],
          msg: null
        }
    },
    components:{
        Message,
    },
    methods: {
        async getStatus() {
          const req = await fetch("/api/status");
          const data = await req.json();
          this.allStatus = data;
      },

        async updateStatus(event, id){
          const selectedValue = event.target.value;
          const data = {
          status_id: selectedValue,
        };

        console.log("Enviando dados:", data);

        const dataJson = JSON.stringify(data);
        const token = document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content");

        const req = await fetch(`/burger/pedidos/${id}/alterar-status`, {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
              "Accept": "application/json",
              "X-CSRF-TOKEN": token,
            },
            body: dataJson,
          });
        },
        async deleteBurger(id){
          const token = document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content");

          await fetch(`/burger/pedidos/${id}/delete`, {
            method: "DELETE",
            headers: {
              "Content-Type": "application/json",
              "Accept": "application/json",
              "X-CSRF-TOKEN": token,
            },
          })
          .then(res => res.json())
          .then(res => {
            this.msg = res.message;
            setTimeout(() => this.msg = "", 7000);
            delete this.burgers[id];
          })
          .catch(error => {
            console.error("Erro ao deletar pedido:", error);
          })
        },
    },
    created(){
      this.getStatus();
      console.log("dashboard:",this.burgers);
    }
    
}
</script>

<style scoped>
   #burger-table {
    max-width: 1200px;
    margin: 0 auto;
  }

  #burger-table-heading,
  #burger-table-rows,
  .burger-table-row {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }

  #burger-table-heading {
    font-weight: bold;
    padding: 12px;
    border-bottom: 3px solid #333;
  }

  .burger-table-row {
    width: 100%;
    padding: 12px;
    border-bottom: 1px solid #CCC;
  }

  #burger-table-heading div,
  .burger-table-row div {
    width: 19%;
  }

  #burger-table-heading .order-id,
  .burger-table-row .order-number {
    width: 5%;
  }

  select {
    padding: 12px 6px;
    margin-right: 12px;
  }

  .delete-btn {
    background-color: #222;
    color:#fcba03;
    font-weight: bold;
    border: 2px solid #222;
    padding: 10px;
    font-size: 16px;
    margin: 0 auto;
    cursor: pointer;
    transition: .5s;
    margin-top: 8px;
  }
  
  .delete-btn:hover {
    background-color: transparent;
    color: #222;
  }
  
</style>