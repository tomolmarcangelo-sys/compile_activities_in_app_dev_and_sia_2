<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    // This allows Laravel to save data to these specific columns
    protected $fillable = ['title', 'artist', 'genre', 'cover_image', 'description'];
}