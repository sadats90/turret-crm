<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
   protected $table = 'sub_category_msts';

    protected $fillable = ["Sub_category_mstID","Sub_category_Name","delete_cd", "user", "ip","Category_Code","Company_Code"];
}
