@extends('main')

@section('content')
    <div class="card">
        <h4 class="card-header card-info card-inverse">Create a new budget</h4>
        <form action="/budget" method="post" class="card-block">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
                <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
            </div>
            <div class="form-group row">
                <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
            </div>
            <div class="form-group row">
                <label for="start_amount" class="col-sm-2 col-form-label">Start Amount</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="start_amount" name="start_amount" placeholder="1500.00">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Create Budget</button>
                </div>
            </div>
        </form>
    </div>
@endsection
