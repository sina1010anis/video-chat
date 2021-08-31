require('./bootstrap');
import {createApp} from 'vue/dist/vue.esm-bundler.js'
import test from './components/test'
import '../css/style.css'
import Broadcaster from "./components/Broadcaster";
import Viewer from "./components/Viewer";
import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '7f7b048aac2e2db10d2a',
    cluster: 'mt1',
    forceTLS: true
});
const app = createApp({
    data: () => ({
        test: 'test',
    }),
    components: {
        test,
        broadcaster:Broadcaster,
        viewer:Viewer
    },
    methods:{
        buyProduct(){
            axios.post('/buy').then((res) => {
                alert('ok');
            })
        }
    }
})

app.mount('#app');
