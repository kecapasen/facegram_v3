<template>
  <div class="vstack gap-2">
    <div class="hstack gap-4">
      <div
        class="border border-secondary rounded-circle d-flex justify-content-center align-items-center"
        :style="{ height: 128 + 'px', width: 128 + 'px' }"
      >
        <i class="fas fa-user fa-4x"></i>
      </div>
      <div class="vstack justify-content-center">
        <p class="m-0 fw-semibold">
          Rizky Maulana <span class="text-secondary">/ rizkymfrz</span>
        </p>
        <div class="row w-100">
          <div class="col">
            <div class="vstack">
              <p class="fs-5 fw-semibold m-0">4</p>
              <p class="m-0">postingan</p>
            </div>
          </div>
          <div class="col">
            <RouterLink
              :to="`/user/${$route.params.username}/follower`"
              class="vstack text-decoration-none text-black"
            >
              <p class="fs-5 fw-semibold m-0">117</p>
              <p class="m-0">pengikut</p>
            </RouterLink>
          </div>
          <div class="col">
            <RouterLink
              :to="`/user/${$route.params.username}/following`"
              class="vstack text-decoration-none text-black"
            >
              <p class="fs-5 fw-semibold m-0">235</p>
              <p class="m-0">mengikuti</p>
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
    <p class="m-0">It takes a long time to trust someone.</p>
    <button type="button" class="btn btn-outline-secondary">Mengikuti</button>
    <hr />
    <div class="row">
      <div class="col-4 p-0">
        <div class="ratio ratio-1x1">
          <img
            src="https://images.unsplash.com/photo-1741851373559-6879db14fd8a?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            class="object-fit-cover m-0 border border-secondary"
          />
        </div>
      </div>
      <div class="col-4 p-0">
        <div class="ratio ratio-1x1">
          <img
            src="https://images.unsplash.com/photo-1741851374723-bac450ba6733?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            class="object-fit-cover m-0 border border-secondary"
          />
        </div>
      </div>
      <div class="col-4 p-0">
        <div class="ratio ratio-1x1">
          <img
            src="https://images.unsplash.com/photo-1741851373544-16173862b542?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            class="object-fit-cover m-0 border border-secondary"
          />
        </div>
      </div>
      <div class="col-4 p-0">
        <div class="ratio ratio-1x1">
          <img
            src="https://images.unsplash.com/photo-1741850820082-ba5c8fdf4c8e?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            class="object-fit-cover m-0 border border-secondary"
          />
        </div>
      </div>
    </div>
  </div>
</template>
