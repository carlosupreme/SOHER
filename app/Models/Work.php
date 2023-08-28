<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Work extends Model
{
    use HasFactory;

    protected $casts = [
        'deadline' => 'date'
    ];

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: static fn(string $value) => Carbon::createFromTimeString($value)->diffForHumans()
        );
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function assigned(): HasOne
    {
        return $this->hasOne(AssignWork::class);
    }
}
