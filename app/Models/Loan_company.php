<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_company extends Model
{
    use HasFactory;
    public function application()
    {
        return $this->hasMany(Application::class);
    }
    public function co()
    {
        return $this->hasMany(CO::class);
    }
}
