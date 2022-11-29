<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = ['title','content','category_id','description','posted','slug','image'];
    
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}

