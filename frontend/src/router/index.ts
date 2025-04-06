import {
  createRouter,
  createWebHistory,
  Router,
  RouteRecordRaw,
} from "vue-router";

const routes: RouteRecordRaw[] = [
  {
    path: "/auth/register",
    component: () => import("@/views/RegisterView.vue"),
  },
  {
    path: "/auth/login",
    component: () => import("@/views/LoginView.vue"),
  },
  {
    path: "/",
    component: () => import("@/views/HomeView.vue"),
    meta: { layout: "home" },
  },
  {
    path: "/explore",
    component: () => import("@/views/ExploreView.vue"),
    meta: { layout: "home" },
  },
  {
    path: "/request",
    component: () => import("@/views/RequestView.vue"),
    meta: { layout: "home" },
  },
  {
    path: "/user/:username",
    component: () => import("@/views/UserView.vue"),
    meta: { layout: "default" },
  },
  {
    path: "/user/:username/follower",
    component: () => import("@/views/UserFollowerView.vue"),
    meta: { layout: "default" },
  },
  {
    path: "/user/:username/following",
    component: () => import("@/views/UserFollowingView.vue"),
    meta: { layout: "default" },
  },
];

const router: Router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
