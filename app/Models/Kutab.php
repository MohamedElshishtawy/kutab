<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kutab extends Model
{
    protected $fillable = ['name', 'super_sheikh_id'];

    public function superSheikh()
    {
        return $this->belongsTo(SuperSheikh::class);
    }

    public function weekDay()
    {
        return $this->belongsTo(WeekDay::class);
    }

    public function sheiks()
    {
        return $this->hasManyThrough(Sheikh::class, SheikhKutab::class, 'sheikh_id', 'id', 'id', 'sheikh_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

}
