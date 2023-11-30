<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','slug','category_id','price','statusPro','sale_price','image','description','stock'];

    /**
     * The category that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get all of the images for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ImgProduct::class);
    }

    public static function allFake(){
        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->select('products.*', 'categories.name as cateName')->whereNull('products.deleted_at')
        ->paginate(4);
        return $products;
    }
}
