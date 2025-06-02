import './bootstrap';

import { createApp } from 'vue'
import App from './vue/src/App.vue'
import Pedidos from './vue/src/components/Pedidos.vue'
import router from './vue/src/router'  // Ajuste o caminho conforme sua estrutura!

const app = createApp(App)
const pedidos = createApp(Pedidos)

app.use(router)  // usa o router

app.mount('#app')
pedidos.mount('#pedidos')

