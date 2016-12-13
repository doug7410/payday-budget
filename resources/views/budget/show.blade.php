@extends('main')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="info-cell border-right">
                <h5>Budget info</h5>
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>Start Date</th>
                        <td>{{ $budget->start_date }}</td>
                    </tr>
                    <tr>
                        <th>End Date</th>
                        <td>{{ $budget->end_date }}</td>
                    </tr>
                    <tr>
                        <th>Start Amount</th>
                        <td>{{ $budget->start_amount }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-sm-4">
            <div class=" info-cell border-right">
                <transaction-form budget-id="{{ $budget->id }}"></transaction-form>
            </div>
        </div>
        <div class="col-sm-4">
            <h5>Over/Under</h5>
            <div info-cell>
                <budget-over-under initial-budget="{{ $budget }}"></budget-over-under>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <budget-days-table initial-budget-days="{{ $budget->budgetDays }}"></budget-days-table>
        </div>
        <div class="col-sm-4">
            <transaction-list transactions="{{ $budget->dailyTransactions }}"></transaction-list>
        </div>
    </div>
@endsection