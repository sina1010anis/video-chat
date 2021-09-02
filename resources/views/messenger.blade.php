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
                    <h3 align="center" class="set-font color-b-100">{{request()->get('user')}}</h3>
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
                    @if($status)
                        @foreach($comments as $comment)
                            @if($comment->sender == auth()->user()->id)
                                <div class="my-message fl-right">
                                    <h5 align="right" class="set-font color-b-900 m-p-0">{{auth()->user()->name}}</h5>
                                    <p dir="rtl" class="set-font f-11 color-b-800">
                                       {{$comment->text}}
                                    </p>
                                    <p align="right" class="set-font color-b-500 f-9 m-p-0">{{$comment->created_at}}
                                        @if($comment->status == 0)
                                            <span class="fl-left"><i style="color: #444bff" class="fas fa-check-double"></i></span>
                                        @else
                                            <span class="fl-left"><i class="fas fa-check"></i></span>
                                        @endif
                                    </p>
                                </div>
                            @else
                                <div class="you-message fl-left">
                                    <h5 class="set-font color-b-900 m-p-0">{{$comment->user_get->name}}</h5>
                                    <p dir="rtl" class="set-font f-11 color-b-800">
                                        {{$comment->text}}
                                    </p>
                                    <p class="set-font color-b-500 f-9 m-p-0">{{$comment->created_at}}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    @endif
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
