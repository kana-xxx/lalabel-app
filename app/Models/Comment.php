<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'detail',
        'user_id',
        'company_id',
        'item_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function companies() {
        return $this->belongsTo(Company::class);
    }

    public function items() {
        return $this->belongsTo(Item::class);
    }


}
