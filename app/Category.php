<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   	protected $table = 'category_msts'; 

  	protected $fillable = ["Category_Code","Category_Name","delete_cd", "user", "ip","Company_Code","Gender_Code"];
}
