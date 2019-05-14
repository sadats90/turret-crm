<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company_msts';

    protected $fillable = ["Company_Code","Company_Name","Company_Address","Company_District","Company_Thana","Company_City","Company_Country","Company_Email","Company_Phone","delete_cd", "user", "ip"];
}
