<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
   protected $table = 'receive_msts';

    protected $fillable = ["Receive_Invoice_No","Supply_Invoice_No","Receive_Total_QTY","Receive_TOtal_Cost","Receive_Total_Value","Received_Date","delete_cd", "user", "ip"];
}
