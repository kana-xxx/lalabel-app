<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Person extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'name',
        'department',
        'position',
        'email',
        'phone',
    ];


    public function company() {
        return $this->belongsTo(Company::class);
    }
}
