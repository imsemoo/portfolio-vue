import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import HomeView from "../views/HomeView.vue";
import DashboardComponent from "../views/DashboardComponent.vue";
import LoginView from "../views/LoginView.vue"; // استيراد صفحة تسجيل الدخول

const routes: Array<RouteRecordRaw> = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/login",
    name: "login",
    component: LoginView,
  },
  {
    path: "/dashboard",
    name: "dashboard",
    component: DashboardComponent,
    beforeEnter: (to, from, next) => {
      const isAuthenticated = localStorage.getItem("authenticated");
      if (isAuthenticated) {
        next();
      } else {
        next("/login");
      }
    },
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
