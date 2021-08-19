require('./bootstrap');
import {createApp} from 'vue/dist/vue.esm-bundler.js'
import test from './components/test'
const app = createApp({
    data:()=>({
        test:'test',
    }),
    components:{
        test,
    }
})

app.mount('#app');
