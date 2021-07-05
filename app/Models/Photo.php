<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads = "/public/images/";

    protected $fillable = [
        'file',
    ];




}
