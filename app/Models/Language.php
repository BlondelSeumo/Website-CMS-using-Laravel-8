<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    use HasFactory;
    protected $fillable = ['photo_id', 'id', 'name', 'is_default', 'code', 'rtl'];

    public function photo(){
        return $this->belongsTo('App\Models\Photo', 'photo_id');
    }
    public function sliders()
    {
        return $this->hasMany('App\Models\Slider');
    }
    public function setting()
    {
        return $this->hasMany('App\Models\Setting');
    }
    public function menu()
    {
        return $this->hasMany('App\Models\Menu');
    }
    public function homesetting()
    {
        return $this->hasMany('App\Models\HomeSetting');
    }
    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }
    public function projectcategories()
    {
        return $this->hasMany('App\Models\ProjectCategory');
    }
}
