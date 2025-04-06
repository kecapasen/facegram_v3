<script setup lang="ts">
import { RouterView } from "vue-router";
</script>

<template>
  <div class="p-4 container vstack align-items-center gap-4 w-50">
    <button
      class="btn btn-link hstack align-items-center gap-4 text-decoration-none text-black"
      @click="$router.back"
    >
      <i class="fas fa-chevron-left fs-5"></i>
      <p class="fs-5 m-0 fw-semibold">Kembali</p>
    </button>
    <RouterView />
  </div>
</template>
