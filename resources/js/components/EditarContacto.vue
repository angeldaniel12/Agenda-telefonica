<template>
  <div>
    <h2>Editar / Borrar Contactos</h2>

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
          <td>
            <input
              v-if="editandoId === contacto.id"
              v-model="form.nombre"
              class="form-control"
            />
            <span v-else>{{ contacto.nombre }}</span>
          </td>
          <td>
            <input
              v-if="editandoId === contacto.id"
              v-model="form.telefono"
              class="form-control"
            />
            <span v-else>{{ contacto.telefono }}</span>
          </td>
          <td>
            <input
              v-if="editandoId === contacto.id"
              v-model="form.fecha_nacimiento"
              type="date"
              class="form-control"
            />
            <span v-else>{{ formatDate(contacto.fecha_nacimiento) }}</span>
          </td>
          <td>
            <div v-if="editandoId === contacto.id">
              <button
                class="btn btn-sm btn-success me-1"
                @click="actualizarContacto"
              ><i class="bi bi-check-circle-fill"></i>
                Guardar
              </button>
              <button
                class="btn btn-sm btn-secondary"
                @click="cancelarEdicion"
              ><i class="bi bi-x-circle-fill"></i>
                Cancelar
              </button>
            </div>
            <div v-else>
              <button
                class="btn btn-sm btn-warning me-1"
                @click="editarContacto(contacto)"
              >
                <i class="bi bi-pencil-square"></i> Editar
              </button>
              <button
                class="btn btn-sm btn-danger"
                @click="borrarContacto(contacto.id)"
              >
                <i class="bi bi-trash"></i> Borrar
              </button>
            </div>
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
      editandoId: null,
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
    editarContacto(contacto) {
      this.editandoId = contacto.id;
      this.form = { ...contacto };
      this.form.fecha_nacimiento = this.form.fecha_nacimiento?.substr(0, 10);
    },
    actualizarContacto() {
      this.errores = [];
      axios
        .put(`/api/contactos/${this.editandoId}`, this.form)
        .then(() => {
          this.cargarContactos();
          this.editandoId = null;
          this.limpiarForm();
          alert('Contacto actualizado');
        })
        .catch((error) => {
          if (error.response?.data?.errors) {
            this.errores = Object.values(error.response.data.errors).flat();
          }
        });
    },
    cancelarEdicion() {
      this.editandoId = null;
      this.limpiarForm();
      this.errores = [];
    },
    borrarContacto(id) {
      if (confirm('¿Seguro que quieres eliminar este contacto?')) {
        axios.delete(`/api/contactos/${id}`).then(() => {
          this.cargarContactos();
          alert('Contacto eliminado');
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
