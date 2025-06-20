import './bootstrap';
import { createApp } from 'vue';

import App from './vue/src/App.vue';
import Pedidos from './vue/src/components/Pedidos.vue';

// Monta app para o formulário
const burgerFormApp = createApp(App);
burgerFormApp.mount('#burger-form-app');

// Monta app para a tabela de pedidos
const burgerTableApp = createApp({
  components: { Pedidos },
  data() {
    return {
      burguers: window.burguers || []  // se quiser passar dados JS globalmente
    }
  },
  template: `<pedidos :burguers="burguers" />`
});
burgerTableApp.mount('#burger-table-app');
