import '@/bootstrap';
import '../css/app.css';
import {createApp} from 'vue'
import app from "@/Layouts/MainLayout.vue";
import router from "@/routes";
import myMixin from '@/mixin.js';

createApp(app)
    .use(router)
    .mixin(myMixin)
    .mount("#app");
