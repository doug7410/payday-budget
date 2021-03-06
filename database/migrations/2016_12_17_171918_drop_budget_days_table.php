<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBudgetDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('budget_days');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('budget_days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('budget_id');
            $table->date('date');
            $table->float('start_amount', 8, 2);
            $table->float('spent_amount', 8, 2)->default(0);
        });
    }
}
