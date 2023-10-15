<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'stem',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'type',
        'is_approved',
        'explanation',
        'heading_id',
        'chapter_id',
        'academic_subject_id',
        'image_url',
    ];

    //relations
    /**
     * Get the heading that owns the question.
     */
    public function heading(): BelongsTo
    {
        return $this->belongsTo(Heading::class);
    }
    /**
     * Get the chapter that owns the question.
     */
    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }
    /**
     * Get the subject that owns the question.
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(AcademicSubject::class);
    }
}
