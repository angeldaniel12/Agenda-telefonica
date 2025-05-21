// import { createApp } from 'vue';
// import AgendaComponent from './components/AgendaComponent.vue';


// const app = createApp({});
// app.component('agenda-component', AgendaComponent);
// app.mount('#app');
// resources/js/app.js
import { createApp } from 'vue';
import AgendaComponent from './components/AgendaComponent.vue';

const app = createApp({});

app.component('agenda-component', AgendaComponent);

app.mount('#app');
