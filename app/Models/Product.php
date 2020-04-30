<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description'];
    protected $hidden = ['category_id', 'deleted_at', 'created_at' ,'updated_at'];
    protected $dates = ['deleted_at'];

    public $timestamps = true;



    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */


    public static function getByCategoryId($id)
    {
        return self::where('category_id', $id)->paginate(9);
    }


    public static function getProductByCategoryId($id)
    {
        return self::when($id, function ($query) use($id) {
            $query->where('id', $id);
        })->paginate(9);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    public function getDescriptionAttribute($description)
    {
        return  \Illuminate\Support\Str::limit($description, 75, $end='...');

    }


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->orderBy('name');
    }
}
