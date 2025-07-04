<template>
  <div id="burger-table">
    <Message :msg="msg" v-show="msg" />

    <div id="burger-table-heading">
      <div class="order-id">#:</div>
      <div>Cliente:</div>
      <div>Pão:</div>
      <div>Carne:</div>
      <div>Opcionais:</div>
      <div>Ações:</div>
    </div>

    <div id="burger-table-rows">
      <div class="burger-table-row" v-for="burger in burgers" :key="burger.id">
        <template v-if="editingBurgerId === burger.id">
          <div class="order-number">{{ burger.id }}</div>
          <div>
            <input v-model="editingForm.person_name" />
          </div>
          <div>
            <select v-model="editingForm.bread_id">
              <option value="">Selecione o pão</option>
              <option v-for="p in paes" :key="p.id" :value="p.id">{{ p.value }}</option>
            </select>
          </div>
          <div>
            <select v-model="editingForm.meat_id">
              <option value="">Selecione a carne</option>
              <option v-for="c in carnes" :key="c.id" :value="c.id">{{ c.value }}</option>
            </select>
          </div>
          <div>
            <div class="checkbox" v-for="op in opcionaisdata" :key="op.id">
              <input type="checkbox" :value="op.value" v-model="editingForm.optional_id" />
              <label>{{ op.label }}</label>
            </div>
          </div>
          <div>
            <button class="edit-btn" @click="saveEditedBurger(burger.id)">Salvar</button>
            <button class="edit-btn" @click="cancelEdit">Cancelar</button>
          </div>
        </template>

        <template v-else>
          <div class="order-number">{{ burger.id }}</div>
          <div>{{ burger.person_name }}</div>
          <div>{{ burger.bread_name }} </div>
          <div>{{ burger.meat_name }}</div>
          <div>
            <ul>
              <li v-for="(opcional, index) in burger.optional_name" :key="index">
                {{ opcional }}
              </li>
            </ul>
          </div>
          <div>
            <select name="status" class="status" @change="updateStatus($event, burger.id)">
              <option value="">Selecione</option>
              <option v-for="status in allStatus" :key="status.id" :value="status.id" :selected="status.id === burger.status_id">
                {{ status.value }}
              </option>
            </select>
            <button class="delete-btn" @click="deleteBurger(burger.id)">Cancelar Pedido</button>
            <button class="edit-btn" @click="editBurger(burger)">Editar</button>
          </div>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import Message from "./Message.vue";

export default {
  name: "Dashboard",
  props: {
    burgers: {
      type: Object,
      required: true
    }
  },
  components: {
    Message
  },
  data() {
    return {
      allStatus: [],
      msg: null,
      editingBurgerId: null,
      editingForm: {
        person_name: "",
        bread_id: "",
        meat_id: "",
        optional_id: []
      },
      paes: [],
      carnes: [],
      opcionaisdata: []
    };
  },
  created() {
    this.getStatus();
    this.getPaes();
    this.getCarnes();
    this.getOpcionais();
    console.log("dashboard:", this.burgers);
  },
  methods: {
    async getStatus() {
      const req = await fetch("/api/status");
      const data = await req.json();
      this.allStatus = data;
    },
    async getPaes() {
      const res = await fetch("/api/paes");
      this.paes = await res.json();
    },
    async getCarnes() {
      const res = await fetch("/api/carnes");
      this.carnes = await res.json();
    },
    async getOpcionais() {
      const res = await fetch("/api/opcionais");
      this.opcionaisdata = await res.json();
    },
    editBurger(burger) {
      this.editingBurgerId = burger.id;
      this.editingForm = {
        person_name: burger.person_name,
        bread_id: burger.bread_id,
        meat_id: burger.meat_id,
        opcionais: [...burger.optional_name]
      };
    },
    cancelEdit() {
      this.editingBurgerId = null;
      this.editingForm = {
        person_name: "",
        bread_id: "",
        meat_id: "",
        opcionais: []
      };
    },
    async saveEditedBurger(id) {
      const token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
      const data = { ...this.editingForm };
      console.log(data);
      // const res = await fetch(`/burger/pedidos/${id}/editar`, {
      //   method: "POST",
      //   headers: {
      //     "Content-Type": "application/json",
      //     Accept: "application/json",
      //     "X-CSRF-TOKEN": token
      //   },
      //   body: JSON.stringify(data)
      // });
      // if (res.ok) {
      //   const result = await res.json();
      //   this.msg = result.message;
      //   setTimeout(() => (this.msg = ""), 7000);
      //   this.editingBurgerId = null;
      // }
    },
    async updateStatus(event, id) {
      const selectedValue = event.target.value;
      const data = {
        status_id: selectedValue
      };
      const dataJson = JSON.stringify(data);
      const token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
      await fetch(`/burger/pedidos/${id}/alterar-status`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          "X-CSRF-TOKEN": token
        },
        body: dataJson
      });
    },
    async deleteBurger(id) {
      const token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
      await fetch(`/burger/pedidos/${id}/delete`, {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          "X-CSRF-TOKEN": token
        }
      })
        .then(res => res.json())
        .then(res => {
          this.msg = res.message;
          setTimeout(() => (this.msg = ""), 7000);
          delete this.burgers[id];
        })
        .catch(error => {
          console.error("Erro ao deletar pedido:", error);
        });
    },
  }
};
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

.checkbox{
  display:flex;
  margin:8px;
}
.checkbox label{
  padding: 2px;
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

select,
input {
  padding: 6px;
  width: 100%;
  box-sizing: border-box;
}

.btn,
.delete-btn,
.edit-btn {
  background-color: #222;
  color: #fcba03;
  font-weight: bold;
  border: 2px solid #222;
  padding: 8px;
  margin: 5px;
  cursor: pointer;
  transition: 0.3s;
}

.btn:hover,
.delete-btn:hover,
.edit-btn:hover {
  background: transparent;
  color: #222;
}
</style>
