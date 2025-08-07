<template>
  <div>
    <Message :msg="msg" v-show="msg" />
    <div>
      <form id="burger-form" @submit.prevent="createBurger">
        <div class="input-container">
          <label for="person_name">Nome do Cliente</label>
          <input
            type="text"
            id="person_name"
            name="person_name"
            v-model="person_name"
            placeholder="Digite o seu nome"
          />
        </div>

        <div class="input-container">
          <label for="bread_id">Escolha o pão:</label>
          <select name="bread_id" id="bread_id" v-model="bread_id">
            <option value="">Selecione o seu pão</option>
            <option v-for="bread in paes" :key="bread.id" :value="bread.id">
              {{ bread.value }}
            </option>
          </select>
        </div>

        <div class="input-container">
          <label id="opcionais-title" for="meat_id">Escolha a carne do seu burger</label>
          <select name="meat_id" id="meat_id" v-model="meat_id">
            <option value="">Selecione o tipo de carne</option>
            <option v-for="meat in carnes" :key="meat.id" :value="meat.id">
              {{ meat.value }}
            </option>
          </select>
        </div>

        <div id="opcionais-container" class="input-container">
          <label for="opcionais">Selecione os opcionais:</label>
          <div class="checkbox-container" v-for="opcional in opcionaisdata" :key="opcional.id">
            <input
              name="opcionais"
              type="checkbox"
              v-model="opcionais"
              :value="opcional.value"
            />
            <span>{{ opcional.label }}</span>
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
import Message from "./Message.vue";

export default {
  name: "BurgerForm",

  components: {
    Message,
  },

  data() {
    return {
      opcionaisdata: [],
      paes: null,
      carnes: null,
      person_name: "",
      bread_id: "",
      meat_id: "",
      opcionais: [],
      msg: null,
      errors: [], 
    };
  },

  methods: {
    async getPaes() {
      const req = await fetch("/api/paes");
      const data = await req.json();
      this.paes = data;
    },

    async getCarnes() {
      const req = await fetch("/api/carnes");
      const data = await req.json();
      this.carnes = data;
    },

    async getOpcionais() {
      const req = await fetch("/api/opcionais");
      const data = await req.json();
      this.opcionaisdata = data;
    },

    async createBurger() {
      const data = {
        person_name: this.person_name,
        meat_id: this.meat_id,
        bread_id: this.bread_id,
        opcionais: Array.from(this.opcionais),
        status_id: 0,
      };

      console.log("Enviando dados:", data);

      const dataJson = JSON.stringify(data);
      const token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");


        const req = await fetch("/burger/pedir", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": token,
          },
          body: dataJson,
        });

        if (req.status == 200) { //se o retorno da rota for true entra aqui
        const res = await req.json();
        // console.log(res);
        this.msg = res.message;
        setTimeout(() => (this.msg = ""), 7000);
        }
    
        if (req.status == 422) { //se o retorno da rota for false, entra no bloco
        const res = await req.json();
        // console.log(res);
        this.msg = res.message;
        setTimeout(() => (this.msg = ""), 7000);
        }
        // Limpa formulário
        this.person_name = "";
        this.meat_id = "";
        this.bread_id = "";
        this.opcionais = [];
    },
  },
  created() {
    this.getPaes();
    this.getCarnes();
    this.getOpcionais();
  },
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
