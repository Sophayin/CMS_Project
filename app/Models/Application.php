<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = "applications";
    use HasFactory;

    protected $fillable = [
        'agency_name',
        'shop_name',
        'client_name',
        'client_name_translate',
        'approved_by',
        'product_price',
        'phone',
        'product_title'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function application_status()
    {
        return $this->hasMany(ApplicationStatus::class)->orderBy('created_at', 'desc');
    }
    public function loan_company()
    {
        return $this->belongsTo(LoanCompany::class);
    }
    public function reason()
    {
        return $this->belongsTo(reason::class);
    }
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
    public function co()
    {
        return $this->belongsTo(CO::class);
    }
}
