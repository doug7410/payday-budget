<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyTransaction extends Model
{
    protected $fillable = ['description', 'amount'];
    public $timestamps = false;
    protected $table = 'daily_transactions';
    protected $appends = ['date'];

    public function getDateAttribute()
    {
        return $this->getDate();
    }

    public function budgetDay()
    {
        return $this->belongsTo(BudgetDay::class);
    }

    public function getDate()
    {
        return $this->budgetDay->date;
    }
}