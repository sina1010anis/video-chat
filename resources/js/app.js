require('./bootstrap');
import {createApp} from 'vue/dist/vue.esm-bundler.js'
import test from './components/test'
import '../css/style.css'
import '../css/messenger.css'
import Broadcaster from "./components/Broadcaster";
import Viewer from "./components/Viewer";
import Echo from 'laravel-echo';
const app = createApp({
    data: () => ({
        test: 'test',
        messages:[],
        username:''
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
        },
        searchUser(){
            if (this.username != ''){
                setInterval(()=>{
                    axios.post('/app/search/user' , {
                        data:this.username
                    }).then((res)=>{
                        if (res.data != ''){
                            $(".box").fadeIn();
                            $(".box ul").html(res.data);
                        }
                    })
                },1000)
            }else {
                $(".box").fadeOut();
                $(".box ul").html('');
            }
        }
    },
    mounted() {
        setTimeout(()=>{
            if (this.username == ''){
                $(".box").fadeOut();
                $(".box ul").html('');
            }
        },1000)
        Pusher.logToConsole = true;

        var pusher = new Pusher('ba14d1191e4b057816f1', {
            cluster: 'eu',
            forceTLS:true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', (data)=>{
            this.messages.push(data.message);
        });
    }
})

app.mount('#app');
