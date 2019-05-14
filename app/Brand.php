<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	
    protected $table = 'brand_msts';

    protected $fillable = ['Brand_mstID','Company_Code', 'Brand_Name', 'delete_cd', 'user', 'ip'];
}
