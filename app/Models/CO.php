<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CO extends Model
{
    use HasFactory;
    protected $table = 'credit_officers';
    protected $fillable = [
        'id',
        'code',
        'khmer_identity_card',
        'agency_profile',
        'full_name',
        'full_name_translate',
        'phone',
        'phone_telegram',
        'gender',
        'age',
        'position_id',
        'occupation_id',
        'income',
        'status',
        'bank_info',
        'date_of_birth',
        'company',
        'remark',
        'registered_date',
        'created_by',
        'updated_by',
    ];
    public function application()
    {
        return $this->hasMany(Application::class);
    }
    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }
    public function loan_company()
    {
        return $this->belongsTo(Loan_company::class);
    }
    public function address()
    {
        return $this->hasOne(Address::class, 'co_id');
    }
}
