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
        return $this->belongsToMany(Item::class, 'company_item', 'company_id', 'item_id')
        ->using(CompanyItem::class)
        ->withPivot(['status_id']);
    }


    public function statuses()
    {
        return $this->belongsToMany(Status::class, 'company_item');
    }


    public function comments() {
        return $this->hasMany(Comment::class);
    }



    public function scopeSearch($query, $searchword){

        return $query->where(function ($query) use($searchword) {
            $query->orWhere('name', 'like', "%{$searchword}%")
                ->orWhere('address', 'like', "%{$searchword}%")
                ->orWhere('phone', 'like', "%{$searchword}%")
                ->orWhere('note', 'like', "%{$searchword}%");
        });
    }


}
