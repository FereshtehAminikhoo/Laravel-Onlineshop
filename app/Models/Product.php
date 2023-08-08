<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'file',
        'price',
        'color',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopeNewest($query,$timeBasedSort)
    {
        if ($timeBasedSort!=null){
            return $query->orderBy('created_at','ASC');
        }
    }
    public function scopePrice($query,$priceBasedSort)
    {
        if ($priceBasedSort!=null){
            if ($priceBasedSort=='arzan'){
                return $query->orderBy('price','ASC');
            }else{
                return $query->orderBy('price','DESC');
            }
        }

    }
}
