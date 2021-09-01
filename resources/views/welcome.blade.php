<!DOCTYPE html>
<head>
    <title>Pusher Test</title>
</head>
<body>
<h1>Token</h1>
<form action="{{route('setSession')}}" method="post">
    @csrf
    <button type="submit">Next</button>
</form>
<hr>
<h1>Pusher Test</h1>
<p>
    Publish an event to channel <code>my-channel</code>
    with event name <code>my-event</code>; it will appear below:
</p>
<div id="app">
    <ul>
        <li v-for="message in messages">
            @{{message}}
        </li>
    </ul>
</div>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="{{url('js/app.js')}}"></script>
</body>
