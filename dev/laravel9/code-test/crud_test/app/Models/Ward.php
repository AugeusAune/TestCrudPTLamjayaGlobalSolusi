<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status_id', 'code', 'district_id'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function district() {
        return $this->belongsTo(District::class);
    }

}
