// import { createApp } from 'vue';
// import AgendaComponent from './components/AgendaComponent.vue';


// const app = createApp({});
// app.component('agenda-component', AgendaComponent);
// app.mount('#app');
// resources/js/app.js
import { createApp } from 'vue';
import App from './components/App.vue'; // App.vue es la raíz de tu app Vue
import router from './router/index.js';
import '../css/app.css'; // Importa tu CSS global aquí
createApp(App)
  .use(router)
  .mount('#app');
