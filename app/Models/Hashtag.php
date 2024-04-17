<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;
    protected $fillable = ['hashtags'];
    public function images()
    {
        return $this->belongsToMany(Image::class, 'image_hashtag');
    }
    
}