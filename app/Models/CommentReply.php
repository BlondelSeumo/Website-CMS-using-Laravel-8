<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        'comment_id',
        'is_active',
        'author',
        'photo',
        'email',
        'body'
    ];

    public function comment() {
        return $this->belongsTo('App\Comment');
    }
}
