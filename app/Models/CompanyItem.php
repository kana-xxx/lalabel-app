<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyItem extends Pivot
{

    protected $table = 'company_item';
    

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
