import { createRouter, createWebHistory } from 'vue-router'
import DashBoard from '../components/dasboard.vue'
import Appointment from '../pages/appointment.vue'
import User from '../pages/user.vue'
import Client from '../text/Index.vue'

const routes = [
  {
    path: '/admin/dashboard',
    name: 'DashBoard',
    component: DashBoard
  },
  {
    path: '/clients',
    name: 'Client',
    component: Client
  },
  {
    path: '/admin/appointment',
    name: 'Appointment',
    component: Appointment
  },
  {
    path: '/admin/user',
    name: 'User',
    component: User
  },
//   {
//     path: '/add-new',
//     name: 'Add',
//   },
//   {
//     path: '/about',
//     name: 'About',
//     // route level code-splitting
//     // this generates a separate chunk (about.[hash].js) for this route
//     // which is lazy-loaded when the route is visited.
//     component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
//   }
]
const router = createRouter({
  history: createWebHistory(),
  routes
})
export default router
