<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'detail',
    ];


    public function companies() {
        return $this->belongsToMany(Company::class, 'company_item', 'company_id', 'item_id')
        ->using(CompanyItem::class)
        ->withPivot(['status_id']);
    }


    // public function scopeSittyuFilter($query, $stateName)
    // {
    //     return $query-where('name', $stateName);
        

    // }
}
