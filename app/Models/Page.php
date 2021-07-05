<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'photo_id',
        'title',
        'slug',
        'body',
        'meta_title',
        'meta_description'

    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function photo() {
        return $this->belongsTo('App\Models\Photo');
    }

}
