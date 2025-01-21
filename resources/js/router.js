import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'Home',
            component: () => import('../js/components/HomeComponent.vue')
        },
        {
            path: '/mainMenu',
            name: 'MainMenu',
            component: () => import('../js/components/MainMenuComponent.vue')
        },
        {
            path: '/personal',
            name: 'Personal',
            component: () => import('../js/components/Personal_InfoComponent.vue')
        },
        {
            path: '/addImg',
            name: 'AddImg',
            component: () => import('../js/components/ImageAdd.vue')
        },
        {
            path: '/readPolicy',
            name: 'ReadPolicy',
            component: () => import('../js/components/ReadThePolicy.vue')
        },
        {
            path: '/fin',
            name: 'Final',
            component: () => import('../js/components/Final.vue')
        },
        {
            path: '/theNews',
            name: 'News',
            component: () => import('../js/components/theNews.vue')
        },
    ]
})
export default router
