<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $slides = ['deleted_at'];
    protected $fillable = [
        'name'
    ];

    public function project()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function news()
    {
        return $this->hasMany('App\Models\News');
    }
}
