<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'watch_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function watch()
    {
        return $this->belongsTo(Watch::class);
    }

   
}
