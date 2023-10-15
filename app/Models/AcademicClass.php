<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AcademicSubject;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicClass extends Model
{
    use HasFactory;

    protected $fillable = [
       'name'
    ];

    //relations
    /**
     * Get the subjects for the academic class.
     */
    public function subjects(): HasMany
    {
        return $this->hasMany(AcademicSubject::class);
    }
}
