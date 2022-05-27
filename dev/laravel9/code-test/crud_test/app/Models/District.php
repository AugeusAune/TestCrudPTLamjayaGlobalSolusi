<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status_id', 'code'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function wards() {
        return $this->hasMany(Ward::class);
    }

}
