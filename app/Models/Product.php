<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $table="products";


    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'product_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }



}
