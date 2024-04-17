<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function user()
{
    return $this->belongsTo(User::class, 'created_by');
}
}
