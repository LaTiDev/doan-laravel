<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','parent_id','status','image'];

    /**
     * Get the parent that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public static function allFake(){
        $category = DB::table('categories')
        ->join('categories', 'categories.id', '=', 'categories.parent_id')
        ->select('categories.*', 'categories.name as parentName')->whereNull('categories.deleted_at')
        ->get();
        return $category;
    }

    
}
