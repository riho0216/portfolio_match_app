<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizePost extends Model
{
    use HasFactory;
    protected $table = 'size_post';
    protected $fillable = ['size_id', 'post_id'];
    public $timestamps = false;

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
