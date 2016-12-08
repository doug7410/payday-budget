@extends('main')

@section('content')
    <div class="card">
        <div class="card-block">
            <p><strong>Start Date:</strong> {{ $budget->start_date }}</p>
            <p><strong>End Date:</strong> {{ $budget->end_date }}</p>
            <p><strong>Start Amount:</strong> {{ $budget->start_amount }}</p>
        </div>
        <div class="card-block">
            <div>
                <example start-date="{{$budget->start_date}}" end-date="{{$budget->end_date}}" start-amount="{{ $budget->start_amount }}">
                </example>
            </div>
        </div>

    </div>
@endsection