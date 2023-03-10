<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query , array $Filters){
        if($Filters['tag'] ?? false){
$query->where('tags','like','%' . request('tag') . '%');
        }
        if($Filters['search'] ?? false){
            $query->where('title','like','%' . request('search') . '%')->orWhere(
                'tags','like','%' . request('search') . '%')->orWhere('description','like','%' . request('search') . '%');
                    
        }
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
