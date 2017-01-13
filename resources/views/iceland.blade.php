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

    <!-- Styles -->
    <link href="{{ asset('css/iceland.css') }}" rel="stylesheet">
</head>

<body>
    <div id="iceland">
        <div class="trip-info">
            <h1>Countdown to Iceland!</h1>
            <div class="info">
                <strong>Trip Date: </strong>
                <span>February 11, 2017</span>
            </div>
        </div>
        <div class="map">
            <image src="    "></image>
        </div>
        <countdown trip-date="February 11, 2017"></countdown>
    </div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{ asset('js/iceland.js') }}"></script>
</body>
</html>