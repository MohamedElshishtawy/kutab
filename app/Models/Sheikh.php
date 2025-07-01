<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sheikh extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function kutabs()
    {
        return $this->hasManyThrough(Kutab::class, SheikhKutab::class, 'sheikh_id', 'id', 'id', 'kutab_id');
    }

    public function groups()
    {
        return $this->hasManyThrough(Group::class, SheikhGroup::class, 'sheikh_id', 'id', 'id', 'group_id');
    }

}
