<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Listing extends Model
{
    use HasFactory;

    public $fillable=['title','company','description','tags','location','email','website','slug','logo'];

    /* 
        Recuperation des elements qui corresponde au tag entré en query string
     */
    public function scopeFilterByTagName(Builder $query,string|null $tagname) {
        if(!empty($tagname)) {
            $query->where('tags','LIKE',"%{$tagname}%");
        }
        
    }

    public function getLogoPath() {
       
       return Storage::disk('public')->url($this->logo);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
