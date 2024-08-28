<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'supplier_id',
    ];
    /**
     * Get the category associated with the item.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the supplier associated with the item.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
