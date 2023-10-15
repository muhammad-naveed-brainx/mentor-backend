<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Heading extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'chapter_id'
    ];

    //relations
    /**
     * Get the chapter that owns the heading.
     */
    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }

    /**
     * Get the subheadings for the heading.
     */
    public function subHeadings(): HasMany
    {
        return $this->hasMany(SubHeading::class);
    }
}
