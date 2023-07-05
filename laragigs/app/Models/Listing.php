<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'email',
        'location',
        'company',
        'tags',
        'description',
        'website'
    ];



    public function scopeFilter($query){
        if(request('tag') ?? false){
            $query->where('tags', 'like', '%' . request('tag'). '%');
        }

        if(request('search') ?? false){
            $query->where('tags', 'like', '%' . request('search'). '%')
            ->orWhere('title', 'like', '%' . request('search'). '%')
            ->orWhere('description', 'like', '%' . request('search'). '%');
        }
    }
}
