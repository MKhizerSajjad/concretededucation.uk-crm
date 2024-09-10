<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $table = 'cities';
    public static $snakeAttributes = false;

    protected $guarded;

    public function universities()
    {
        return $this->hasMany(University::class, 'city_id');
    }
}
