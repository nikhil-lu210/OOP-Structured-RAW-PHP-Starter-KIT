<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Not Found | 404</title>

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            text-align: center;
            font-family: sans-serif;
            background-color: #e7ffff;
        }

        h1,
        a {
            margin: 0;
            padding: 0;
            text-decoration: none;
        }

        .section {
            padding: 4rem 2rem;
        }

        .section .error {
            font-size: 150px;
            color: #008b62;
            text-shadow: 1px 1px 1px #00593e, 2px 2px 1px #00593e, 3px 3px 1px #00593e, 4px 4px 1px #00593e, 5px 5px 1px #00593e, 6px 6px 1px #00593e, 7px 7px 1px #00593e, 8px 8px 1px #00593e, 25px 25px 8px rgba(0, 0, 0, 0.2);
        }

        .page {
            margin: 2rem 0;
            font-size: 20px;
            font-weight: 600;
            color: #444;
        }

        .back-home {
            display: inline-block;
            border: 2px solid #222;
            color: #222;
            text-transform: uppercase;
            font-weight: 600;
            padding: 0.75rem 1rem 0.6rem;
            transition: all 0.2s linear;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
        }
        .back-home:hover {
            background: #222;
            color: #ddd;
        }
    </style>    
</head>
<body>
    <div class="section">
        <h1 class="error">404</h1>
        <div class="page">Ooops!!! The page you are looking for is not found</div>
        <a class="back-home" href="{{ route('home.index') }}">Back to home</a>
    </div>
</body>
</html>