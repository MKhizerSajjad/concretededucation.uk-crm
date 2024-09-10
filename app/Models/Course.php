<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded;

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function intakes()
    {
        return $this->hasMany(Intake::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }


    public function dept()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(CourseLevel::class, 'course_level_id', 'id');
    }
}
