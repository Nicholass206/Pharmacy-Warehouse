<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query,array $filters)
    {
        if($filters['search'] ?? false) {
            $query
            ->where(fn($query)=>
            $query
            ->where('s_name','like','%'.request('search').'%')
            ->orWhere('category','like','%'.request('search').'%'));
        }

        $query->when($filters['category'] ?? false,fn($query,$category)
        => $query->where('category',$category)
    );
    }
}
