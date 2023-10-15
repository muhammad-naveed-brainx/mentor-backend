<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'chapter_number',
        'academic_subject_id'
    ];

    //relations
    /**
     * Get the academic subject that owns the chapter.
     */
    public function academicSubject(): BelongsTo
    {
        return $this->belongsTo(AcademicSubject::class);
    }

    /**
     * Get the headings for the chapter.
     */
    public function headings(): HasMany
    {
        return $this->hasMany(Heading::class);
    }

}
