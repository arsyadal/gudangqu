<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'report_date',
        'stock_level',
    ];

    /**
     * Get the item associated with the stock report.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
