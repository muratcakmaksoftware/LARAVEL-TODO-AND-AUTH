<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';


    public function getImageUrlAttribute()
    {
        switch ($this->status){
            case 0: return asset('assets/icon/waiting.png');
            case 1: return asset('assets/icon/tick.png');
        }
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
