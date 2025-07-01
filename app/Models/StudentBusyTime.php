<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentBusyTime extends Model
{
    protected $fillable = ['student_id', 'week_day_id', 'hour', 'minute'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function weekDay()
    {
        return $this->belongsTo(WeekDay::class);
    }


}
