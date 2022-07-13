<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $slides = ['deleted_at'];
    protected $fillable = [
        'category_id', 'image', 'title', 'description'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
