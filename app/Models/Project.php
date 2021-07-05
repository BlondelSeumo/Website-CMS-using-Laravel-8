<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'project_category_id',
        'photo_id',
        'title',
        'slug',
        'body',
        'meta_title',
        'meta_description',
        'image_featured2',
        'img_gal1',
        'img_gal2',
        'img_gal3',
        'img_gal4',
        'date',
        'client',
        'button_text',
        'button_link',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function project_category() {
        return $this->belongsTo('App\Models\ProjectCategory');
    }

    public function photo() {
        return $this->belongsTo('App\Models\Photo');
    }
}
