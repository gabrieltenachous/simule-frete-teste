<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_phone',
        'contact_email',
        'zip_code',
        'street',
        'complement',
        'neighborhood',
        'city',
        'state',
        'number',
    ];

    // Relacionamento com os produtos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
