<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopetagname(Builder $query,string|null $tagname) {
        if(!empty($tagname)) {
            $query->where('tags','LIKE',"%{$tagname}%");
        }
        
    }
}
