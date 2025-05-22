import './bootstrap';

import { createApp } from 'vue'
import App from './vue/src/App.vue'
import router from './vue/src/router'  // Ajuste o caminho conforme sua estrutura!

const app = createApp(App)

app.use(router)  // usa o router

app.mount('#app')
