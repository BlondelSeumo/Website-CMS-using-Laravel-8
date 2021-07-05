<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingSetting extends Model
{
    use HasFactory;

    protected $fillable = [
    	'language_id',
    	'meta_title',
    	'meta_description',
    	'slug',
    	'breadcrumbs_anchor',

    	'title',
    	'description',


 	];
}
