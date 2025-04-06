<script setup lang="ts">
import { RouterView } from "vue-router";
</script>

<template>
  <div class="wrapper" :style="{ height: 100 + 'dvh' }">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="sidebar">
        <div
          class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center justify-content-between"
        >
          <div class="d-flex align-items-center">
            <RouterLink
              to="/user/rizkymfrz"
              class="btn btn-link d-flex align-items-center gap-2 text-decoration-none"
            >
              <div
                class="border border-secondary rounded-circle d-flex justify-content-center align-items-center"
                :style="{ height: 32 + 'px', width: 32 + 'px' }"
              >
                <i class="fas fa-user"></i>
              </div>
              <p class="m-0">Rizky Maulana</p>
            </RouterLink>
          </div>
          <div class="d-flex align-items-center">
            <button class="btn btn-link">
              <i class="text-danger fas fa-power-off"></i>
            </button>
          </div>
        </div>
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <li class="nav-item">
              <RouterLink to="/" class="nav-link d-flex align-items-center">
                <i class="nav-icon fas fa-house"></i>
                <p>Home</p>
              </RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink
                to="/explore"
                class="nav-link d-flex align-items-center"
              >
                <i class="nav-icon fas fa-compass"></i>
                <p>Explore</p>
              </RouterLink>
            </li>
            <li v-if="true" class="nav-item">
              <RouterLink
                to="/request"
                class="nav-link d-flex align-items-center"
              >
                <i class="nav-icon fas fa-envelope"></i>
                <p>Request</p>
              </RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink
                to="create"
                class="nav-link d-flex align-items-center"
              >
                <i class="nav-icon fas fa-square-plus"></i>
                <p>Create new post</p>
              </RouterLink>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div
      class="content-wrapper overflow-auto"
      :style="{ maxHeight: 100 + 'dvh' }"
    >
      <div class="container d-flex justify-content-center w-75 p-4">
        <RouterView />
      </div>
    </div>
  </div>
</template>
