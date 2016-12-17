<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyTransaction extends Model
{
    protected $fillable = ['description', 'amount', 'date'];
    public $timestamps = false;
    protected $dates = ['date'];
}