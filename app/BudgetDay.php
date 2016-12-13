<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetDay extends Model
{
    protected $fillable = ['date', 'start_amount', 'spent_amount'];
    public $timestamps = false;

    public function dailyTransactions()
    {
        return $this->hasMany(DailyTransaction::class);
    }
}