<?php

namespace App\Models;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name',
    ];
    
    public function  user()
    {
        return $this->hasOne(User::class);
    }
}
