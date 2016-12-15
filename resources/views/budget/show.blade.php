@extends('main')

@section('content')
    <div class="row">
        <daily-budget-page budget-id="{{ $id }}"></daily-budget-page>
    </div>
@endsection