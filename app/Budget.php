<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budgets';
    protected $fillable = ['start_date', 'end_date', 'start_amount'];
    protected $appends = ['overUnderAmount', 'totalExpenses', 'remainingAfterExpenses'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetDays()
    {
        return $this->hasMany(BudgetDay::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function dailyTransactions()
    {
        return $this->hasManyThrough(DailyTransaction::class, BudgetDay::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expenses()
    {
        return $this->hasMany(BudgetExpense::class);
    }

    /**
     * @return mixed
     */
    public function currentBudgetDay()
    {
        $today = Carbon::today()->startOfDay()->format('Y-m-d');
        return $this->budgetDays()->where('date', $today)->first();
    }

    /**
     * @return int
     */
    public function getOverUnderAmountAttribute()
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

    /**
 * @return int
 */
    public function getTotalExpensesAttribute()
    {
        return $this->expenses->pluck('amount')->sum();
    }

    /**
     * @return int
     */
    public function getRemainingAfterExpensesAttribute()
    {
        return $this->start_amount - $this->totalExpenses;
    }

}
