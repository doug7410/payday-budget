@extends('main')

@section('content')
    <div class="row">
        <daily-budget-page budget-json="{{ $budget}}"></daily-budget-page>
    </div>
@endsection