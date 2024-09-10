<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['songname', 'album', 'lyrics', 'artistname', 'artistimage'];
}

