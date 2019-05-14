<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales_msts';

    protected $fillable = ["sales_mst_code","Store_Code","Customer_Id","count_line","Total_Qty","Total_Value","Total_tax","card_type","card_num","delete_cd", "user", "ip", "voucher_code", "payment_type", "cash_paid"];
}
