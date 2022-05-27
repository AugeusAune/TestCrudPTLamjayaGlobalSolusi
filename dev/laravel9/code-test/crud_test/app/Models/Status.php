<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function provinces() {
        return $this->hasMany(Province::class);
    }

    public function districts() {
        return $this->hasMany(District::class);
    }

    public function wards() {
        return $this->hasMany(Ward::class);
    }

}
