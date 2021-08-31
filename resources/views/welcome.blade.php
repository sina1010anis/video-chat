<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="antialiased">
        <div id="app">
            <h1>Token</h1>
            <form action="{{route('setSession')}}" method="post">
                @csrf
                <button type="submit">Next</button>
            </form>
            <hr>
            <h1>Api And Buy</h1>
            <br>
            <a href="{{route('buyProduct')}}">Buy</a href="{{route('buyProduct')}}">
        </div>
    </body>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{url('js/app.js')}}"></script>
</html>
