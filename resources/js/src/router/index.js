//import vue router
import { createRouter, createWebHistory } from 'vue-router'

//define a routes
const routes = [
  {
      path: '/',
      name: 'home',
      component: () => import( /* webpackChunkName: "home" */ '../views/home.vue')
  },
  {
      path: '/tags',
      name: 'posts.tags',
      component: () => import( /* webpackChunkName: "create" */ '../views/posts/tags.vue')
  },
  {
    path: '/faqs',
    name: 'posts.faqs',
    component: () => import( /* webpackChunkName: "faqs" */ '../views/posts/faqs.vue')
},
{
    path: '/login',
    name: 'posts.login',
    component: () => import( /* webpackChunkName: "faqs" */ '../views/posts/redirect.vue'),
}
]


//create router
const router = createRouter({
    history: createWebHistory(),
    routes // <-- routes,
})

export default router