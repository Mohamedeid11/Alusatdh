<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Database\Factories\LevelFactory;

class Level extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'desc', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
