<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Filterable;

    protected $fillable = [
        'name',
        'qty',
        'price',
        'images',
        'desc',
        'status',
        'category_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category()
    {
//        return $this->hasMany(Category::class);
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
