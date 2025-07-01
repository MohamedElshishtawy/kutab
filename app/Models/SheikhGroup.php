<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SheikhGroup extends Model
{
    protected $fillable = [
        'sheikh_id', 'group_id',
    ];

    public function sheikh()
    {
        return $this->belongsTo(Sheikh::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
