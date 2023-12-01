<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public $fillable=['title','company','description','tags','location','email','website','slug'];

    public function scopeFilterByTagName(Builder $query,string|null $tagname) {
        if(!empty($tagname)) {
            $query->where('tags','LIKE',"%{$tagname}%");
        }
        
    }
}
