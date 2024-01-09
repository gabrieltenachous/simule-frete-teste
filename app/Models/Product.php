<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'description',
        'unit_price',
        'category',
        'stock_quantity',
        'supplier_id',
    ];

    // Relacionamento com o fornecedor
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
