<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = "shops";
    use HasFactory;
    public function applications()
    {
        return $this->belongsTo(Application::class);
    }

    public function agency()
    {
        return $this->belongsTo(ShopAgency::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'shop_users', 'shop_id', 'user_id');
    }
}
