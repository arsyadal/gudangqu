<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_info',
    ];

     /**
     * Get the items for the supplier.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

}
