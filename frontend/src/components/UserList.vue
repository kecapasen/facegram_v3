<script setup lang="ts">
import { FollowingStatus } from "@/types";
const { user } = defineProps<{
  user: {
    fullname: string;
    username: string;
    followingStatus: FollowingStatus;
  };
}>();
</script>
<template>
  <div class="hstack justify-content-between">
    <RouterLink
      :to="`/user/${user.username}`"
      class="hstack gap-2 text-decoration-none text-black"
    >
      <div
        class="border border-secondary rounded-circle d-flex justify-content-center align-items-center"
        :style="{ height: 48 + 'px', width: 48 + 'px' }"
      >
        <i class="fas fa-user fa-1x"></i>
      </div>
      <div class="vstack justify-content-center">
        <p class="m-0 fw-semibold">{{ user.fullname }}</p>
        <p class="m-0 fw-semibold text-secondary">{{ user.username }}</p>
      </div>
    </RouterLink>
    <div class="d-flex justify-center align-items-center">
      <button
        v-if="user.followingStatus === FollowingStatus.NOT_FOLLOWING"
        class="btn btn-primary px-4"
      >
        Ikuti
      </button>
      <button
        v-else-if="user.followingStatus === FollowingStatus.FOLLOWING"
        class="btn btn-outline-secondary px-4"
      >
        Mengikuti
      </button>
      <button
        v-else-if="user.followingStatus === FollowingStatus.REQUESTED"
        class="btn btn-primary px-4"
      >
        Terima
      </button>
    </div>
  </div>
</template>
