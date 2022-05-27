<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender_id', 'district_id', 'ward_id', 'province_id', 'address', 'placeofbirth', 'dateofbirth', 'religion_id'];


    public function province() {
        return $this->belongsTo(Province::class);
    }

    public function ward() {
        return $this->belongsTo(Ward::class);
    }

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }

    public function religion() {
        return $this->belongsTo(Religion::class);
    }
}
