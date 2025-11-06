<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'published_at',
        'path',
        'language',
        'user_id'
    ];
    public function user() {
       return $this->belongsTo(User::class);
    }

       protected function title(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    public function getPublishedDateAttribute()
    {
        return $this->published_at ? Carbon::parse($this->published_at)->format('Y-m-d'): null;
    }
    
}
