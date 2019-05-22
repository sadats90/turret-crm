<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area_msts';

    protected $fillable = ['Area_Code','Company_Code','Area_Name','delete_cd','user','ip'];

    public function company()
    {
        return $this->hasOne('App\Model\Master\Company','Company_Code','Company_Code');
    }
}
