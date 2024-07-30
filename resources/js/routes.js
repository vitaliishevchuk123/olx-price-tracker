import {createRouter, createWebHistory} from "vue-router";
import NotFound404 from "./Pages/Errors/404.vue";
import Home from "./Pages/Announcement/Index.vue";
import Register from "./Pages/Auth/Register.vue";
import Login from "./Pages/Auth/Login.vue";
import CreateAnnouncement from "@/Pages/Announcement/Create.vue";

const routes = [
    {path: '/', name: "home", component: Home},
    {path: '/register', name: "register", component: Register},
    {path: '/login', name: "login", component: Login},
    {path: '/create-announcement', name: "create-announcement", component: CreateAnnouncement},
    {path: '/:pathMatch(.*)*', name: '404', component: NotFound404},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
