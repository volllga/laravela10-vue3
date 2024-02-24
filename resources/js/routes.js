import FirstComponent from "./components/FirstComponent.vue";
import Categories from "./components/Categories.vue";
import Home from "./components/Home.vue";



const routes = [
    {
        path: '/home', component: Home
    },
    {
        path: '/first', component: FirstComponent
    },
    {
        path: '/categories', component: Categories
    },
]

export default routes
