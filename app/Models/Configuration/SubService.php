<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function capacity()
    {
        return $this->hasMany(TariffCapacity::class, 'sub_service_id', 'id');
    }

    public function create_capacity()
    {
        return $this->hasMany(TariffCapacity::class, 'sub_service_id', 'id');
    }
}
