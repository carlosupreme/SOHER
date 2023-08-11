<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Work extends Model
{
  use HasFactory;

  public function skills(): Attribute
  {
    return Attribute::make(
      get: static fn (string $value) => array_map(static fn ($el) => ucfirst($el), json_decode($value))
    );
  }

  public function createdAt(): Attribute
  {
    return Attribute::make(
      get: static fn (string $value) => Carbon::createFromTimeString($value)->diffForHumans()
    );
  }

  public function client(): BelongsTo
  {
    return $this->belongsTo(User::class, 'client_id', 'id');
  }
}
