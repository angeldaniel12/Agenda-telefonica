
import { createRouter, createWebHistory } from 'vue-router';
import AgregarContacto from '../components/AgendaComponent.vue';
import EditarContacto from '../components/EditarContacto.vue';

const routes = [
  // { path: '/', redirect: '/agregar' },
  { path: '/agregar', component: AgregarContacto },
  { path: '/editar', component: EditarContacto },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;

