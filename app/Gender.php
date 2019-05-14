<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'gender_msts';

    protected $fillable = ["Gender_mstID","Gender_mstID","GenderNAME","delete_cd", "user", "ip","Company_Code"];
}
