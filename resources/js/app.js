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
        username:'',
        statusMenu:false,
        text:'',
    }),
    components: {
        test,
        broadcaster:Broadcaster,
        viewer:Viewer
    },
    methods:{
        view_menu_user(){
            if (this.statusMenu){
                $('.name-user i').attr('class' , 'fas fa-arrow-circle-down pointer');
                this.statusMenu = false;
            }else {
                $('.name-user i').attr('class' , 'fas fa-arrow-circle-up pointer');
                this.statusMenu = true;
            }
            $('.box').stop().slideToggle()
        },
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
        setInterval(()=>{
            axios.post('/app/check/status/user').then((res)=>{
                $('.box ul').html(res.data)
            })
        },2000)
    }
})

app.mount('#app');
