<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($querry, array $filters){
       if($filters['tag'] ?? false){
        $querry->where('tags', 'like', '%' . request('tag') . '%');
       }

       if($filters['search'] ?? false){
        $querry->where('title', 'like', '%' . request('search') . '%')
        ->orWhere('description', 'like', '%' . request('search') . '%')
        ->orWhere('tags', 'like', '%' . request('search') . '%');
       }
    }
}
