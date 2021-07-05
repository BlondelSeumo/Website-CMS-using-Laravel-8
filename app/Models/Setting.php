<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'title',
        'keywords',
        'author',
        'contact',
        'phone',
        'price_range',
        'country',
        'address',
        'whatsapp',
        'font',
        'favicon',
        'facebook_pixel',
        'facebook_pixel_switch',
        'analytics',
        'analytics_switch',
        'SchmeaORG',
        'SchmeaORG_switch',
        'OGgraph',
        'OGgraph_switch',
        'photo_id',
        'custom_css',
        'custom_js',
    ];

    public function photo(){
        return $this->belongsTo('App\Models\Photo', 'photo_id');
    }
}
