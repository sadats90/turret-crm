<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
   protected $table = 'size_msts';

    protected $fillable = ["Size_Code","Company_Code","R1","R2","R3","R4","R5","R6","R7","R8","R9","R10","R11","R12","R13","R14","R15","delete_cd", "user", "ip"];
}
