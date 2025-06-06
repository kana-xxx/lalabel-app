<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'person_id',
        'phone',
        'note',
    ];

    public function people() {
        return $this->hasMany(Person::class);
    }

    public function items() {
        return $this->belongsToMany(Item::class)->withTimestamps();;
    }
}
