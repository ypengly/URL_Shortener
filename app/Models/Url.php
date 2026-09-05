<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Url extends Model
{
    use HasFactory;

    /**
     * Mass-assignable attributes.
     * Only these fields can be filled via Url::create([...]).
     * This is Laravel's protection against "mass assignment" attacks,
     * where a malicious request could try to set fields like `id`
     * or `user_id` that it shouldn't be allowed to touch.
     */
    protected $fillable = [
        'user_id',
        'original_url',
        'short_code',
        'clicks',
    ];

    /**
     * Attribute casting.
     * Makes sure `clicks` always behaves like a PHP integer,
     * not a string, when we read it from the database.
     */
    protected $casts = [
        'clicks' => 'integer',
    ];

    /**
     * A Url belongs to a User (the person who created it).
     * It can be null for guest-created links.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate a short code that is guaranteed to be unique
     * by checking the database before accepting it.
     *
     * Str::random() uses PHP's cryptographically secure
     * random_bytes() under the hood, so codes are not guessable.
     */
    public static function generateUniqueShortCode(int $length = 6): string
    {
        do {
            $code = Str::random($length);
        } while (self::where('short_code', $code)->exists());

        return $code;
    }

    /**
     * A convenient "virtual" attribute: $url->short_url
     * Lets Blade views just write {{ $url->short_url }}
     * instead of repeating url($url->short_code) everywhere.
     */
    public function getShortUrlAttribute(): string
    {
        return url($this->short_code);
    }
}
