import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

import router from './router'
import App from './components/App'

Vue.use(Vuetify, {
    iconfont: 'md',
    theme: {
        primary: 'cyan darken-3'
    }
})


new Vue({
    el: '#app',
    components: { App },
    router,
});