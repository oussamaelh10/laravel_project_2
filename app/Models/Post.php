<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    protected $fillable = ['title', 'message', 'image']; // Voeg 'image' toe

    // Voeg een mutator toe om de afbeelding URL op te halen
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return null;
    }
    
}


