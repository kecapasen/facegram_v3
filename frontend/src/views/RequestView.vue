<script setup lang="ts">
import UserList from "@/components/UserList.vue";
import { FollowingStatus } from "@/types";
</script>

<template>
  <div class="vstack gap-1">
    <div class="vstack gap-1" v-for="i in 5" :key="i">
      <UserList
        :user="{
          fullname: 'Rizky Maulana',
          username: 'rizkymfrz',
          followingStatus: FollowingStatus.REQUESTED,
        }"
      />
      <hr />
    </div>
  </div>
</template>
