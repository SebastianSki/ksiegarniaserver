<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce Panel</title>
    <link href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <h2>Testy api</h2>
        <div style="display:flex">
            <form action="/add" method="POST">
                @csrf
                Nazwa: <input type="name" name="name"/>
                Opis: <input type="description" name="description"/>
                Jednostka: <input type="jednostka" name="jednostka"/>
                <input type="submit" value="dodaj">
            </form>
            <div class="row">
                @foreach($castle as $foo)
                    <div class="col-6" style="border:1px solid black;">
                        <p>{{$foo->name}}</p>
                        <p>{{$foo->description}}</p>
                        <p>{{$foo->jednostka}}</p>
                    </div>
                    <form method="GET" action="/delete/{{$foo->id}}">
                        <input type="submit" value="usuń">
                    </form>

                @endforeach
            </div>
        </div>
    </div>
</div>
</body>
</html>
