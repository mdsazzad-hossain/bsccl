<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function create_permission()
    {
        return $this->hasMany(Permission::class, 'menu_id', 'id');
    }

    public function permission()
    {
        return $this->hasMany(Permission::class, 'menu_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
