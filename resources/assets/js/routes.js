import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {
            path: '/main' ,
            component: require('./components/Main.vue'),
        },
        {
            path: '/login',
            component: require('./components/authentication/Login.vue'),
            meta: {
                forVisitors: true
            }
        },
        {
            path: '/register',
            component: require('./components/authentication/Register.vue'),
            meta: {
                forVisitors: true
            }
        },
        {
            path: '/personal',
            component: require('./components/Personal.vue'),
            meta: {
                forAuth: true
            }
        },
        {
            path: '/coordinates',
            component: require('./components/coordinates/CoordinatesList.vue'),
            meta: {
                forAuth: true
            }
        },
        {
            path: '/coordinates/create',
            component: require('./components/coordinates/CreateCoordinate.vue'),
            meta: {
                forAuth: true
            }
        },
        {
            path: '/coordinates/:coordinates/edit',
            component: require('./components/coordinates/EditCoordinate.vue'),
            meta: {
                forAuth: true
            }
        }
    ],

    linkActiveClass: 'active',

    //mode: 'history',
})

export default router