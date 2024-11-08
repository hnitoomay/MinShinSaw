<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>master</title>
    <style>

    </style>
</head>
<body>
    <div class="">
        <div class="d-flex col-12 bg-dark p-2 justify-content-around">
            <h1 class="text-white">Min Shin Saw</h1>
            <div class="mt-2">
                <a class="text-white me-4" href="{{route('home#company')}}">Comapnies</a>
                <a class="text-white me-2" href="{{route('home#employee')}}">Employees</a>
            </div>
            <div class="mt-2">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-light" type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </div>
    <div class="">
        @yield('content')
    </div>
</body>
</html>
