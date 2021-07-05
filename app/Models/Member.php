<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'photo_id',
        'name',
        'position',
        'facebook',
        'twitter',
        'linkedin'
    ];

    public function photo(){
        return $this->belongsTo('App\Models\Photo', 'photo_id');
    }
}
