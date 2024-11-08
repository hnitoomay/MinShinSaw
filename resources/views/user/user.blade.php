<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>This is user page</h1>
        <p>Everyone who submit the register form is directed to user page <b>user.blade.php</b>
        due to default <b>'user'</b> role</p>
        <p>To access admin dashboard, please log out again and type this</p>
        <ul>
            <li>email: <b>admin@admin.com</b></li>
            <li>password: <b>password</b></li>
        </ul>
        <form action="{{route('logout')}} " method="POST">
            @csrf
            <button type="submit">Log Out</button>
        </form>
    </div>
</body>
</html>
