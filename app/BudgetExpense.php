<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class BudgetExpense extends Model
{
    protected $fillable = ['description', 'amount'];
}