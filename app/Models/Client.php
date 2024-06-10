<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'agency_name', 'shop_name', 'client_name', 'client_name_translate', 'approved_by',
        'product_price', 'phone', 'product_title'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
