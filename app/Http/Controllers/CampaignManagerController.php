<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\SubCategory;
use App\Size;
use App\Gender;


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
        


// dd($request->all());
        $abs_max = $abs_min = $abv_min =$abv_max = $tbp_max = $tbp_min = $min_visit_max = $min_visit_min 
        = $last_max = $last_min =  $prod_ch_min = $prod_ch_max = 0;
        // if($request->isMethod('post'))
        // {
        //     dd($request->all());
        // }



        $abs_max = $request->input('abs_max');    

        return view ('slider',["brand"=>$brand,"size"=>$size,"gender"=>$gender,"cat"=>$cat,"subcat"=>$subcat,"colors"=>$colors,"abs_max"=>$abs_max,"abs_min"=>$abs_min, "abv_min"=> $abv_min,
         "abv_max" =>$abv_max, "tbp_max"=> $tbp_max,"tbp_min" => $tbp_min,"min_visit_max" => $min_visit_max,
         "min_visit_min"=> $min_visit_min, "last_max"
         => $last_max,"last_min" => $last_min,"prod_ch_min" =>$prod_ch_min,"prod_ch_max" => $prod_ch_max]);


        

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
