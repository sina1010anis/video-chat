<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messenger</title>
    <script src="https://kit.fontawesome.com/d4c29863c5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <div class="shit-app select-center">
            <div class="box-search">
                <div class="name-user">
                    <h3 align="center" class="set-font color-b-100">Sina</h3>
                    <span class="fl-left"><i @click="view_menu_user" class="fas fa-arrow-circle-down pointer"></i></span>
                </div>
            </div>
            <div class="box-user-search">
                <div class="box">
                    <ul style="margin: 0;padding: 0">

                    </ul>
                </div>
            </div>
            <div class="view-chat">
                <div class="chat">
                    <div class="you-message fl-left">
                        <p dir="rtl" class="set-font f-11 color-b-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem laborum maiores. Cum doloribus molestiae natus non officia quod repellendus voluptas! Aliquid dolore ducimus esse hic molestias, odit vel voluptatum.</p>
                    </div>
                    <div class="my-message fl-right">
                        <p dir="rtl" class="set-font f-11 color-b-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem laborum maiores. Cum doloribus molestiae natus non officia quod repellendus voluptas! Aliquid dolore ducimus esse hic molestias, odit vel voluptatum.</p>
                    </div>
                    <div class="you-message fl-left">
                        <p dir="rtl" class="set-font f-11 color-b-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem laborum maiores. Cum doloribus molestiae natus non officia quod repellendus voluptas! Aliquid dolore ducimus esse hic molestias, odit vel voluptatum.</p>
                    </div>
                    <div class="my-message fl-right">
                        <p dir="rtl" class="set-font f-11 color-b-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem laborum maiores. Cum doloribus molestiae natus non officia quod repellendus voluptas! Aliquid dolore ducimus esse hic molestias, odit vel voluptatum.</p>
                    </div>
                    <div class="you-message fl-left">
                        <p dir="rtl" class="set-font f-11 color-b-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem laborum maiores. Cum doloribus molestiae natus non officia quod repellendus voluptas! Aliquid dolore ducimus esse hic molestias, odit vel voluptatum.</p>
                    </div>
                    <div class="my-message fl-right">
                        <p dir="rtl" class="set-font f-11 color-b-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem laborum maiores. Cum doloribus molestiae natus non officia quod repellendus voluptas! Aliquid dolore ducimus esse hic molestias, odit vel voluptatum.</p>
                    </div>
                    <div class="you-message fl-left">
                        <p dir="rtl" class="set-font f-11 color-b-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem laborum maiores. Cum doloribus molestiae natus non officia quod repellendus voluptas! Aliquid dolore ducimus esse hic molestias, odit vel voluptatum.</p>
                    </div>
                    <div class="my-message fl-right">
                        <p dir="rtl" class="set-font f-11 color-b-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem laborum maiores. Cum doloribus molestiae natus non officia quod repellendus voluptas! Aliquid dolore ducimus esse hic molestias, odit vel voluptatum.</p>
                    </div>
                    <div class="you-message fl-left">
                        <p dir="rtl" class="set-font f-11 color-b-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem laborum maiores. Cum doloribus molestiae natus non officia quod repellendus voluptas! Aliquid dolore ducimus esse hic molestias, odit vel voluptatum.</p>
                    </div>
                    <div class="my-message fl-right">
                        <p dir="rtl" class="set-font f-11 color-b-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem laborum maiores. Cum doloribus molestiae natus non officia quod repellendus voluptas! Aliquid dolore ducimus esse hic molestias, odit vel voluptatum.</p>
                    </div>
                </div>
            </div>
            <div class="input-message">
                <textarea dir="rtl"  class="set-font input-textarea f-10" name="message" placeholder="comment..."></textarea>
                <button><i class="fas fa-paper-plane pointer"></i></button>
            </div>
        </div>
    </div>
</body>
<script src="{{url('js/app.js')}}"></script>
<script>
    window.addEventListener('beforeunload', function (e) {
        e.preventDefault();
        e.returnValue = 'Exit App';
        axios.post('/app/offline/user').then((res)=>{
            window.location = 'http://localhost:8000/'
        })
    });
</script>
</html>
