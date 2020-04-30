<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name'];
    protected $dates = ['deleted_at'];

    public $timestamps = true;



    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function boot ()
    {
        parent::boot();

        self::deleting(function (Category $category) {

            foreach ($category->products as $product)
            {
                $product->delete();
            }
        });
    }

    public static function countProducts($id)
    {
        return self::when($id, function ($query) use($id) {
            $query->where('id', $id);
        })->withCount('products')->first();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Get the products for the category post.
     */
    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('name');
    }

}
