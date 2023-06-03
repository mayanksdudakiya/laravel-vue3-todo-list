import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

const baseUrl = import.meta.env.VITE_API_URL;

const app = createApp(App)

app.provide('baseUrl', baseUrl);

app.use(router)

app.mount('#app')
