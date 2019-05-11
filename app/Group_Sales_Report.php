<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Group_Sales_Report extends Model
{

    public function report_by_cashier($store, $date_from, $date_to){

        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));

        $data = DB::table("sales_chds")
            ->join('sales_msts', 'sales_msts.sales_mst_code', '=', 'sales_chds.Sales_chd_Code')
            ->join('users', 'sales_msts.user', '=', 'users.id')
            ->select('users.name','users.Emp_Code','sales_msts.user',
                DB::raw("SUM(sales_chds.Quantity) as total_qty"),

                DB::raw("SUM(sales_chds.Article_Price_New) as tot_price1")
            )

            ->where('sales_chds.updated_at','>=',$date_from)
            ->where('sales_chds.updated_at','<=',$date_to)
            ->whereIn('sales_chds.Store_Code',$store)
            ->where('sales_chds.delete_cd','=','Y')
            ->groupBy('sales_msts.user')
            ->orderBy('tot_price1','DSC')
            ->get()->toArray();
        return $data;
    }

    public function report_by_cashier_new($store, $date_from, $date_to){

        $StoreIn=implode(',', $store);
        $sql="SELECT sum(table1.tot_quantity) AS total_qty, sales_msts.Store_Code as store_name,
        (SELECT users.name FROM users WHERE users.id=sales_msts.user) as report_by_ttl,
        sum(table1.tot_price_1) as tot_ret_price,
        sum(table1.tot_discount) AS tot_disc_price,
        sum(table1.tot_article_price_new) AS tot_price1, 
        sum( sales_msts.card_paid ) AS tot_card_paid, 
        sum(sales_msts.cash_paid) as tot_cash_paid,
        sum(sales_msts.voucher_value) AS tot_voucher_value,
        sum(sales_msts.loyalty_value) as tot_loyalty_value FROM sales_msts
        INNER JOIN 
        (SELECT `Sales_chd_Code`,`Company_Code`,`Store_Code`,
        sum(`Quantity`) as tot_quantity,
        sum(`Price_1`*`Quantity`) as tot_price_1,
        sum((`Price_1`*`Quantity`)-(`Article_Price_New`)) as tot_discount,
        sum(`Article_Price_New`) as tot_article_price_new FROM `sales_chds` 
        group by 
        `Sales_chd_Code`,`Company_Code`,`Store_Code`) AS table1 ON sales_msts.sales_mst_code=table1.Sales_chd_Code AND sales_msts.Company_Code=table1.Company_Code AND sales_msts.Store_Code=table1.Store_Code 
        WHERE 
        sales_msts.Store_Code in (".$StoreIn.")  AND sales_msts.created_at>= ? AND sales_msts.created_at<= ?
        group BY  
        sales_msts.user";
        
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        $data = DB::select($sql,[$date_from,$date_to]);

        return $data;
    }

    public function report_by_cashier2($store, $date_from, $date_to){
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        //dd($ss);
        $data = DB::table("sales_chds")
            ->join('sales_msts', 'sales_msts.sales_mst_code', '=', 'sales_chds.Sales_chd_Code')
            ->join('users', 'sales_msts.user', '=', 'users.id')
            ->select('users.name','users.Emp_Code','sales_msts.user',DB::raw("SUM(sales_chds.Quantity) as total_qty"),

                DB::raw("SUM( (sales_chds.Price_1 * sales_chds.Quantity) - (sales_chds.Discount * sales_chds.Quantity) - ((sales_chds.Price_1 * ifnull(sales_chds.discount_percentage,0)/100)* sales_chds.Quantity)) as tot_price1"))

            ->where('sales_chds.updated_at','>=',$date_from)
            ->where('sales_chds.updated_at','<=',$date_to)
            ->whereIn('sales_chds.Store_Code',$store)
            ->where('sales_chds.delete_cd','=','Y')
            ->groupBy('sales_msts.user')
            ->orderBy('tot_price1','DSC')
            ->get()->toArray();

            /*foreach ($variable as $key => $value) {
                # code...
            }*/
        //dd($data);
        return $data;
    }


    public function report_by_selected_cashier($store, $date_from, $date_to,$user_id){
        //if($date_from==$date_to){
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        //}
        $data = DB::table("sales_chds")
            ->join('sales_msts', 'sales_msts.sales_mst_code', '=', 'sales_chds.Sales_chd_Code')
            ->join('users', 'sales_msts.user', '=', 'users.id')
            ->select(DB::raw("Date(sales_chds.updated_at) as date"),
                DB::raw("SUM(sales_chds.Quantity) as total_qty"),

                DB::raw("SUM( (sales_chds.Price_1 * sales_chds.Quantity) - (sales_chds.Discount * sales_chds.Quantity) - ((sales_chds.Price_1 * ifnull(sales_chds.discount_percentage,0)/100)* sales_chds.Quantity)) as tot_price1"))

            //->whereBetween('sales_chds.updated_at', [$date_from, $date_to])
            ->where('sales_chds.updated_at','>=',$date_from)
            ->where('sales_chds.updated_at','<=',$date_to)
            ->where('sales_chds.Store_Code','=',$store)
            ->where('sales_chds.delete_cd','=','Y')
            ->where('sales_chds.user','=',$user_id)
            ->groupBy('date')
            ->orderBy('tot_price1','DSC')
            ->get()->toArray();

        return $data;
    }

    public function report_by_store_old($store, $date_from, $date_to){
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        //dd($ss);
        $data = DB::table("sales_chds")
            ->join('sales_msts', 'sales_msts.sales_mst_code', '=', 'sales_chds.Sales_chd_Code')
            ->join('users', 'sales_msts.user', '=', 'users.id')

            ->join('store_msts', 'sales_msts.Store_Code', '=', 'store_msts.Store_Code')
            ->select('users.name','users.Emp_Code','sales_msts.user', 'sales_msts.payment_type',
                DB::raw("SUM(sales_chds.Quantity) as total_qty"),

                DB::raw("store_msts.Store_Name as store_name"),

                DB::raw("SUM( sales_chds.Price_1 * sales_chds.Quantity) as tot_ret_price"),

                DB::raw("SUM( (sales_chds.Discount * sales_chds.Quantity) + ((sales_chds.Price_1 * ifnull(sales_chds.discount_percentage,0)/100)* sales_chds.Quantity) ) as tot_disc_price"),

                //DB::raw("SUM( (sales_chds.Price_1 * sales_chds.Quantity) - (sales_chds.Discount * sales_chds.Quantity) - ((sales_chds.Price_1 * ifnull(sales_chds.discount_percentage,0)/100)* sales_chds.Quantity)) as tot_price1"),

                DB::raw("sales_msts.card_paid as tot_card_paid"),
                DB::raw("sales_msts.cash_paid as tot_cash_paid"),
                DB::raw("sales_msts.voucher_value as tot_voucher_value"),
                DB::raw("sales_msts.loyalty_value as tot_loyalty_value"),

                DB::raw("SUM( (sales_chds.Price_1 * sales_chds.Quantity) - (sales_chds.Discount * sales_chds.Quantity) - ((sales_chds.Price_1 * ifnull(sales_chds.discount_percentage,0)/100)* sales_chds.Quantity)) as tot_price1") )

            ->where('sales_chds.updated_at','>=',$date_from)
            ->where('sales_chds.updated_at','<=',$date_to)
            ->whereIn('sales_chds.Store_Code',$store)
            ->where('sales_chds.delete_cd','=','Y')
            ->groupBy('sales_msts.Store_Code')
            ->orderBy('tot_price1','DSC')
            ->get()->toArray();
        return $data;
    }
    
   // for store report direct from query by Karim 11/03/2019 
public function report_by_store($store){
        $StoreIn=implode(',', $store);
        $sql ="SELECT `calendars`.`PeriodId` as week_in,  
        DATE_FORMAT(`calendars`.`StartDate`, '%m/%d/%Y') as date_from,
        DATE_FORMAT(`calendars`.`EndDate`, '%m/%d/%Y') as date_to,
        0 as total_est, 0 as fw_est, 0 as nfw_est, 
        sum(`sales_msts`.`Total_Qty`) as tot_qty, 
        sum(`sales_msts`.`total_fw`) as tot_fw,
        sum(`sales_msts`.`total_nfw`) as tot_nfw,
        0 as total_est_value, 0 as fw_est_value, 
        0 as nfw_est_value,  
        sum(`sales_msts`.`Total_Value`) as tot_value, 
        sum(`sales_msts`.`total_fw_value`) as tot_fw_value,
        sum(`sales_msts`.`total_nfw_value`) as tot_nfw_value 
        FROM `sales_msts`
        INNER JOIN
            `calendars` ON 
            `calendars`.`Company_Code`= `sales_msts`.`Company_Code`
        and DATE_FORMAT(`calendars`.`StartDate`, '%m/%d/%Y')<=DATE_FORMAT(`sales_msts`.`created_at`, '%m/%d/%Y')
        and DATE_FORMAT(`calendars`.`EndDate`, '%m/%d/%Y') >= DATE_FORMAT(`sales_msts`.`created_at`, '%m/%d/%Y')
         where `sales_msts`.`Company_Code`='535' 
         and `sales_msts`.`created_at` > '2019-02-23' 
         and `calendars`.`PeriodType` ='Week'
         and sales_msts.Store_Code in (".$StoreIn.") 
         group BY
            `calendars`.`PeriodId`
         order by 
            `calendars`.`PeriodId`";
        
        
        $data = DB::select($sql, []);

        return $data;
    }
    
    // for store report direct from query by Karim 11/03/2019 
    public function report_by_store_old2($store, $date_from, $date_to){
        $StoreIn=implode(',', $store);
        $sql="SELECT sum(table1.tot_quantity) AS total_qty, sales_msts.Store_Code as store_name,
        sum(table1.tot_price_1) as tot_ret_price,
        sum(table1.tot_discount) AS tot_disc_price,
        sum(table1.tot_article_price_new) AS tot_price1, 
        sum( sales_msts.card_paid ) AS tot_card_paid, 
        sum(sales_msts.cash_paid) as tot_cash_paid,
        sum(sales_msts.voucher_value) AS tot_voucher_value,
        sum(sales_msts.loyalty_value) as tot_loyalty_value FROM sales_msts
        INNER JOIN 
        (SELECT `Sales_chd_Code`,`Company_Code`,`Store_Code`,
        sum(`Quantity`) as tot_quantity,
        sum(`Price_1`*`Quantity`) as tot_price_1,
        sum((`Price_1`*`Quantity`)-(`Article_Price_New`)) as tot_discount,
        sum(`Article_Price_New`) as tot_article_price_new FROM `sales_chds` 
        group by 
        `Sales_chd_Code`,`Company_Code`,`Store_Code`) AS table1 ON sales_msts.sales_mst_code=table1.Sales_chd_Code AND sales_msts.Company_Code=table1.Company_Code AND sales_msts.Store_Code=table1.Store_Code 
        WHERE 
        sales_msts.Store_Code in (".$StoreIn.")  AND sales_msts.created_at>= ? AND sales_msts.created_at<= ?
        group BY  
        sales_msts.Store_Code";
        
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        $data = DB::select($sql,[$date_from,$date_to]);

        return $data;
    }

    public function report_by_staff($store, $date_from, $date_to){
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        $emp=DB::table('sales_chds')
            ->join('employee_msts', 'employee_msts.Emp_Code', '=', 'sales_chds.Emp_Code')
            ->select('sales_chds.Emp_Code','employee_msts.Emp_Name')
            ->whereIn('sales_chds.Store_Code',$store)
            ->where('sales_chds.delete_cd','=','Y')
            ->groupBy('employee_msts.Emp_Code')
            ->get()->toArray();
        $ss=array();
        for($i=0;$i<count($emp);$i++){
            $ss[$i]=$emp[$i]->Emp_Code;
        }
        $data = DB::table("sales_chds")
            ->join('employee_msts', 'employee_msts.Emp_Code', '=', 'sales_chds.Emp_Code')
            ->select('employee_msts.Emp_Name','sales_chds.Emp_Code',DB::raw("SUM(sales_chds.Quantity) as total_qty"),

                DB::raw("SUM(sales_chds.Article_Price_New) as tot_price1")
            )

            ->where('sales_chds.updated_at','>=',$date_from)
            ->where('sales_chds.updated_at','<=',$date_to)
            ->whereIn('sales_chds.Store_Code',$store)
            ->where('sales_chds.delete_cd','=','Y')
            ->whereIn('sales_chds.Emp_Code',$ss)
            ->groupBy('sales_chds.Emp_Code')
            ->orderBy('tot_price1','DSC')
            ->get();
        return $data;
    }

    public function report_by_staff_new($store, $date_from, $date_to){
        $StoreIn=implode(',', $store);
        $sql="SELECT sum(table1.tot_quantity) AS total_qty, sales_msts.Store_Code as store_name,
        sum(table1.tot_price_1) as tot_ret_price,
        sum(table1.tot_discount) AS tot_disc_price,
        sum(table1.tot_article_price_new) AS tot_price1, 
        sum( sales_msts.card_paid ) AS tot_card_paid, 
        sum(sales_msts.cash_paid) as tot_cash_paid,
        sum(sales_msts.voucher_value) AS tot_voucher_value,
        sum(sales_msts.loyalty_value) as tot_loyalty_value FROM sales_msts
        INNER JOIN 
        (SELECT `Sales_chd_Code`,`Company_Code`,`Store_Code`, `emp_code` as report_by_ttl,
        sum(`Quantity`) as tot_quantity,
        sum(`Price_1`*`Quantity`) as tot_price_1,
        sum((`Price_1`*`Quantity`)-(`Article_Price_New`)) as tot_discount,
        sum(`Article_Price_New`) as tot_article_price_new FROM `sales_chds` 
        group by 
        `Sales_chd_Code`,`Company_Code`,`Store_Code`) AS table1 ON sales_msts.sales_mst_code=table1.Sales_chd_Code AND sales_msts.Company_Code=table1.Company_Code AND sales_msts.Store_Code=table1.Store_Code 

        WHERE 
        sales_msts.Store_Code in (".$StoreIn.")  AND sales_msts.created_at>= ? AND sales_msts.created_at<= ?
        group BY  
        sales_msts.Store_Code";
        
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        $data = DB::select($sql,[$date_from,$date_to]);

        return $data;
    }

    public function report_by_selected_staff($store, $date_from, $date_to,$emp_code){
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        $data = DB::table("sales_chds")
            ->join('employee_msts', 'employee_msts.Emp_Code', '=', 'sales_chds.Emp_Code')
            ->select('employee_msts.Emp_Name','sales_chds.Store_Code','sales_chds.Emp_Code',DB::raw("Date(sales_chds.updated_at) as date"),DB::raw("SUM(sales_chds.Quantity) as total_qty"),

                DB::raw("SUM( (sales_chds.Price_1 * sales_chds.Quantity) - (sales_chds.Discount * sales_chds.Quantity) - ((sales_chds.Price_1 * ifnull(sales_chds.discount_percentage,0)/100)* sales_chds.Quantity)) as tot_price1"))

            ->where('sales_chds.updated_at','>=',$date_from)
            ->where('sales_chds.updated_at','<=',$date_to)
            ->where('sales_chds.Store_Code','=',$store)
            ->where('sales_chds.Emp_Code',$emp_code)
            ->groupBy('date')
            ->orderBy('tot_price1','DSC')
            ->get();
        return $data;
    }

    public function report_by_cat($store, $date_from, $date_to){
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        $emp=DB::table('sales_chds')
            ->select('sales_chds.Category_Code')
            ->whereIn('sales_chds.Store_Code',$store)
            ->where('sales_chds.delete_cd','=','Y')
            ->groupBy('sales_chds.Category_Code')
            ->get()->toArray();
        $ss=array();
        for($i=0;$i<count($emp);$i++){
            $ss[$i]=$emp[$i]->Category_Code;
        }
        $data = DB::table("sales_chds")
            ->join('category_msts', 'category_msts.Category_Code', '=', 'sales_chds.Category_Code')
            ->select('category_msts.Category_Code','category_msts.Category_Name',DB::raw("SUM(sales_chds.Quantity) as total_qty"),

                DB::raw("SUM(sales_chds.Article_Price_New) as tot_price1")
            )

            ->where('sales_chds.updated_at','>=',$date_from)
            ->where('sales_chds.updated_at','<=',$date_to)
            ->whereIn('sales_chds.Store_Code',$store)
            ->where('sales_chds.delete_cd','=','Y')
            ->whereIn('sales_chds.Category_Code',$ss)
            ->groupBy('sales_chds.Category_Code')
            ->orderBy('tot_price1','DSC')
            ->get()->toArray();
        return $data;
    }


    public function report_by_cat_new($store, $date_from, $date_to){
        $StoreIn=implode(',', $store);
        $sql="SELECT sum(table1.tot_quantity) AS total_qty, sales_msts.Store_Code as store_name,
        sum(table1.tot_price_1) as tot_ret_price,
        sum(table1.tot_discount) AS tot_disc_price,
        sum(table1.tot_article_price_new) AS tot_price1, 
        sum( sales_msts.card_paid ) AS tot_card_paid, 
        sum(sales_msts.cash_paid) as tot_cash_paid,
        sum(sales_msts.voucher_value) AS tot_voucher_value,
        sum(sales_msts.loyalty_value) as tot_loyalty_value FROM sales_msts
        INNER JOIN 
        (SELECT `Sales_chd_Code`,`Company_Code`,`Store_Code`, emp_code as report_by_ttl,
        sum(`Quantity`) as tot_quantity,
        sum(`Price_1`*`Quantity`) as tot_price_1,
        sum((`Price_1`*`Quantity`)-(`Article_Price_New`)) as tot_discount,
        sum(`Article_Price_New`) as tot_article_price_new FROM `sales_chds` 
        group by 
        `Sales_chd_Code`,`Company_Code`,`Store_Code`) AS table1 ON sales_msts.sales_mst_code=table1.Sales_chd_Code AND sales_msts.Company_Code=table1.Company_Code AND sales_msts.Store_Code=table1.Store_Code 
        WHERE 
        sales_msts.Store_Code in (".$StoreIn.")  AND sales_msts.created_at>= ? AND sales_msts.created_at<= ?
        group BY  
        sales_msts.Store_Code";
        
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        $data = DB::select($sql,[$date_from,$date_to]);

        return $data;
    }

    public function report_by_selected_cat($store, $date_from, $date_to,$cat_id){
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        $data = DB::table("sales_chds")
            ->join('category_msts', 'category_msts.Category_Code', '=', 'sales_chds.Category_Code')
            ->select('category_msts.Category_Code',DB::raw("Date(sales_chds.updated_at) as date"),'category_msts.Category_Name',DB::raw("SUM(sales_chds.Quantity) as total_qty"),

                DB::raw("SUM( (sales_chds.Price_1 * sales_chds.Quantity) - (sales_chds.Discount * sales_chds.Quantity) - ((sales_chds.Price_1 * ifnull(sales_chds.discount_percentage,0)/100)* sales_chds.Quantity)) as tot_price1"))

            ->where('sales_chds.updated_at','>=',$date_from)
            ->where('sales_chds.updated_at','<=',$date_to)
            ->where('sales_chds.Store_Code','=',$store)
            ->where('sales_chds.Category_Code',$cat_id)
            ->groupBy('date')
            ->orderBy('tot_price1','DSC')
            ->get();
        return $data;
    }

//re-written query -- Karim with plain SQL codification -- 10/03/2019
    public function report_by_payment($store, $date_from, $date_to){
        $StoreIn=implode(',', $store);
        $sql="SELECT sales_msts.payment_type,sum(table1.tot_quantity) AS total_qty,
        sum(table1.tot_price_1) as tot_ret_price,
        sum(table1.tot_discount) AS tot_disc_price,
        sum(table1.tot_article_price_new) AS tot_price1, 
        sum(sales_msts.card_paid) AS tot_card_paid, sum(sales_msts.cash_paid) as tot_cash_paid,sum(sales_msts.voucher_value) AS tot_voucher_value,
        sum(sales_msts.loyalty_value) as tot_loyalty_value FROM sales_msts
        INNER JOIN 
        (SELECT `Sales_chd_Code`,`Company_Code`,`Store_Code`,sum(`Quantity`) as tot_quantity,
        sum(`Price_1`*`Quantity`) as tot_price_1,
        sum((`Price_1`*`Quantity`)-(`Article_Price_New`)) as tot_discount,
        sum(`Article_Price_New`) as tot_article_price_new FROM `sales_chds` 
        group by 
        `Sales_chd_Code`,`Company_Code`,`Store_Code`) AS table1 ON sales_msts.sales_mst_code=table1.Sales_chd_Code AND sales_msts.Company_Code=table1.Company_Code AND sales_msts.Store_Code=table1.Store_Code 
        WHERE 
        sales_msts.Store_Code in (".$StoreIn.")  AND sales_msts.created_at>= ? AND sales_msts.created_at<= ?
        group BY  
        sales_msts.payment_type";
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        $data = DB::select($sql,[$date_from,$date_to]);

        return $data;
    }

    public function report_by_promotion($store, $date_from, $date_to){
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        $data = DB::table("sales_chds")
            ->join('sales_msts', 'sales_msts.sales_mst_code', '=', 'sales_chds.Sales_chd_Code')
            ->select('sales_chds.Promotion_Code','sales_chds.Article_mstID','sales_chds.Size',
                DB::raw("SUM(sales_chds.Quantity) as total_qty"),

                DB::raw("SUM(sales_chds.Price_1*sales_chds.Quantity) as tot_ret_price"),
                DB::raw("SUM((sales_chds.Price_1*sales_chds.Quantity)-(sales_chds.Article_Price_New)) as tot_disc_price"),

                DB::raw("SUM(sales_chds.Article_Price_New) as tot_price1")
            )
            
            ->where('sales_chds.updated_at','>=',$date_from)
            ->where('sales_chds.updated_at','<=',$date_to)
            ->where('sales_chds.delete_cd','=','Y')
            ->whereIn('sales_chds.Store_Code',$store)
            ->where('sales_chds.Promotion_Code','!=','')
            ->groupBy('sales_chds.Promotion_Code')
            ->orderBy('tot_price1','DSC')
            ->get();
        return $data;
    }

    public function report_by_promotion_excel($store, $date_from, $date_to){
        $date_to = date('Y-m-d', strtotime($date_to . ' +1 day'));
        $data = DB::table("sales_chds")
            ->join('sales_msts', 'sales_msts.sales_mst_code', '=', 'sales_chds.Sales_chd_Code')
            ->select('sales_chds.Promotion_Code','sales_chds.Article_mstID','sales_chds.Size',
                DB::raw("SUM(sales_chds.Quantity) as total_qty"),

                DB::raw("SUM(sales_chds.Price_1*sales_chds.Quantity) as tot_ret_price"),
                DB::raw("SUM((sales_chds.Price_1*sales_chds.Quantity)-(sales_chds.Article_Price_New)) as tot_disc_price"),

                DB::raw("SUM(sales_chds.Article_Price_New) as tot_price1")
            )
            
            ->where('sales_chds.updated_at','>=',$date_from)
            ->where('sales_chds.updated_at','<=',$date_to)
            ->where('sales_chds.delete_cd','=','Y')
            ->whereIn('sales_chds.Store_Code',$store)
            ->where('sales_chds.Promotion_Code','!=','')
            ->groupBy('sales_chds.Size')
            ->orderBy('tot_price1','DSC')
            ->get();
        return $data;
    }
}
