<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagThread extends Model
{
    protected $table = 'tag_thread';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'thread_id', 'tag_id',
    ];
}
