<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nikhil</title>
</head>
<body>
    <h1>Hello {{ $user->name }}</h1>

    <form action="{{ route('home.store') }}" method="POST">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value="John"><br>
      
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value="Doe"><br><br>
      
        <input type="submit" value="Submit">
    </form>      
</body>
</html>