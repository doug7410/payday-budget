<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budgets';
    protected $appends = ['overUnderAmount'];

    public function getOverUnderAmountAttribute()
    {
        return $this->getOverUnderAmount();
    }

    protected $fillable = ['start_date', 'end_date', 'start_amount'];



    public function budgetDays()
    {
        return $this->hasMany(BudgetDay::class);
    }

    public function currentBudgetDay()
    {
        $today = Carbon::today()->startOfDay()->format('Y-m-d');
        return $this->budgetDays()->where('date', $today)->first();
    }

    public function dailyTransactions()
    {
        return $this->hasManyThrough(DailyTransaction::class, BudgetDay::class);
    }


    public function getOverUnderAmount()
    {
        $overUnder = 0;
        $today = Carbon::today();
        foreach ($this->budgetDays as $day)
        {
            if($day->date <= $today)
            {
                $overUnder += ($day->start_amount - $day->spent_amount);
            }
        }

        return $overUnder;
    }
}
