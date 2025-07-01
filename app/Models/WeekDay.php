<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    protected $fillable = ['name'];

    public function kutab()
    {
        return $this->hasMany(Kutab::class);
    }

}
