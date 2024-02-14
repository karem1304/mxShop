<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','description','price','firstPrice','color_id','brand_id','category_id','uuid'];

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function color(){
        return $this->belongsTo(Color::class,'color_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function images(){
        return $this->hasMany(Image::class,'product_id');
    }
    public function image(){
        return $this->hasOne(Image::class,'product_id');
    }
}
