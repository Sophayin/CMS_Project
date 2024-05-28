<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','role_id','model'
    ];
    public Function role(){
        return $this->belongsTo(Role::class);
    }

    public function user (){
        return $this->belongsTo(User::class);
    }
}
