<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBudgetIdToDailyTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_transactions', function (Blueprint $table) {
            $table->integer('budget_id');
            $table->date('date');
            $table->dropColumn('budget_day_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_transactions', function (Blueprint $table) {
            $table->dropColumn('budget_id');
            $table->dropColumn('date');
            $table->integer('budget_day_id');
        });
    }
}
