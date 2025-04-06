<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class AccountingAccTransMapping extends Model
{
    protected $fillable = [];



    // Other model definitions

    public function business_location()
    {
        return $this->belongsTo('Modules\Accounting\Entities\BusinessLocation', 'location_id');
    }


}
