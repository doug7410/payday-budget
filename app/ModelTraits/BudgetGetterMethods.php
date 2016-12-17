<?php namespace App\ModelTraits;

use Carbon\Carbon;

trait BudgetGetterMethods
{
    /**
     * @return array
     */
    public function getBudgetDaysAttribute()
    {
        $budgetDays = [];
        $startDate = Carbon::createFromFormat('Y-m-d h:i:s',$this->start_date)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d h:i:s',$this->end_date)->endOfDay();
        $numberOfDays = $startDate->diffInDays($endDate)+1;
        $dailyTransactions = $this->transactions;
        $dailyAmount = round((($this->start_amount - $this->totalExpenses) / $numberOfDays),2);

        foreach(range(0, $numberOfDays-1) as $day)
        {
            $currentDayDate = Carbon::createFromFormat('Y-m-d  h:i:s',$this->start_date)->addDays($day)->startOfDay();
            $transactionsTotalForDay = $dailyTransactions->where('date', $currentDayDate)->pluck('amount')->sum();

            $budgetDays[] = [
                'date' => $currentDayDate->toDateString(),
                'start_amount'  => $dailyAmount,
                'spent_amount'  => $transactionsTotalForDay,
                'remaining'     => $dailyAmount - $transactionsTotalForDay
            ];
        }

        return $budgetDays;
    }

    /**
     * @return mixed
     */
    public function getTransactionsAttribute()
    {
        return $this->dailyTransactions;
    }

    /**
     * @return int
     */
    public function getRemainingAfterExpensesAttribute()
    {
        return $this->start_amount - $this->totalExpenses;
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
    public function getOverUnderAmountAttribute()
    {
        $overUnder = 0;
        $today = Carbon::today()->endOfDay();
        $startDate = Carbon::createFromFormat('Y-m-d h:i:s',$this->start_date)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d h:i:s',$this->end_date)->endOfDay();
        $daysSoFar = $startDate->diffInDays($today)+1;
        $daysInBudget = $startDate->diffInDays($endDate)+1;
        $dailyAmount = round((($this->start_amount - $this->totalExpenses) / $daysInBudget),2);

        foreach(range(0, $daysSoFar-1) as $day)
        {
            $currentDayDate = Carbon::createFromFormat('Y-m-d  h:i:s',$this->start_date)->addDays($day)->startOfDay();
            $transactionsTotalForDay = $this->transactions->where('date', $currentDayDate)->pluck('amount')->sum();
            $overUnder  += $dailyAmount - $transactionsTotalForDay;
        }

        return $overUnder;
    }
}