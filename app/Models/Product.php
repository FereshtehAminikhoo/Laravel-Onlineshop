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
        'brand_id',
        'file',
        'price',
        'color',
        'description',
        'stock_product',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
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
    public function scopeBrand($query,$brands)
    {
        if ($brands!=null){
            $brand_ids=Brand::WhereIn('name',$brands)->pluck('id')->toArray();
            return $query->WhereIn('brand_id',$brand_ids);
        }

    }
    public function scopeExist($query,$exist)
    {
        if ($exist=='on'){
            return $query->Where('stock_product','>',0);
        }

    }
}
