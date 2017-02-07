<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iceland</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Courgette" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Josefin+Sans|Nunito|Quicksand|Yanone+Kaffeesatz" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/iceland.css') }}" rel="stylesheet">
</head>

<body>
    <div id="iceland">
        <div class="trip-info">
            <h1>Countdown to Iceland</h1>
            <div class="info">
                <strong>Trip Date: </strong>
                <span>February 11, 2017</span>
            </div>
        </div>
        <countdown trip-date="February 11, 2017 15:45:00"></countdown>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('js/iceland.js') }}"></script>
</body>
</html>