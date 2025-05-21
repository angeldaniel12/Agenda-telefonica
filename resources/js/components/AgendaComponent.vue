<template>
  <div>
    <h2>Agregar Contacto</h2>
    <form @submit.prevent="guardarContacto">
      <div class="mb-3">
        <label>Nombre</label>
        <input v-model="form.nombre" class="form-control" placeholder="Nombre completo" />
      </div>

      <div class="mb-3">
        <label>Teléfono</label>
        <input v-model="form.telefono" type="text" class="form-control" placeholder="Teléfono a 10 dígitos" />
      </div>

      <div class="mb-3">
        <label>Fecha de nacimiento</label>
        <input v-model="form.fecha_nacimiento" type="date" class="form-control" />
      </div>

      <button type="submit" class="btn btn-success">
        <i class="bi bi-save me-1"></i> Agregar
      </button>
    </form>

    <div v-if="errores.length" class="alert alert-danger mt-3">
      <ul>
        <li v-for="error in errores" :key="error">{{ error }}</li>
      </ul>
    </div>
  </div>
</template>
<script>
import axios from 'axios';

export default {
  data() {
    return {
      form: {
        nombre: '',
        telefono: '',
        fecha_nacimiento: '',
      },
      errores: [],
    };
  },
  methods: {
    guardarContacto() {
      this.errores = [];
      axios
        .post('/api/contactos', this.form)
        .then(() => {
          alert('Contacto agregado con éxito');
          this.form = { nombre: '', telefono: '', fecha_nacimiento: '' };
        })
        .catch((error) => {
          if (error.response?.data?.errors) {
            this.errores = Object.values(error.response.data.errors).flat();
          }
        });
    },
  },
};
</script>
