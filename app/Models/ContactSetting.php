<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
    	'meta_title',
    	'meta_description',
    	'slug',
    	'breadcrumbs_anchor',

    	'box_icon1',
    	'box_icon2',
    	'box_icon3',

    	'box_title1',
    	'box_title2',
    	'box_title3',

    	'box_html1',
    	'box_html2',
    	'box_html3',

    	'form_title',
    	'form_input_name',
    	'form_input_email',
    	'form_input_budget',
    	'form_input_phone',
    	'form_message',

    	'button_text',
    	'button_link',
    	'mailto',

    	'title',
    	'iframe_txt',



 	];


}
