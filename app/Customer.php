<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer_msts';

    protected $fillable = ["Customer_Id","Company_Code","Customer_Name","Customer_Gender","Marital_Status","Customer_Address","Customer_District","Customer_Thana","Customer_City","Customer_Country","Location_Of_Living","Customer_Phone","Customer_Email","Customer_Car_No","Customer_Card_Expired_Date","delete_cd", "user", "ip"];

    public function gender()
    {
        return $this->hasOne('App\Model\Master\Gender','Gender_mstID','Customer_Gender');
    }

}
