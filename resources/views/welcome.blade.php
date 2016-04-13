<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
        body {
            font-family: 'Lato';
        }
    </style>
</head>

<body style="background-image: url('/images/wellcome.png'); height: 100%">


    <div class="container"  >
        <h1 class="text-center col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4" style="margin-top: 20%">
            <img src="images/bomb-run.png" class="img-responsive" alt="">
        </h1>
        <br>
        <a href="{{ url('game') }}" class="btn btn-warning  col-sm-2 col-sm-offset-5 col-xs-2 col-xs-offset-5">To the game</a>
    </div>
</body>
