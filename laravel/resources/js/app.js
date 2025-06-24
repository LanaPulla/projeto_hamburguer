import './bootstrap';
import { createApp } from 'vue';

import App from './vue/src/App.vue';
import Pedidos from './vue/src/components/Pedidos.vue';

// Monta app para o formulário (se existir em outro lugar)
const burgerFormApp = document.querySelector('#burger-form-app');
if (burgerFormApp) {
  const formApp = createApp(App);
  formApp.mount('#burger-form-app');
}

// Monta app para a tabela de pedidos
const burgerTableApp = document.querySelector('#burger-table-app');
if (burgerTableApp) {
  const tableApp = createApp({
    components: { Pedidos },
    data() {
      return {
        burgers: window.burgers || [] // ✅ Corrigido: "burgers", não "burguers"
      }
    },
    template: `<pedidos :burgers="burgers" />` // ✅ Também corrigido aqui
  });

  tableApp.mount('#burger-table-app');
}
