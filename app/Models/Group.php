<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'kutab_id', 'name', 'for_sex', 'week_day_id', 'hour', 'minute',
    ];

    public function kutab()
    {
        return $this->belongsTo(Kutab::class);
    }

    public function weekDay()
    {
        return $this->belongsTo(WeekDay::class);
    }

    public function sheikhs()
    {
        return $this->hasManyThrough(Sheikh::class, SheikhGroup::class, 'group_id', 'id', 'id', 'sheikh_id');
    }

}
