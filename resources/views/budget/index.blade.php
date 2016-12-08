@extends('main')

@section('content')
    <div class="card">
        <h4 class="card-header card-info card-inverse">Budgets</h4>
        <div class="card-block">
            <table class="table table-hover table-sm">
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Start Amount</th>
                    <th></th>
                </tr>
                @foreach($budgets as $budget)
                <tr>
                    <td>{{ $budget->start_date }}</td>
                    <td>{{ $budget->end_date }}</td>
                    <td>{{ $budget->start_amount }}</td>
                    <td>
                        <a href="/budget/{{ $budget->id }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection