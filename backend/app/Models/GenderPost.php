<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenderPost extends Model
{
    use HasFactory;
    protected $table = 'gender_post';
    protected $fillable = ['gender_id', 'post_id'];
    public $timestamps = false;

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
}
