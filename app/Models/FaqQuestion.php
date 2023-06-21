<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    use HasFactory;
 
    public function category()
    {
        return $this->belongsTo(FaqCategory::class);
    }
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}