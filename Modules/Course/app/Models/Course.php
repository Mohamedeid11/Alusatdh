<?php

namespace Modules\Course\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Course extends Model
{
    use HasFactory , HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title' , 'photo' , 'short_desc' , 'description' , 'subject' , 'payment_type'];

    protected $translatable = ['title' ,'short_desc' ,'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user')
            ->withPivot('role')
            ->withTimestamps();
    }

}
