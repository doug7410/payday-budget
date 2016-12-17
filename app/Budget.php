<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ModelTraits\BudgetGetterMethods;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Budget
 * @package App
 * @property Collection expenses
 * @property Budget budgetDays
 * @property integer start_amount
 * @property Collection transactions
 * @property integer totalExpenses
 * @property Budget overUnderAmount
 * @property Budget dailyTransactions
 * @property Budget remainingAfterExpenses
*/
class Budget extends Model
{
    use BudgetGetterMethods;

    protected $table = 'budgets';
    protected $dates = ['start_date', 'end_date'];
    protected $fillable = ['start_date', 'end_date', 'start_amount'];
    protected $appends = ['overUnderAmount', 'totalExpenses', 'remainingAfterExpenses', 'budgetDays', 'transactions'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dailyTransactions()
    {
        return $this->hasMany(DailyTransaction::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expenses()
    {
        return $this->hasMany(BudgetExpense::class);
    }


}
