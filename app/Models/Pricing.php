<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = [
    	'language_id',
        'title',
        'description',
        'button_text',
        'button_link',
        'pricing_switch',
        'popular_text'
    ];
}
