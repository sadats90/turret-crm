<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store_msts';

    protected $fillable = ["Store_Code","Company_Code","Store_Name","Store_Address","Store_District","Store_Thana","Store_City","phone","vat_code","Store_Country","Store_Opening_Date","Store_Closing_Date","Store_Rent","Store_Initial_Week","Store_Advanced","District_Code","Rent_Pay_Date","Store_Manager","Concept_Code","delete_cd", "user", "ip"];
}
