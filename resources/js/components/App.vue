<template>
  <div class="container mt-4">
   <h1 class="titulo-principal">Agenda Telefónica</h1>

    <nav class="mb-4">
      <router-link
        to="/agregar"
        class="btn btn-outline-primary me-2"
        active-class="active"
      >
        Agregar Contacto
      </router-link>
      <router-link
        to="/editar"
        class="btn btn-outline-primary"
        active-class="active"
      >
        Editar / Borrar Contactos
      </router-link>
    </nav>

    <router-view></router-view>
  </div>
</template>

<script>
export default {};
</script>

