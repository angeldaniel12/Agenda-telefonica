<template>
  <div class="agenda-container">
    <h1>Agenda Telefónica</h1>


    <form @submit.prevent="guardarContacto">
      <div class="mb-3">
        <label>Nombre</label>
        <input v-model="form.nombre" class="form-control" placeholder="Nombre completo"
          @blur="actualizarCampo('nombre', form.nombre)" />
      </div>

      <div class="mb-3">
        <label>Teléfono</label>
        <input v-model="form.telefono" type="text" class="form-control" placeholder="Teléfono a 10 dígitos"
          @blur="actualizarCampo('telefono', form.telefono)" />
      </div>

      <div class="mb-3">
        <label>Fecha de nacimiento</label>
        <input v-model="form.fecha_nacimiento" type="date" class="form-control"
          @blur="actualizarCampo('fecha_nacimiento', form.fecha_nacimiento)" />
      </div>


      <button type="submit" class="btn btn-success me-2">
        <i class="bi bi-save me-1"></i>
        {{ form.id ? 'Actualizar' : 'Agregar' }}
      </button>
      <button type="button" v-if="form.id" class="btn btn-primary" @click="limpiarForm"><i
          class="bi bi-x-circle"></i>Cancelar</button>
    </form>

    <hr />


    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th>Fecha de Nacimiento</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="contacto in contactos" :key="contacto.id">
          <td>{{ contacto.id }}</td>
          <td>{{ contacto.nombre }}</td>
          <td>{{ contacto.telefono }}</td>
          <td>{{ formatDate(contacto.fecha_nacimiento) }}</td>
          <td>
            <button class="btn btn-sm btn-warning me-1" @click="editarContacto(contacto)"><i
                class="bi bi-pencil-square"></i> Editar</button>
            <button class="btn btn-sm btn-danger" @click="borrarContacto(contacto.id)"><i class="bi bi-trash"></i>
              Borrar</button>
          </td>
        </tr>
      </tbody>
    </table>


    <div v-if="errores.length" class="alert alert-danger">
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
      contactos: [],
      form: {
        id: null,
        nombre: '',
        telefono: '',
        fecha_nacimiento: '',
      },
      errores: [],
    };
  },
  mounted() {
    this.cargarContactos();
  },
  methods: {
    cargarContactos() {
      axios
        .get('/api/contactos')
        .then((res) => {
          this.contactos = res.data;
        })
        .catch((err) => {
          console.error(err);
        });
    },
    guardarContacto() {
      this.errores = [];

      const payload = {
        nombre: this.form.nombre,
        telefono: String(this.form.telefono),
        fecha_nacimiento: this.form.fecha_nacimiento,
      };
      if (this.form.id) {
        axios
          .put(`/api/contactos/${this.form.id}`, payload)
          .then(() => {
            this.cargarContactos();
            this.limpiarForm();
          })
          .catch((error) => {
            if (error.response?.data?.errors) {
              this.errores = Object.values(error.response.data.errors).flat();
            }
          });
      } else {
        axios
          .post('/api/contactos', payload)
          .then(() => {
            this.cargarContactos();
            this.limpiarForm();
          })
          .catch((error) => {
            if (error.response?.data?.errors) {
              this.errores = Object.values(error.response.data.errors).flat();
            }
          });
      }
    },
    actualizarCampo(campo, valor) {
      if (!this.form.id) return;
      this.errores = [];

      axios
        .put(`/api/contactos/${this.form.id}`, {
          [campo]: campo === 'telefono' ? String(valor) : valor,
        })
        .then(() => {
          this.cargarContactos();
        })
        .catch((error) => {
          if (error.response?.data?.errors) {
            this.errores = Object.values(error.response.data.errors).flat();
          }
        });
    },
    editarContacto(contacto) {
      this.form = { ...contacto };
      this.form.fecha_nacimiento = this.form.fecha_nacimiento?.substr(0, 10);
    },
    borrarContacto(id) {
      if (confirm('¿Seguro que quieres eliminar este contacto?')) {
        axios.delete(`/api/contactos/${id}`).then(() => {
          this.cargarContactos();
        });
      }
    },
    limpiarForm() {
      this.form = {
        id: null,
        nombre: '',
        telefono: '',
        fecha_nacimiento: '',
      };
      this.errores = [];
    },
    formatDate(date) {
      return new Date(date).toLocaleDateString('es-MX', {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
      });
    },
  },
};
</script>