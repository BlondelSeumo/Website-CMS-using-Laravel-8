<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    protected $fillable = [
        'language_id',
        'category_id',
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

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function photo() {
        return $this->belongsTo('App\Models\Photo');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function language() {
      return $this->belongsTo('App\Models\Language');
    }

}
