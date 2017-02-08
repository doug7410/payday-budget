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
    <style>
        #change-date{
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div id="iceland">
        <div class="trip-info">
            <h1>Countdown to Iceland</h1>
            <div class="info">
                <strong>Trip Date: </strong>
                <span id="toggle">{{ $date }}</span>
                <div id="change-date">
                    <form action="iceland/update" method="post">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <label for="trip-date">Date:</label>
                        <input type="text" id="trip-date" name="tripDate" value="{{ $date }}">
                        <button id="set-date">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <countdown trip-date="{{ $date }}"></countdown>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('js/iceland.js') }}"></script>
    <script>
      $(document).ready(function(){
        $("#change-date").css('display', 'none');

        $("#toggle").click(function(){
          console.log('ssss');
          $("#change-date").toggle();
        });
      });
    </script>
</body>
</html>