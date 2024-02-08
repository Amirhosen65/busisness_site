<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $guarded = [' '];

    public function RelationCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}