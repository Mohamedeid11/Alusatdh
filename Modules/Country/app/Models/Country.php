<?php

namespace Modules\Country\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Country\Database\Factories\CountryFactory;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory , HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name' , 'icon' ,'status'];

    protected $translatable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
