<template>
  <div>
    <Message :msg="msg" v-show="msg" />
    <div>
      <form id="burger-form" @submit="createBurger">
        <div class="input-container">
          <label for="nome">Nome do Cliente</label>
          <input
            type="text"
            id="nome"
            name="nome"
            v-model="nome"
            placeholder="Digite o seu nome"
          />
        </div>

        <div class="input-container">
          <label for="pao">Escolha o pão:</label>
          <select name="pao" id="pao" v-model="pao">
            <option value="">Selecione o seu pão</option>
            <option v-for="pao in paes" :key="pao.id" :value="pao.tipo"> {{ pao.tipo }}</option>
          </select>
        </div>

        <div class="input-container">
          <label id="opcionais-title" for="carne">Escolha a carne do seu burger</label>
          <select name="carne" id="carne" v-model="carne">
            <option value="">Selecione o tipo de carne</option>
            <option v-for="carne in carnes" :key="carne.id" :value="carne.tipo">{{ carne.tipo }}</option>
          </select>
        </div>

        <div id="opcionais-container" class="input-container" >
          <label for="opcionais">Selecione os opcionais:</label>
          <div class="checkbox-container" v-for="opcionail in opcionaisdata" :key="opcionail.id">
            <input
              name="opcionais"
              type="checkbox"
              v-model="opcionais"
             :value="opcionail.tipo"
            />
            <span>{{ opcionail.tipo }}</span>
          </div>
        </div>

        <div class="input-container">
          <input class="submit-btn" type="submit" value="Criar meu Burger!" />
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Message from "./Message.vue"
export default {
  name: "BurgerForm",

  components:{
    Message,
  },
  data() {
    return {
        paes: null, //propriedades no plural sao as informacoes q vao vir do json
        carnes: null,
        opcionaisdata: null,
        nome: null,
        pao: null,
        carne: null,
        opcionais: [],
        msg: null
    };
  },
  methods:{
    async getIngredientes(){
        const req = await fetch("http://localhost:3000/ingredientes");
        const data = await req.json();

        //console.log(data);

        this.paes = data.paes;
        this.carnes = data.carnes;
        this.opcionaisdata = data.opcionais;
    },
    async createBurger(e){
       e.preventDefault();

  // Pega os dados atuais
    const burgersReq = await fetch("http://localhost:3000/burgers");
    const burgers = await burgersReq.json();

    // Calcula o próximo ID manualmente
    const nextId = burgers.length > 0
      ? Math.max(...burgers.map((b) => parseInt(b.id))) + 1 //b = x em for(x=0;x<3;x++) / converte para int para fazer a conta pois e salvo como string
      : 1;

    const data = {
      id: nextId.toString(), // força id inteiro
      nome: this.nome,
      carne: this.carne,
      pao: this.pao,
      opcionais: Array.from(this.opcionais),
      status: "Solicitado"
    };

    const dataJson = JSON.stringify(data);

    const req = await fetch("http://localhost:3000/burgers", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: dataJson
    });

    const res = await req.json();

    this.msg = `Pedido N° ${res.id} realizado com sucesso`;

    setTimeout(() => this.msg = "", 3000);

    this.nome = "";
    this.carne = "";
    this.pao = "";
    this.opcionais = [];
      }
  },
  mounted(){
      this.getIngredientes();
    }
};
</script>

<style scoped>
    #burger-form {
        max-width: 400px;
        margin: 0 auto;
    }
    .input-container {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }
    label {
        font-weight: bold;
        margin-bottom: 15px;
        color: #222;
        padding: 5px 10px;
        border-left: 4px solid #fcba03;
    }
    input,
    select {
        margin-bottom: 15px;
        padding: 5px 10px;
        width: 300px;
    }
    #opcionais-container {
        flex-direction: row;
        flex-wrap: wrap;
    }
    .checkbox-container {
        display: flex;
        align-items: flex-start;
        width: 50%;
        margin-bottom: 20px;
    }
    .checkbox-container span,
    .checkbox-container input {
        width: auto;
    }
    .checkbox-container span {
        margin-left: 6px;
        font-weight: bold;
    }
    .submit-btn {
        background-color: #222;
        color: #fcba03;
        font-weight: bold;
        border: 2px solid #222;
        padding: 10px;
        font-size: 16px;
        margin: 0 auto;
        border-radius: 3px;
        cursor: pointer;
        transition: 0.5s;
    }
    .submit-btn:hover {
        background-color: transparent;
        color: #222;
    }
</style>
