<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
  protected $table = 'article_msts';

  protected $fillable = ["Article_mstID","GenderNAME","Gender_mstID","Brand_Name","Category_Name","Sub_category_Name","Sub_Sub_category_Name","FW_NFW","Insole","NOL","Age","Group","Type","Upper_Materials","Color","Similar_Article","Initial_Week","Initial_Date","Article_Name","Project","Category_Code","Company_Code","Sub_Sub_category_mstID","Sub_category_mstID","Brand_mstID","Country_of_Origin","Supplier","Supplier_Reference","Article_Type","Currency","BTN_Tariff_Code","Collection_Type","Collection_Name","Target_Customer","Type_Of_Construction","Upper","Lining","Outsole","Features","Other_Color","Type_Of_Development","Article_Description","Estimated_SOR","Selling_Period","Channel","Introduction_Week","Expt_Delv_Month","Sale_By_Week","Article_Image","Price_Group","Price_1","Price_2","MRP_1","MRP_2","Finpack_Type","Finpack_Price","Standard_Cost","Manufacture_Cost","Purchase_Cost","Cost_Local","FOB_Cost","FOB_Currency","Awg_Weight","Height","Width","Length","Tax_Code","Article_Size_Code","Promotion_Code","R1","R2","R3","R4","R5","R6","R7","R8","R9","R10","R11","R12","R13","R14","R15","R16","delete_cd","user","ip"
];
  
  public function inventory()
  {
  	return $this->hasOne('App\Model\Master\Inventory', 'Article_Code', 'Article_mstID');
  }

  public function size()
  {
  	return $this->hasOne('App\Model\Master\Size', 'Size_Code', 'Article_Size_Code');
  }

    public function brand()
    {
        return $this->hasOne('App\Model\Master\Brand', 'Brand_mstID', 'Brand_mstID');
    }
    public function category()
    {
        return $this->hasOne('App\Model\Master\Category', 'Category_Code', 'Category_Code');
    }
    public function sub_category()
    {
        return $this->hasOne('App\Model\Master\SubCategory', 'Sub_category_mstID', 'Sub_category_mstID');
    }



}
