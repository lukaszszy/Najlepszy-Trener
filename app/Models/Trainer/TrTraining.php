<?php

namespace App\Models\Trainer;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TrTraining extends Model
{
    protected $table = 'trainers_trainings_dates';
    protected $fillable = ['trainer_id','name', 'date', 'begin_time', 'end_time', 'status', 'place', 'price', 'client_limit', 'actual_client_number', 'description', 'updated_at', 'created_at'];
    protected $appends = ['full_begin_date', 'full_end_date'];

    public function trainer(){
        return $this->belongsTo('Trainer');
    }

    public function trOrdTr(){
        return $this->hasMany('App\Models\Trainer\TrOrderedTrainings', 'training_id');
    }

    public function getFullBeginDateAttribute()
    {
        return Carbon::parse($this->date.('').($this->begin_time))->format('Y-m-d\TH:i:s.u'); 
    }

    public function getFullEndDateAttribute()
    {
        return Carbon::parse($this->date.('').($this->end_time))->format('Y-m-d\TH:i:s.u'); 
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($trTraining) {
             $trTraining->trOrdTr()->delete();
        });
    }

}
