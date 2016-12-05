<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Budget Planner</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <style>
            .form{
                width: 300px;
            }
            .daily-spent{
                max-width: 100px;
            }
        </style>
    </head>
    <body>
        <div class="container" id="app">
            <h1>Budget</h1>
            <p>@{{ budget.name }}</p>
            <div class="form">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" v-model="start_date">
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" v-model="end_date">
                </div>
                <div class="form-group">
                    <label for="start_amount">Start Amount</label>
                    <input type="number" class="form-control" id="start_amount" v-model="start_amount">
                </div>
                <button v-on:click="calculate" class="btn btn-default">Submit</button>
            </div>
            <hr>
            <div>
                <p><strong>Daily Budget:</strong> @{{daily_budget}}</p>
                <table class="table table-striped table-bordered table-condensed">
                    <tr>
                        <th>Date</th>
                        <th>Allowance</th>
                        <th>Spent</th>
                        <th>Over/Under</th>
                    </tr>
                    <tr v-for="(day, index) in days">
                        <td>@{{ day.date }}</td>
                        <td>@{{ day.allowance }}</td>
                        <td>
                            <input
                                    class="form-control daily-spent"
                                    type="number"
                                    title="Daily Spent"
                                    v-model="index"
                                    @change="calculate_remainder(day.allowance, index)"
                            >
                        </td>
                        <td>@{{ day.remainder }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <script>
            window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
