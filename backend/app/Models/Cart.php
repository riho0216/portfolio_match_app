<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id')->withTrashed();
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
