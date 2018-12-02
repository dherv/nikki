
import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import DailyList from './components/DailyList'
import Editor from './components/Editor'
import Words from './components/Words'
import Grammar from './components/Grammar'
import Login from './components/Login'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/login',
            name: 'login',
            component: Login,
            props: {}
        },
        {
            path: '/',
            name: 'home',
            component: Editor,
            props: {}
        },
        {
            path: '/dailys',
            name: 'dailys',
            component: DailyList,

        },  
        {
            path: '/editor',
            name: 'editor',
            component: Editor,

        },  
        {
            path: '/words',
            name: 'words',
            component: Words,

        },   
        {
            path: '/grammars',
            name: 'grammar',
            component: Grammar,

        },     
       
    ],
})


export default router