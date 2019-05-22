<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\SubCategory;
use App\Size;
use App\Gender;
use App\Area;
use Illuminate\Support\Facades\DB;

class CampaignManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $brand = Brand::all();
        $size = Size::all();
        $gender = Gender::all();
        $cat= Category::all();
        $subcat = SubCategory::all();
        $colors = array("Red","Blue","Yellow","Green","Black","Brown","Grey","White");
        $area = Area::all();



        // dd($request->all());
        $abs_max = $abs_min = $abv_min =$abv_max = $tbp_max = $tbp_min = $min_visit_max = $min_visit_min 
        = $last_max = $last_min =  $prod_ch_min = $prod_ch_max = $abs = 0;
       


        $abs_max = $request->input('abs_max'); 
        $abs_min = $request->input('abs_min');


        $abv_min = $request->input('abv_min');
        $abv_min = $request->input('abv_min');
        
        
        
        // query for abs starts 
        
        $sql =   "SELECT*FROM `sales_msts` WHERE `Customer_Id` IS NOT NULL AND `Total_Qty`>= ? AND `Total_Qty`<= ? AND  `Total_Value`>= ? AND `Total_Value` <= ?";


       // $sql = "SELECT * FROM `customer_msts`
       //  LEFT JOIN `sales_msts` ON `sales_msts`.`Customer_Id`=`customer_msts`.`Customer_Id` and `sales_msts`.`Company_Code` = `customer_msts`.`Company_Code`
       //  LEFT JOIN `sales_chds`  ON `sales_msts`.`sales_mst_code` = `sales_chds`.`Sales_chd_Code` and `sales_msts`.`Company_Code` = `sales_chds`.`Company_Code`
       //  LEFT JOIN `category_msts` on `sales_chds`.`Category_Code` = `category_msts`.`Category_Code`
       //  LEFT JOIN `gender_msts` on `customer_msts`.`Customer_Gender` = `gender_msts`.`Gender_mstID`
       //  WHERE `sales_msts`.`Customer_Id` IS NOT NULL AND `sales_msts`.`Total_Qty`>= 1 AND 
       //  `sales_msts`.`Total_Qty`<= 300 AND  `sales_msts`.`Total_Value`>= 0 AND `sales_msts`.`Total_Value` <= 999999
       //  AND `customer_msts`.`Customer_Gender` = "Male" 
       //  ORDER BY `customer_msts`.`Customer_Id` ASC";





        $abs = DB::select($sql,[$abs_min,$abs_max,$abv_min,$abv_max]);

        // query for abs ends 
     
        return view ('slider',["brand"=>$brand,"size"=>$size,"gender"=>$gender,"cat"=>$cat,"subcat"=>$subcat,"colors"=>$colors,"abs_max"=>$abs_max,"abs_min"=>$abs_min, "abv_min"=> $abv_min,
           "abv_max" =>$abv_max, "tbp_max"=> $tbp_max,"tbp_min" => $tbp_min,"min_visit_max" => $min_visit_max,
           "min_visit_min"=> $min_visit_min, "last_max"
           => $last_max,"last_min" => $last_min,"prod_ch_min" =>$prod_ch_min,"prod_ch_max" => $prod_ch_max,"abs"=>$abs,"area"=>$area]);


           

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
