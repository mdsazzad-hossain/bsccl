<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service'
    ];

    public function sub_services()
    {
        return $this->hasMany(SubService::class, 'service_id', 'id');
    }

    public function create_sub_service()
    {
        return $this->hasMany(SubService::class, 'service_id', 'id');
    }
}
