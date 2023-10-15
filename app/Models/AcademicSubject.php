<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicSubject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'academic_class_id'
    ];

    //relations
    /**
     * Get the academic class that owns the subject.
     */
    public function academicClass(): BelongsTo
    {
        return $this->belongsTo(AcademicClass::class);
    }

    /**
     * Get the chapters for the academic subject.
     */
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }
}
