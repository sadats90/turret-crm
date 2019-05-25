<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

use App\SubCategory;
use App\Size;
use App\Article;
use App\Gender;
use App\Area;
use App\Customer;
use App\Store;
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
$article = DB::table('article_msts')
->select('GenderNAME')
->distinct('GenderNAME')
->get();

$brand = DB::table('article_msts')
->select('Brand_mstID')
->distinct('Brand_mstID')
->get();
$size = DB::table('article_msts')
->select('Article_Size_Code')
->distinct('Article_Size_Code')
->get();
$gender = DB::table('article_msts')
->select('GenderNAME')
->distinct('GenderNAME')
->get();

$cat = DB::table('article_msts')
->select('Category_Code')
->distinct('Category_Code')
->select('Category_Name')
->distinct('Category_Name')
->get();

$subcat =  DB::table('article_msts')
->select('Sub_category_mstID')
->distinct('Sub_category_mstID')
->select('Sub_category_Name')
->distinct('Sub_category_Name')
->get();

$color = DB::table('article_msts')
->select('Color')
->distinct('Color')
->get();

$store =   DB::table('store_msts')
->select('Store_Code')
->distinct('Store_Code')

->get(); 

$store_d = DB::table('store_msts')
->select('Store_District')
->distinct('Store_District')
->get(); 



// $d_gender = gender in demography
$d_gender = DB::table('customer_msts')
->select('Customer_Gender')
->distinct('Customer_Gender')
->where('Company_Code', '535')
->where('delete_cd','Y')
->get();
$area = Area::all();
// SELECT distinct `Customer_Gender` from `customer_msts` where `Company_Code`= '535' and `delete_cd`='Y'

// dd($request->all());
$abs_max = $abs_min = $abv_min =$abv_max = $tbp_max = $tbp_min = $min_visit_max = $min_visit_min 
= $last_max = $last_min =  $prod_ch_min = $prod_ch_max = $abs = 0;



$abs_max = $request->input('abs_max'); 
$abs_min = $request->input('abs_min');


$abv_min = $request->input('abv_min');
$abv_min = $request->input('abv_min');

$genders = $request->input('gender');
$sizes   = $request->input('size');

$colors = $request->input('color');
$cats = $request->input('cat');
$subcats   = $request->input('subcat');

$brands = $request->input('brand');
$store_area = $request->input('store_area');
$store_dist = $request->input('store_dist');


$stores = $request->input('stores');
// query for abs starts 

// $sql =   "SELECT*FROM `sales_msts` WHERE `Customer_Id` IS NOT NULL AND `Total_Qty`>= ? AND `Total_Qty`<= ? AND  `Total_Value`>= ? AND `Total_Value` <= ?";


$sql = "SELECT * FROM `customer_msts`
LEFT JOIN `sales_msts` ON `sales_msts`.`Customer_Id`=`customer_msts`.`Customer_Id` 
and `sales_msts`.`Company_Code` = `customer_msts`.`Company_Code`
LEFT JOIN `sales_chds`  ON `sales_msts`.`sales_mst_code` = `sales_chds`.`Sales_chd_Code` 
and `sales_msts`.`Company_Code` = `sales_chds`.`Company_Code`
LEFT JOIN `article_msts` on `sales_chds`.`Article_mstID` = `article_msts`.`Article_mstID`
LEFT JOIN `store_msts` on `sales_chds`.`Store_Code` = `store_msts`.`Store_Code`
WHERE `sales_msts`.`Customer_Id` IS NOT NULL AND `sales_msts`.`Total_Qty`>= ? AND 
`sales_msts`.`Total_Qty`<= ? AND  `sales_msts`.`Total_Value`>= ? AND `sales_msts`.`Total_Value` <= ?
-- and `article_msts`.`GenderNAME` = ?
-- AND `article_msts`.`Article_Size_Code` = ?
-- AND `article_msts`.`Color` = ?
-- AND `article_msts`.`Brand_mstID` = ? AND `article_msts`.`Category_Name` = ?
-- AND `article_msts`.`Sub_category_Name` = ?
-- AND `store_msts`.`area_name` = NULL and `store_msts`.`District_Code` = null AND `store_msts`.`Store_Code` =?
ORDER BY `customer_msts`.`Customer_Id` ASC";





$abs = DB::select($sql,[$abs_min,$abs_max,$abv_min,$abv_max,$genders,$sizes,$colors,$brands,$cats,$subcats]);


// query for abs ends 

return view ('slider',["brand"=>$brand,"size"=>$size,"gender"=>$gender,"cat"=>$cat,"subcat"=>$subcat,"color"=>$color,"abs_max"=>$abs_max,"abs_min"=>$abs_min, "abv_min"=> $abv_min,
   "abv_max" =>$abv_max, "tbp_max"=> $tbp_max,"tbp_min" => $tbp_min,"min_visit_max" => $min_visit_max,
   "min_visit_min"=> $min_visit_min, "last_max"
   => $last_max,"last_min" => $last_min,"prod_ch_min" =>$prod_ch_min,"prod_ch_max" => $prod_ch_max,"abs"=>$abs,"area"=>$area, "d_gender"=> $d_gender, "article"=>$article,"store"=>$store,"store_d"=>$store_d]);




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
