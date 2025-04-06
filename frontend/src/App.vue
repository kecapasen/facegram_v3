<template>
  <component :is="layout">
    <RouterView />
  </component>
</template>

<script setup>
import HomeLayout from "@/layouts/HomeLayout.vue";
import DefaultLayout from "@/layouts/DefaultLayout.vue";
import NoLayout from "@/layouts/NoLayout.vue";
import { computed } from "vue";
import { RouterView, useRoute } from "vue-router";
const route = useRoute();

// Pilih layout berdasarkan meta route
const layout = computed(() => {
  switch (route.meta.layout) {
    case "home":
      return HomeLayout;
    case "default":
      return DefaultLayout;
    default:
      return NoLayout;
  }
});
</script>
