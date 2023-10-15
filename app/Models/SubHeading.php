<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubHeading extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'explanation',
        'heading_id',
        'chapter_id',
        'image_url',
    ];

    //relations
    /**
     * Get the heading that owns the subheading.
     */
    public function heading(): BelongsTo
    {
        return $this->belongsTo(Heading::class);
    }
}
