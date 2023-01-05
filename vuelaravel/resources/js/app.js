require('./bootstrap');

import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import HelloWorld from './components/Welcome'
import Counter from './components/Counter'
import Items from './components/Items'
import cpu from './components/cpu'
import Motherboard from './components/Motherboard'
import gpu from './components/Gpu'
import ram from './components/Ram'
import Storage from './components/Storage'
import Power from './components/Power'
import Custom from './components/Custom'
import Checkout from './components/Checkout'

const app = createApp({})

//import the component and define its html name
app.component('hello-world', HelloWorld)
app.component('Counter', Counter)
app.component('Item', Items)
app.component('cpu', cpu)
app.component('Motherboard', Motherboard)
app.component('gpu', gpu)
app.component('ram', ram)
app.component('Storage', Storage)
app.component('Power', Power)
app.component('Custom', Custom)
app.component('Checkout', Checkout)

const router = createRouter({
    history: createWebHistory(),
    routes: [
      {
        path: '/',
        name: 'home',
        component: () => import('./components/Home.vue')
      },
      {
        path: '/cpu',
        name: 'cpu',
        component: () => import('./components/cpu.vue')
      },
      {
        path: '/motherboard',
        name: 'motherboard',
        component: () => import('./components/Motherboard.vue')
      },
      {
        path: '/gpu',
        name: 'gpu',
        component: () => import('./components/Gpu.vue')
      },
      {
        path: '/ram',
        name: 'ram',
        component: () => import('./components/Ram.vue')
      },
      {
        path: '/storage',
        name: 'storage',
        component: () => import('./components/Storage.vue')
      },
      {
        path: '/power',
        name: 'power',
        component: () => import('./components/Power.vue')
      },
      {
        path: '/custom',
        name: 'custom',
        component: () => import('./components/Custom.vue')
      },
      {
        path: '/checkout',
        name: 'checkout',
        component: () => import('./components/Checkout.vue')
      },
      
    ]
})

app.use(router);
app.mount('#app')
