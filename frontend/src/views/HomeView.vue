<script setup>
import { ref } from "vue";
const data = ref([
  {
    id: 1,
    name: "rizkymfrz",
    image: "/img/user2-160x160.jpg",
    caption: "A caption for the above image.",
    images: [
      "https://images.unsplash.com/photo-1741851373559-6879db14fd8a?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      "https://images.unsplash.com/photo-1741851374723-bac450ba6733?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      "https://images.unsplash.com/photo-1741851373544-16173862b542?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    ],
  },
  {
    id: 2,
    name: "rizkymfrz",
    image: "/img/user2-160x160.jpg",
    caption: "A caption for the above image.",
    images: [
      "https://images.unsplash.com/photo-1741851373559-6879db14fd8a?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      "https://images.unsplash.com/photo-1741851374723-bac450ba6733?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      "https://images.unsplash.com/photo-1741851373544-16173862b542?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    ],
  },
  {
    id: 3,
    name: "rizkymfrz",
    image: "/img/user2-160x160.jpg",
    caption: "A caption for the above image.",
    images: [
      "https://images.unsplash.com/photo-1741851373559-6879db14fd8a?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      "https://images.unsplash.com/photo-1741851374723-bac450ba6733?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      "https://images.unsplash.com/photo-1741851373544-16173862b542?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    ],
  },
]);
</script>
<template>
  <div class="vstack gap-4">
    <div class="vstack gap-4" v-for="(item, index) in data" :key="index">
      <div class="vstack gap-2">
        <RouterLink
          :to="`/user/${item.name}`"
          class="d-flex gap-2 align-items-center text-decoration-none text-black"
        >
          <div
            class="border border-secondary rounded-circle d-flex justify-content-center align-items-center"
            :style="{ height: 32 + 'px', width: 32 + 'px' }"
          >
            <i class="fas fa-user fa-1x"></i>
          </div>
          <p class="m-0 fw-semibold">{{ item.name }}</p>
        </RouterLink>
        <figure class="figure m-0">
          <div
            :id="index.toString()"
            class="carousel slide card rounded overflow-hidden"
          >
            <div class="carousel-inner">
              <div
                v-for="(image, index) in item.images"
                :class="`carousel-item ${index === 0 ? 'active' : ''}`"
                :key="index"
              >
                <img :src="image" class="figure-img img-fluid m-0" />
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              :data-bs-target="`#${index}`"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              :data-bs-target="`#${index}`"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <figcaption class="figure-caption fs-6 fw-semibold">
            <span class="text-black">{{ item.name }}</span> {{ item.caption }}
          </figcaption>
        </figure>
      </div>
      <hr class="m-0" />
    </div>
  </div>
</template>
