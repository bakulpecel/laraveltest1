<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'slug', 'body',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_thread');
    }

    public function scopeLatestPost($query, int $perPage = 10)
    {
        return $query->latest()
            ->paginate($perPage);
    }

    public function scopeSearch($query, string $search, int $perPage = 10)
    {
        return $query->where('threads.subject', 'LIKE', "%$search%")
            ->orWhere('threads.body', 'LIKE', "%$search%")
            ->latest()
            ->paginate($perPage);
    }
}
