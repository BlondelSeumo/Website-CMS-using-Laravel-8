<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
    	'language_id',
        'photo_id',
        'company_name',
        'company_link'
    ];

    public function photo(){
        return $this->belongsTo('App\Models\Photo', 'photo_id');
    }
       
}
