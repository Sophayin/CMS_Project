<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{

    use HasFactory;
    protected $table = 'application_statuses';

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function loan_company()
    {
        return $this->hasMany(LoanCompany::class);
    }

    public function reason()
    {
        return $this->belongsTo(Reason::class, 'reason_id');
    }
}
